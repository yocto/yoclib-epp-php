<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPRecipientElementImpl extends EPPElementImpl implements EPPRecipientElement {

    public function getOther(): ?EPPOtherElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'other')[0] ?? null;
    }

    public function getOurs(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'ours') AS $ours){
            $elements[] = $ours;
        }
        return $elements;
    }

    public function getPublic(): ?EPPPublicElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'public')[0] ?? null;
    }

    public function getSame(): ?EPPSameElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'same')[0] ?? null;
    }

    public function getUnrelated(): ?EPPUnrelatedElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'unrelated')[0] ?? null;
    }

}