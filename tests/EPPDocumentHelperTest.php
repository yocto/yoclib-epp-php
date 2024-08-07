<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;
use Wikimedia\IDLeDOM\Element;
use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\Elements\EPPHelloElement;
use YOCLIB\EPP\Elements\EPPUnknownElement;
use YOCLIB\EPP\EPPDocumentHelper;

class EPPDocumentHelperTest extends TestCase{

    public function testCreateEPPDocument(){
        $document = EPPDocumentHelper::createEPPDocument();

        $this->assertNotNull($document);
        $this->assertEquals('application/epp+xml',$document->getContentType());
    }

    public function testSetContentType(){
        $document = EPPDocumentHelper::createEPPDocument();
        $document->setContentType('application/xml');

        $this->assertEquals('application/xml',$document->getContentType());
    }

    public function testCreateElementNS(){
        $document = EPPDocumentHelper::createEPPDocument();

        $this->assertInstanceOf(EPPEppElement::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','epp'));
        $this->assertInstanceOf(EPPHelloElement::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','hello'));
        $this->assertInstanceOf(EPPUnknownElement::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','does-not-exist'));

        $document->setContentType('application/xml');

        $this->assertInstanceOf(Element::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','epp'));
        $this->assertInstanceOf(Element::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','hello'));
        $this->assertInstanceOf(Element::class,$document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','does-not-exist'));
    }

}