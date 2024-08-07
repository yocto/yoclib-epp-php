<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPServicesElementImpl extends EPPElementImpl implements EPPServicesElement {

    public function getObjectURI(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'objURI') AS $objURI){
            $elements[] = $objURI;
        }
        return $elements;
    }

    public function getServiceExtension(): ?EPPServiceExtensionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svcExtension')[0] ?? null;
    }

}