<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class EURID extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp.registry.eu',700);
    }

}