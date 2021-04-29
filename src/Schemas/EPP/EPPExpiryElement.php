<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPExpiryElement extends DOMElement{

    /**
     * @return EPPAbsoluteElement|null
     */
    public function getAbsoluteElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPAbsoluteElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPRelativeElement|null
     */
    public function getRelativeElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPRelativeElement){
                return $childNode;
            }
        }
        return null;
    }

}