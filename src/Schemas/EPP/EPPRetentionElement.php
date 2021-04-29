<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPRetentionElement extends DOMElement{

    /**
     * @return EPPBusinessElement|null
     */
    public function getBusinessElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPBusinessElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPIndefiniteElement|null
     */
    public function getIndefiniteElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPIndefiniteElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPLegalElement|null
     */
    public function getLegalElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPLegalElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPNoneElement|null
     */
    public function getNoneElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPNoneElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPStatedElement|null
     */
    public function getStatedElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPStatedElement){
                return $childNode;
            }
        }
        return null;
    }

}