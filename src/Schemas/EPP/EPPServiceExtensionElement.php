<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPServiceExtensionElement extends DOMElement{

    /**
     * @return EPPExtensionUriElement[]
     */
    public function getExtensionUriElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPExtensionUriElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}