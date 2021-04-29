<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPGreetingElement extends DOMElement{

    /**
     * @return EPPServerIdElement|null
     */
    public function getServerIdElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPServerIdElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPServerDateElement|null
     */
    public function getServerDateElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPServerDateElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPServiceMenuElement|null
     */
    public function getServiceMenuElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPServiceMenuElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPDcpElement|null
     */
    public function getDcpElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPDcpElement){
                return $childNode;
            }
        }
        return null;
    }

}