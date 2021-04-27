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
        $lengthData = fread($this->resource,4);
        if(strlen($lengthData)<4){
            return null;
        }
        $length = unpack('N',$lengthData);
        $data = fread($this->resource,$length[1]-4);
        return $data ?? null;
    }

    /**
     * @param $xml
     */
    public function writeXML($xml){
        $this->ensureConnection();
        $length = strlen($xml);
        fwrite($this->resource,pack('N',$length)+4);
        fwrite($this->resource,$xml);
    }

}