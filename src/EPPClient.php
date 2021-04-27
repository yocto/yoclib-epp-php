<?php
namespace YOCLIB\EPP;

class EPPClient{

    public static function create($url){
        return new EPPConnection(stream_socket_client($url));
    }

}