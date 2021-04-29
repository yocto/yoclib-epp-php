<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;
use DOMNode;

class EPPMessageElement extends DOMElement{

    /**
     * @return string
     */
    public function getContent(){
        return $this->nodeValue;
    }

}