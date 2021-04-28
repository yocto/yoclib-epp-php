<?php
namespace YOCLIB\EPP;

use DOMDocument;
use RuntimeException;

class EPPConnection{

    /**
     * @var resource $resource
     */
    private $resource;

    /**
     * EPPConnection constructor.
     * @param resource $resource
     */
    public function __construct($resource){
        $this->resource = $resource;
    }

    /**
     * @param string $data
     * @return int
     */
    private function decodeInteger($data){
        $int = unpack('N',substr($data,0,4));
        return $int[1];
    }

    /**
     * @param int $data
     * @return string
     */
    private function encodeInteger($data){
        $int = pack('N',intval($data));
        return $int;
    }

    private function ensureConnection(){
        if(!$this->isClosed()){
            throw new RuntimeException("Connection closed");
        }
    }

    /**
     * @return bool
     */
    public function isClosed(){
        return is_resource($this->resource);
    }

    /**
     * @return DOMDocument|null
     */
    public function readEPP(){
        $doc = new DOMDocument;
        $xml = $this->readXML();
        $doc->loadXML($xml);
        return $doc;
    }

    /**
     * @return string|null
     */
    public function readXML(){
        $this->ensureConnection();
        $length = $this->decodeInteger(fread($this->resource,4))-4;
        if($length<0){
            return null;
        }
        return fread($this->resource,$length);
    }

    /**
     * @param DOMDocument $doc
     */
    public function writeEPP($doc){
        $xml = $doc->saveXML();
        $this->writeXML($xml);
    }

    /**
     * @param string $xml
     */
    public function writeXML($xml){
        $this->ensureConnection();
        $length = strlen($xml)+4;
        fwrite($this->resource,$this->encodeInteger($length).$xml);
    }

}