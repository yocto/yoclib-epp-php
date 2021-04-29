<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPOursElement extends DOMElement{

    /**
     * @return EPPRecipientDescriptionElement[]
     */
    public function getRecipientDescriptionElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPRecipientDescriptionElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}