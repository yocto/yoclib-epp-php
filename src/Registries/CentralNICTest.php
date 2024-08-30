<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class CentralNICTest extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp-ote.centralnic.com',700);
    }

}