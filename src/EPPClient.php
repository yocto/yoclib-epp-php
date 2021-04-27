<?php
namespace YOCLIB\EPP;

class EPPClient{

    /**
     * @param string $url
     * @return EPPConnection
     */
    public static function createConnection($url): EPPConnection{
        return new EPPConnection(stream_socket_client($url));
    }

}