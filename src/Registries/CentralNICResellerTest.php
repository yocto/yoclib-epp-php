<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class CentralNICResellerTest extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp-ote.rrpproxy.net',1700);
    }

}