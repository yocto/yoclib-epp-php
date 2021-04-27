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
     * @return string|null
     */
    public function readXML(){
        $this->ensureConnection();
        $lengthBytes = fread($this->resource,4);
        if(strlen($lengthBytes)!==4){
            return null;
        }
        $lengthData = unpack('N',$lengthBytes);
        if(!$lengthData){
            return null;
        }
        $length = $lengthData[1];
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
        fwrite($this->resource,pack('N',$length).$xml);
    }

}