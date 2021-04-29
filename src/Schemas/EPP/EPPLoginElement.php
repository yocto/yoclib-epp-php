<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPLoginElement extends DOMElement{

    /**
     * @return EPPClientIdElement|null
     */
    public function getClientIdElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPClientIdElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPPasswordElement|null
     */
    public function getPasswordElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPasswordElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPNewPasswordElement[]
     */
    public function getNewPasswordElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPNewPasswordElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPOptionsElement|null
     */
    public function getOptionsElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPOptionsElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPServicesElement|null
     */
    public function getServicesElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPServicesElement){
                return $childNode;
            }
        }
        return null;
    }

}