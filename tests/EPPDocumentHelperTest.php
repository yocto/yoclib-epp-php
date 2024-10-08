<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;

use Wikimedia\IDLeDOM\Element;

use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\Elements\EPPHelloElement;
use YOCLIB\EPP\Elements\EPPUnknownElement;
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\EPPNamespaces;

class EPPDocumentHelperTest extends TestCase{

    public function testCreateEPPDocument(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        $this->assertNotNull($document);
        $this->assertEquals(EPPDocumentHelper::CONTENT_TYPE,$document->getContentType());
    }

    public function testSetContentType(): void{
        $document = EPPDocumentHelper::createEPPDocument();
        $document->setContentType('application/xml');

        $this->assertEquals('application/xml',$document->getContentType());
    }

    public function testCreateElementNS(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        $this->assertInstanceOf(EPPEppElement::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'epp'));
        $this->assertInstanceOf(EPPHelloElement::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'hello'));
        $this->assertInstanceOf(EPPUnknownElement::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'does-not-exist'));
        $this->assertInstanceOf(Element::class,$document->createElementNS('does-not-exist','does-not-exist'));

        $document->setContentType('application/xml');

        $this->assertInstanceOf(Element::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'epp'));
        $this->assertInstanceOf(Element::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'hello'));
        $this->assertInstanceOf(Element::class,$document->createElementNS(EPPNamespaces::EPP_1_0,'does-not-exist'));
        $this->assertInstanceOf(Element::class,$document->createElementNS('does-not-exist','does-not-exist'));
    }

}