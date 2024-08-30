<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class CentralNIC extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp.centralnic.com',700);
    }

}