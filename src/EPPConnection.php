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
        if(!is_resource($this->resource)){
            throw new RuntimeException("Connection closed");
        }
    }

    /**
     * @return string|null
     */
    public function readXML(){
        $this->ensureConnection();
        $length = unpack('N',fread($this->resource,4));
        $data = fread($this->resource,$length[1]);
        return $data ?? null;
    }

    /**
     * @param $xml
     */
    private function writeXML($xml){
        $this->ensureConnection();
        $length = strlen($xml);
        fwrite($this->resource,pack('N',$length));
        fwrite($this->resource,$xml);
    }

}