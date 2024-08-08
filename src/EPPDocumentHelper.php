<?php
namespace YOCLIB\EPP;

use Wikimedia\Dodo\Internal\WhatWG;
use Wikimedia\Dodo\XMLDocument;

class EPPDocumentHelper{

    public const CONTENT_TYPE = 'application/epp+xml';

    /**
     * @return EPPDocument
     */
    public static function createEPPDocument(): EPPDocument{
        return new class(null,self::CONTENT_TYPE) extends XMLDocument implements EPPDocument{

            public function createElementNS(?string $namespace, string $qualifiedName, $options = null){
                $element = parent::createElementNS($namespace, $qualifiedName, $options);
                if($this->getContentType()===EPPDocumentHelper::CONTENT_TYPE){
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