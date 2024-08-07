<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPMessageQueueElementImpl extends EPPElementImpl implements EPPMessageQueueElement {

    public function getQueueDate(): ?EPPQueueDateElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'qDate')[0] ?? null;
    }

    public function getMessage(): ?EPPMessageElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'msg')[0] ?? null;
    }

}