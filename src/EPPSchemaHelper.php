<?php
namespace YOCLIB\EPP;

use DOMDocument;
use DOMElement;

class EPPSchemaHelper{

    /**
     * Convert Element to custom class
     * @param DOMDocument $doc
     * @param DOMElement $node
     * @return DOMDocument
     */
    public static function convertElement($doc,$node){
        return null;
    }

    /**
     * Create custom Element
     * @param DOMDocument $doc
     * @param string $class
     * @param string $name
     * @return DOMElement
     */
    private static function createElement($doc,$class,$name){
        $doc->registerNodeClass('DOMElement',$class);
        $elem = $doc->createElement($name);
        $doc->registerNodeClass('DOMElement',null);
        return $elem;
    }

    /**
     * Create custom Element with NameSpace
     * @param DOMDocument $doc
     * @param string $class
     * @param string $namespaceURI
     * @param string $qualifiedName
     * @return DOMElement
     */
    private static function createElementNS($doc,$class,$namespaceURI,$qualifiedName){
        $doc->registerNodeClass('DOMElement',$class);
        $elem = $doc->createElementNS($namespaceURI,$qualifiedName);
        $doc->registerNodeClass('DOMElement',null);
        return $elem;
    }

}