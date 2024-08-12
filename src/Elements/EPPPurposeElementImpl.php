<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPPurposeElementImpl extends EPPElementImpl implements EPPPurposeElement {

    public function getAdministration(): ?EPPAdministrationElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'admin')[0] ?? null;
    }

    public function getContact(): ?EPPContactElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'contact')[0] ?? null;
    }

    public function getOther(): ?EPPOtherElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'other')[0] ?? null;
    }

    public function getProvisioning(): ?EPPProvisioningElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'prov')[0] ?? null;
    }

}