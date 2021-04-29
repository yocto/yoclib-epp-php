<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPPurposeElement extends DOMElement{

    /**
     * @return EPPAdminElement[]
     */
    public function getAdminElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPAdminElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPContactElement[]
     */
    public function getContactElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPContactElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPOtherElement[]
     */
    public function getOtherElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPOtherElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

    /**
     * @return EPPProvisioningElement[]
     */
    public function getProvisioningElementList(){
        $array = [];
        foreach($this->childNodes AS $childNode){
            if($childNode instanceof EPPProvisioningElement){
                $array[] = $childNode;
            }
        }
        return $array;
    }

}