<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;
use DOMNode;

class EPPResponseElement extends DOMElement{

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