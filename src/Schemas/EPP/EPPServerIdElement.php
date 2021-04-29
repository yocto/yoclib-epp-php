<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPServerIdElement extends DOMElement{

    /**
     * @return string
     */
    public function getContent(){
        return $this->nodeValue;
    }

}