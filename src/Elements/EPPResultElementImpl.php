<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPResultElementImpl extends EPPElementImpl implements EPPResultElement {

    public function getMessage(): ?EPPMessageElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'msg')[0] ?? null;
    }

    public function getValue(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'value') AS $value){
            $elements[] = $value;
        }
        return $elements;
    }

    public function getExtensionValue(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'extValue') AS $extValue){
            $elements[] = $extValue;
        }
        return $elements;
    }

}