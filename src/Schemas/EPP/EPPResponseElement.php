<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPResponseElement extends DOMElement{

    /**
     * @return EPPResultElement|null
     */
    public function getResultElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPResultElement){
                return $childNode;
            }
        }
        return null;
    }

}