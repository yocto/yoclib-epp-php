<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPServiceMenuElement extends DOMElement{

    /**
     * @return EPPVersionElement[]
     */
    public function getVersionElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPVersionElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPLanguageElement[]
     */
    public function getLanguageElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPLanguageElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPObjectUriElement[]
     */
    public function getObjectUriElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPObjectUriElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPServiceExtensionElement[]
     */
    public function getServiceExtensionElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPServiceExtensionElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}