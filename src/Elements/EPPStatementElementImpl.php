<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPStatementElementImpl extends EPPElementImpl implements EPPStatementElement {

    public function getPurpose(): ?EPPPurposeElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'purpose')[0] ?? null;
    }

    public function getRecipient(): ?EPPRecipientElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'recipient')[0] ?? null;
    }

    public function getRetention(): ?EPPRetentionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'retention')[0] ?? null;
    }

}