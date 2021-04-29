<?php
namespace YOCLIB\EPP\Schemas\EPP;

use DOMElement;

class EPPRecipientDescriptionElement extends DOMElement{

    /**
     * @return string
     */
    public function getContent(){
        return $this->nodeValue;
    }

}