<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPExpiryElementImpl extends EPPElementImpl implements EPPExpiryElement {

    public function getAbsolute(): ?EPPAbsoluteElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'absolute')[0] ?? null;
    }

    public function getRelative(): ?EPPRelativeElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'relative')[0] ?? null;
    }

}