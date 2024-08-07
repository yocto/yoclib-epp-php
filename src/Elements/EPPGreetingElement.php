<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPGreetingElement extends EPPElement {

    public function getServerID(): ?EPPServerIdElement;

    public function getServerDate(): ?EPPServerDateElement;

    public function getServiceMenu(): ?EPPServiceMenuElement;

    public function getDataCollectionPolicy(): ?EPPDataCollectionPolicyElement;

}