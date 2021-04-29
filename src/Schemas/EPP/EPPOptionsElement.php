<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPOptionsElement extends DOMElement{

    /**
     * @return EPPVersionElement|null
     */
    public function getVersionElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPVersionElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPLanguageElement|null
     */
    public function getLanguageElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPLanguageElement){
                return $childNode;
            }
        }
        return null;
    }

}