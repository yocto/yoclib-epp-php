<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPAccessElementImpl extends EPPElementImpl implements EPPAccessElement {

    public function getAll(): ?EPPAllElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'all')[0] ?? null;
    }

    public function getNone(): ?EPPNoneElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'none')[0] ?? null;
    }

    public function getNull(): ?EPPNullElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'null')[0] ?? null;
    }

    public function getOther(): ?EPPOtherElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'other')[0] ?? null;
    }

    public function getPersonal(): ?EPPPersonalElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'personal')[0] ?? null;
    }

    public function getPersonalOrOther(): ?EPPPersonalAndOtherElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'personalAndOther')[0] ?? null;
    }

}