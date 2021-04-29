<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPServicesElement extends DOMElement{

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