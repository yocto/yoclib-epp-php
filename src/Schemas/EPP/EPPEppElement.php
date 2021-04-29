<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPEppElement extends DOMElement{

    public function getGreetingElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPGreetingElement){
                return $childNode;
            }
        }
        return null;
    }

    public function getHelloElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPHelloElement){
                return $childNode;
            }
        }
        return null;
    }

    public function getCommandElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPCommandElement){
                return $childNode;
            }
        }
        return null;
    }

    public function getResponseElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPResponseElement){
                return $childNode;
            }
        }
        return null;
    }

    public function getExtensionElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPExtensionElement){
                return $childNode;
            }
        }
        return null;
    }

}