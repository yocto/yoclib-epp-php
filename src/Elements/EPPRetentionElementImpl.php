<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPRetentionElementImpl extends EPPElementImpl implements EPPRetentionElement {

    public function getBusiness(): ?EPPBusinessElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'business')[0] ?? null;
    }

    public function getIndefinite(): ?EPPIndefiniteElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'indefinite')[0] ?? null;
    }

    public function getLegal(): ?EPPLegalElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'legal')[0] ?? null;
    }

    public function getNone(): ?EPPNoneElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'none')[0] ?? null;
    }

    public function getStated(): ?EPPStatedElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'stated')[0] ?? null;
    }

}