<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPDataCollectionPolicyElementImpl extends EPPElementImpl implements EPPDataCollectionPolicyElement {

    public function getAccess(): ?EPPAccessElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'access')[0] ?? null;
    }

    public function getStatement(): array{
        $elements = [];
        foreach($this->getElementsByTagNameNS($this->namespaceURI,'statement') AS $statement){
            $elements[] = $statement;
        }
        return $elements;
    }

    public function getExpiry(): ?EPPExpiryElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'expiry')[0] ?? null;
    }

}