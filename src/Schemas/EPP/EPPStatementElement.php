<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPStatementElement extends DOMElement{

    /**
     * @return EPPPurposeElement|null
     */
    public function getPurposeElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPurposeElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPRecipientElement|null
     */
    public function getRecipientElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPRecipientElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPRetentionElement|null
     */
    public function getRetentionElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPRetentionElement){
                return $childNode;
            }
        }
        return null;
    }

}