<?php
namespace YOCLIB\EPP;

abstract class EPPRegistry{

    private $host;
    private $port;

    public function __construct(string $host,int $port){
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHost(): string{
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort(): int{
        return $this->port;
    }

}