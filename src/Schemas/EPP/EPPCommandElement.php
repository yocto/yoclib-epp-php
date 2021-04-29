<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPCommandElement extends DOMElement{

    /**
     * @return EPPCheckElement|null
     */
    public function getCheckElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPCheckElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPCreateElement|null
     */
    public function getCreateElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPCreateElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPDeleteElement|null
     */
    public function getDeleteElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPDeleteElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPInfoElement|null
     */
    public function getInfoElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPInfoElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPLoginElement|null
     */
    public function getLoginElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPLoginElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPLogoutElement|null
     */
    public function getLogoutElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPLogoutElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPPollElement|null
     */
    public function getPollElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPPollElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPRenewElement|null
     */
    public function getRenewElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPRenewElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPTransferElement|null
     */
    public function getTransferElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPTransferElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPUpdateElement|null
     */
    public function getUpdateElement(){
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPUpdateElement){
                return $childNode;
            }
        }
        return null;
    }

    /**
     * @return EPPExtensionElement[]
     */
    public function getExtensionElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPExtensionElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPClientTransactionIdElement[]
     */
    public function getClientTransactionElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPClientTransactionIdElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}