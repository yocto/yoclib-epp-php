<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPRecipientElement extends DOMElement{

    /**
     * @return EPPOtherElement[]
     */
    public function getOtherElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPOtherElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPOursElement[]
     */
    public function getOursElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPOursElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPPublicElement[]
     */
    public function getPublicElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPublicElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPSameElement[]
     */
    public function getSameElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPSameElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPUnrelatedElement[]
     */
    public function getUnrelatedElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPUnrelatedElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}