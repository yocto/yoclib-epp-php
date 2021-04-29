<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;
use DOMNode;

class EPPResultElement extends DOMElement{

    /**
     * @return string|null
     */
    public function getCodeAttribute(){
        /**@var DOMNode $attribute*/
        foreach($this->attributes AS $attribute){
            if($attribute->nodeName=='code'){
                return $attribute->nodeValue;
            }
        }
        return null;
    }

    /**
     * @return EPPMessageElement|null
     */
    public function getMessageElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPMessageElement){
                return $childNode;
            }
        }
        return null;
    }

}