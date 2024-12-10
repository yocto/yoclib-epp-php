<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class CentralNICReseller extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp.rrpproxy.net',700);
    }

}