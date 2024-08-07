<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPEppElementImpl extends EPPElementImpl implements EPPEppElement{

    public function getGreeting(): ?EPPGreetingElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'greeting')[0] ?? null;
    }

    public function getHello(): ?EPPHelloElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'hello')[0] ?? null;
    }

    public function getCommand(): ?EPPCommandElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'command')[0] ?? null;
    }

    public function getResponse(): ?EPPResponseElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'response')[0] ?? null;
    }

    public function getExtension(): ?EPPExtensionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'extension')[0] ?? null;
    }

}