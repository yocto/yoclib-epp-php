<?php
namespace YOCLIB\EPP;

use Wikimedia\Dodo\Internal\WhatWG;
use Wikimedia\Dodo\XMLDocument;

class EPPDocumentHelper{

    public static function createEPPDocument(): XMLDocument{
        return new class(null,'application/epp+xml') extends XMLDocument{

            public function createElementNS(?string $ns, string $qname, $options = null){
                $element = parent::createElementNS($ns, $qname, $options);
                if($this->getContentType()==='application/epp+xml'){
                    WhatWG::validate_and_extract($ns,$qname,$prefix,$lname);
                    return EPPElementImpl::__createElementNS($this, $ns, $lname, $prefix) ?? $element;
                }
                return $element;
            }

        };
    }

}