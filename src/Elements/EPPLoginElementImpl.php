<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPLoginElementImpl extends EPPElementImpl implements EPPLoginElement {

    public function getClientID(): ?EPPClientIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'clID')[0] ?? null;
    }

    public function getPassword(): ?EPPPasswordElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'pw')[0] ?? null;
    }

    public function getNewPassword(): ?EPPNewPasswordElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'newPW')[0] ?? null;
    }

    public function getOptions(): ?EPPOptionsElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'options')[0] ?? null;
    }

    public function getServices(): ?EPPServicesElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svcs')[0] ?? null;
    }

}