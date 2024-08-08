<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class SIDN extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://drs.domain-registry.nl',700);
    }

}