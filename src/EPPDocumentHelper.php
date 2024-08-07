<?php
namespace YOCLIB\EPP;

use Wikimedia\Dodo\Internal\WhatWG;
use Wikimedia\Dodo\XMLDocument;

class EPPDocumentHelper{

    /**
     * @return EPPDocument
     */
    public static function createEPPDocument(): EPPDocument{
        return new class(null,'application/epp+xml') extends XMLDocument implements EPPDocument{

            public function createElementNS(?string $namespace, string $qualifiedName, $options = null){
                $element = parent::createElementNS($namespace, $qualifiedName, $options);
                if($this->getContentType()==='application/epp+xml'){
                    WhatWG::validate_and_extract($namespace,$qualifiedName,$prefix,$lname);
                    return EPPElementImpl::__createElementNS($this, $namespace, $lname, $prefix) ?? $element;
                }
                return $element;
            }

            public function setContentType($contentType): void{
                $this->_contentType = $contentType;
            }

        };
    }

}