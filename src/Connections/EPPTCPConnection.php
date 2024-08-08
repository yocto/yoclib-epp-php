<?php
namespace YOCLIB\EPP\Connections;

use RuntimeException;
use YOCLIB\EPP\EPPConnection;
use YOCLIB\EPP\EPPRegistry;

class EPPTCPConnection extends EPPBaseConnection implements EPPConnection {

    private $registry;
    private $socket;

    public function __construct(EPPRegistry $registry){
        $this->registry = $registry;
        $this->open();
    }

    /**
     * Decode bytes to 32-bit integer
     * @param string $data
     * @return int
     */
    private function decodeInteger(string $data): int{
        return unpack('N',substr($data,0,4))[1] ?? -1;
    }

    /**
     * Encode 32-bit integer to bytes
     * @param int $integer
     * @return string
     */
    private function encodeInteger(int $integer): string{
        return pack('N',$integer);
    }

    /**
     * Ensure if connection is not closed
     */
    private function ensureConnection(): void{
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
        $this->socket = fsockopen($hostname,$this->registry->getPort());
        return $this->socket!==false;
    }

    public function readXML(): ?string{
        $this->ensureConnection();
        $length = $this->decodeInteger(fread($this->socket,4))-4;
        if($length<0){
            return null;
        }
        return fread($this->socket,$length);
    }

    public function writeXML(string $xml): void{
        $this->ensureConnection();
        $length = strlen($xml)+4;
        fwrite($this->socket,$this->encodeInteger($length).$xml);
    }

}