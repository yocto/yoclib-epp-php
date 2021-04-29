<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPResultElement extends DOMElement{

    public function getMessageElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPMessageElement){
                return $childNode;
            }
        }
        return null;
    }

}