<?php
namespace YOCLIB\EPP\Registries;

use YOCLIB\EPP\EPPRegistry;

class EURIDTest extends EPPRegistry {

    public function __construct(){
        parent::__construct('ssl://epp.tryout.registry.eu',700);
    }

}