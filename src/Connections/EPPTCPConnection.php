<?php
namespace YOCLIB\EPP\Connections;

use RuntimeException;
use YOCLIB\EPP\EPPConnection;
use YOCLIB\EPP\EPPRegistry;

class EPPTCPConnection extends EPPBaseConnection implements EPPConnection {

    private $registry;
    private $socket;

    public function __construct(EPPRegistry $registry,bool $openDirectly=true){
        $this->registry = $registry;
        if($openDirectly){
            $this->open();
        }
    }

    /**
     * Decode bytes to 32-bit integer
     * @param string $data
     * @return int
     */
    protected function decodeInteger(string $data): int{
        return unpack('N',substr($data,0,4))[1] ?? -1;
    }

    /**
     * Encode 32-bit integer to bytes
     * @param int $integer
     * @return string
     */
    protected function encodeInteger(int $integer): string{
        return pack('N',$integer);
    }

    /**
     * Ensure if connection is not closed
     */
    protected function ensureConnection(): void{
        if($this->isClosed()){
            throw new RuntimeException('Connection closed');
        }
    }

    public function close(): bool{
        $this->ensureConnection();
        return fclose($this->socket);
    }

    /**
     * Check if connection is closed
     * @return bool
     */
    public function isClosed(): bool{
        return !is_resource($this->socket);
    }

    public function open(): bool{
        $host = $this->registry->getHost();
        $hostname = parse_url($host,PHP_URL_SCHEME).'://'.parse_url($host,PHP_URL_HOST);
        $this->socket = fsockopen($hostname,$this->registry->getPort(),$errCode,$errMsg,5);
        return $this->socket!==false;
    }

    protected function readLength(): int{
        $this->ensureConnection();
        return $this->decodeInteger(fread($this->socket,4))-4;
    }

    public function readXML(): ?string{
        $length = $this->readLength();
        if($length<0){
            return null;
        }
        return fread($this->socket,$length);
    }

    protected function writeLength(int $length): void{
        $this->ensureConnection();
        fwrite($this->socket,$this->encodeInteger($length));
    }

    public function writeXML(string $xml): void{
        $length = strlen($xml)+4;
        $this->writeLength($length);
        fwrite($this->socket,$xml);
    }

}