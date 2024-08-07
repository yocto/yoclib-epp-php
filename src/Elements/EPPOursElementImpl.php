<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPOursElementImpl extends EPPElementImpl implements EPPOursElement {

    public function getRecipientDescription(): ?EPPRecipientDescriptionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'recDesc')[0] ?? null;
    }

}