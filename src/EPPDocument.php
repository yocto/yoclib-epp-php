<?php
namespace YOCLIB\EPP;

use DOMDocument;

class EPPDocument extends DOMDocument{

    public function getEPPDocument(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPDocument){
                return $childNode;
            }
        }
        return null;
    }

}