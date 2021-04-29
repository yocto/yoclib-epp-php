<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPDcpElement extends DOMElement{

    /**
     * @return EPPAccessElement|null
     */
    public function getAccessElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPAccessElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPStatementElement[]
     */
    public function getStatementElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPStatementElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPExpiryElement[]
     */
    public function getExpiryElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPExpiryElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}