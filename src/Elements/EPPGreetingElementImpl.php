<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPGreetingElementImpl extends EPPElementImpl implements EPPGreetingElement {

    public function getServerID(): ?EPPServerIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svID')[0] ?? null;
    }

    public function getServerDate(): ?EPPServerDateElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svDate')[0] ?? null;
    }

    public function getServiceMenu(): ?EPPServiceMenuElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svcMenu')[0] ?? null;
    }

    public function getDataCollectionPolicy(): ?EPPDataCollectionPolicyElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'dcp')[0] ?? null;
    }

}