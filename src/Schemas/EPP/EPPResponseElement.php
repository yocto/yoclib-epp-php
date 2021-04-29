<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPResponseElement extends DOMElement{

    /**
     * @return EPPResultElement[]
     */
    public function getResultElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPResultElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPMessageQueuedElement|null
     */
    public function getMessageQueuedElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPMessageQueuedElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPResponseDataElement|null
     */
    public function getResponseDataElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPResponseDataElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPExtensionElement|null
     */
    public function getExtensionElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPExtensionElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPTransactionIdElement|null
     */
    public function getTransactionIdElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPTransactionIdElement){
                return $childNode;
            }
        }
        return null;
    }

}