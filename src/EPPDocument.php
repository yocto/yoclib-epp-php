<?php
namespace YOCLIB\EPP;

use DOMDocument;
use YOCLIB\EPP\Schemas\EPP\EPPEppElement;

class EPPDocument extends DOMDocument{

    /**
     * @return EPPEppElement|null
     */
    public function getEPPElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPEppElement){
                return $childNode;
            }
        }
        return null;
    }

}