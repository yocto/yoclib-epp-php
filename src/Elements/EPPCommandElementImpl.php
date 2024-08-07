<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPCommandElementImpl extends EPPElementImpl implements EPPCommandElement {

    public function getCheck(): ?EPPCheckElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'check')[0] ?? null;
    }

    public function getCreate(): ?EPPCreateElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'create')[0] ?? null;
    }

    public function getDelete(): ?EPPDeleteElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'delete')[0] ?? null;
    }

    public function getInformation(): ?EPPInformationElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'info')[0] ?? null;
    }

    public function getLogin(): ?EPPLoginElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'login')[0] ?? null;
    }

    public function getLogout(): ?EPPLogoutElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'logout')[0] ?? null;
    }

    public function getPoll(): ?EPPPollElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'poll')[0] ?? null;
    }

    public function getRenew(): ?EPPRenewElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'renew')[0] ?? null;
    }

    public function getTransfer(): ?EPPTransferElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'transfer')[0] ?? null;
    }

    public function getUpdate(): ?EPPUpdateElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'update')[0] ?? null;
    }

    public function getExtension(): ?EPPExtensionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'extension')[0] ?? null;
    }

    public function getClientTransactionID(): ?EPPClientTransactionIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'clTRID')[0] ?? null;
    }

}