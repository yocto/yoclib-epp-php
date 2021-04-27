<?php
namespace YOCLIB\EPP;

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

    public function hasData(){
        return stream_get_meta_data($this->resource)['unread_bytes']>0;
    }

    /**
     * @return bool
     */
    public function isClosed(){
        return is_resource($this->resource);
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
     * @param $xml
     */
    public function writeXML($xml){
        $this->ensureConnection();
        $length = strlen($xml)+4;
        fwrite($this->resource,$this->encodeInteger($length).$xml);
    }

}