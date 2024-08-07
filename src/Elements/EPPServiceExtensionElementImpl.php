<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPServiceExtensionElementImpl extends EPPElementImpl implements EPPServiceExtensionElement {

    public function getExtensionURI(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'extURI') AS $extURI){
            $elements[] = $extURI;
        }
        return $elements;
    }

}