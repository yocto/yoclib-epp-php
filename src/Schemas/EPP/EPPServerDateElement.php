<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPServerDateElement extends DOMElement{

    /**
     * @return string
     */
    public function getContent(){
        return $this->nodeValue;
    }

}