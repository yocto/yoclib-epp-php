<?php
namespace YOCLIB\EPP;

use DOMDocument;
use DOMElement;
use RuntimeException;

/**
 * Class EPPConnection
 * @package YOCLIB\EPP
 */
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
     * Close the connection
     */
    public function close(){
        fclose($this->resource);
    }

    /**
     * Convert document elements
     * @param EPPDocument|DOMDocument $doc
     * @return EPPDocument|DOMDocument|null
     */
    private function convertDOM($doc){
        return $this->convertElement($doc,$doc->documentElement);
    }

    /**
     * @param EPPDocument|DOMDocument $doc
     * @param $element
     * @return EPPDocument|DOMDocument|null
     */
    private function convertElement($doc,$element){
        foreach($element->childNodes AS $childNode){
            if($childNode instanceof DOMElement){
                $this->convertElement($doc,$childNode);
            }
        }
        return EPPSchemaHelper::convertElement($doc,$element);
    }

    /**
     * Decode bytes to 32-bit integer
     * @param string $data
     * @return int
     */
    private function decodeInteger($data){
        $int = unpack('N',substr($data,0,4));
        return $int[1];
    }

    /**
     * Encode 32-bit integer to bytes
     * @param int $data
     * @return string
     */
    private function encodeInteger($data){
        $int = pack('N',intval($data));
        return $int;
    }

    /**
     * Ensure if connection is not closed
     */
    private function ensureConnection(){
        if(!$this->isClosed()){
            throw new RuntimeException("Connection closed");
        }
    }

    /**
     * Check if connection is closed
     * @return bool
     */
    public function isClosed(){
        return is_resource($this->resource);
    }

    /**
     * Read DOM
     * @return EPPDocument|DOMDocument|null
     */
    public function readDOM(){
        $doc = new EPPDocument;
        $xml = $this->readXML();
        $doc->loadXML($xml);
        return $this->convertDOM($doc) ?? $doc;
    }

    /**
     * Read XML
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
     * Write DOM
     * @param EPPDocument|DOMDocument $doc
     */
    public function writeDOM($doc){
        $xml = $doc->saveXML();
        $this->writeXML($xml);
    }

    /**
     * Write XML
     * @param string $xml
     */
    public function writeXML($xml){
        $this->ensureConnection();
        $length = strlen($xml)+4;
        fwrite($this->resource,$this->encodeInteger($length).$xml);
    }

}