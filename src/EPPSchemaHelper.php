<?php
namespace YOCLIB\EPP;

use DOMDocument;
use DOMElement;
use DOMNamedNodeMap;
use DOMNodeList;

use YOCLIB\EPP\Schemas\EPP\EPPCommandElement;
use YOCLIB\EPP\Schemas\EPP\EPPEppElement;
use YOCLIB\EPP\Schemas\EPP\EPPExtensionElement;
use YOCLIB\EPP\Schemas\EPP\EPPGreetingElement;
use YOCLIB\EPP\Schemas\EPP\EPPHelloElement;
use YOCLIB\EPP\Schemas\EPP\EPPResponseElement;
use YOCLIB\EPP\Schemas\EPP\EPPResultElement;

class EPPSchemaHelper{

    private const NS_EPP_1_0 = 'urn:ietf:params:xml:ns:epp-1.0';

    private const ELEMENTS = [
        [self::NS_EPP_1_0,'epp',EPPEppElement::class],

        [self::NS_EPP_1_0,'greeting',EPPGreetingElement::class],
        [self::NS_EPP_1_0,'hello',EPPHelloElement::class],
        [self::NS_EPP_1_0,'command',EPPCommandElement::class],
        [self::NS_EPP_1_0,'response',EPPResponseElement::class],
        [self::NS_EPP_1_0,'extension',EPPExtensionElement::class],

        [self::NS_EPP_1_0,'result',EPPResultElement::class],
    ];

    private static $collector = [];

    public static function clearCollector(){
        self::$collector = [];
    }

    /**
     * Convert Element to custom class
     * @param DOMDocument $doc
     * @param DOMElement $element
     */
    public static function convertElement($doc,$element){
        foreach(self::ELEMENTS AS $elem){
            if($element->namespaceURI==$elem[0] && $element->tagName==$elem[1]){
                self::$collector[] = $newElement = self::createElementNS($doc,$elem[2],$elem[0],$elem[1]);
                $element->parentNode->replaceChild($newElement,$element);
                foreach(self::nodeListToArray($element->childNodes) AS $childNode){
                    $newElement->appendChild($childNode);
                }
                foreach(self::nodeListToArray($element->attributes) AS $attribute){
                    $newElement->setAttributeNode($attribute);
                }
            }
        }
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

    /**
     * @param DOMNamedNodeMap|DOMNodeList $nodeList
     * @return array
     */
    private static function nodeListToArray($nodeList){
        $array = [];
        foreach($nodeList AS $childNode){
            $array[] = $childNode;
        }
        return $array;
    }

}