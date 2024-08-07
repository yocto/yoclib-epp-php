<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPExtensionValueElementImpl extends EPPElementImpl implements EPPExtensionValueElement {

    public function getValue(): ?EPPValueElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'value')[0] ?? null;
    }

    public function getReason(): ?EPPReasonElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'reason')[0] ?? null;
    }

}