<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPAccessElement extends DOMElement{

    /**
     * @return EPPAllElement|null
     */
    public function getAllElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPAllElement){
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
     * @return EPPNullElement|null
     */
    public function getNullElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPNullElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPOtherElement|null
     */
    public function getOtherElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPOtherElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPPersonalElement|null
     */
    public function getPersonalElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPersonalElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPPersonalAndOtherElement|null
     */
    public function getPersonalAndOtherElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPersonalAndOtherElement){
                return $childNode;
            }
        }
        return null;
    }

}