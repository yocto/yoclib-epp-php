<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPResponseElementImpl extends EPPElementImpl implements EPPResponseElement {

    public function getResult(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'result') AS $result){
            $elements[] = $result;
        }
        return $elements;
    }

    public function getMessageQueue(): ?EPPMessageQueueElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'msgQ')[0] ?? null;
    }

    public function getResponseData(): ?EPPResponseDataElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'resData')[0] ?? null;
    }

    public function getExtension(): ?EPPExtensionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'extension')[0] ?? null;
    }

    public function getTransactionID(): ?EPPTransactionIdElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'trID')[0] ?? null;
    }

}