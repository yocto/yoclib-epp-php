<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPServiceMenuElementImpl extends EPPElementImpl implements EPPServiceMenuElement {

    public function getVersion(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'version') AS $version){
            $elements[] = $version;
        }
        return $elements;
    }

    public function getLanguage(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'lang') AS $lang){
            $elements[] = $lang;
        }
        return $elements;
    }

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