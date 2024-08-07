<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPTransactionIdElementImpl extends EPPElementImpl implements EPPTransactionIdElement {

    public function getClientTransactionID(): ?EPPClientTransactionIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'clTRID')[0] ?? null;
    }

    public function getServerTransactionID(): ?EPPServerTransactionIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'svTRID')[0] ?? null;
    }

}