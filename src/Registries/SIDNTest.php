<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class SIDNTest extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://testdrs.domain-registry.nl',700);
    }

}