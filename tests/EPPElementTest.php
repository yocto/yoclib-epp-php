<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;

use YOCLIB\EPP\Elements\EPPCommandElement;
use YOCLIB\EPP\Elements\EPPDataCollectionPolicyElement;
use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\Elements\EPPExtensionElement;
use YOCLIB\EPP\Elements\EPPGreetingElement;
use YOCLIB\EPP\Elements\EPPHelloElement;
use YOCLIB\EPP\Elements\EPPResponseElement;
use YOCLIB\EPP\Elements\EPPServerDateElement;
use YOCLIB\EPP\Elements\EPPServerIdElement;
use YOCLIB\EPP\Elements\EPPServiceMenuElement;
use YOCLIB\EPP\EPPDocumentHelper;

class EPPElementTest extends TestCase{

    public function testEPPEppElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPEppElement $epp*/
        $epp = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','epp');
        $this->assertInstanceOf(EPPEppElement::class,$epp);

        $this->assertNull($epp->getGreeting());
        $this->assertNull($epp->getHello());
        $this->assertNull($epp->getCommand());
        $this->assertNull($epp->getResponse());
        $this->assertNull($epp->getExtension());

        $greeting = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','greeting');
        $epp->appendChild($greeting);

        $this->assertEquals($greeting,$epp->getGreeting());
        $this->assertInstanceOf(EPPGreetingElement::class,$greeting);

        $hello = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','hello');
        $epp->appendChild($hello);

        $this->assertEquals($hello,$epp->getHello());
        $this->assertInstanceOf(EPPHelloElement::class,$hello);

        $command = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','command');
        $epp->appendChild($command);

        $this->assertEquals($command,$epp->getCommand());
        $this->assertInstanceOf(EPPCommandElement::class,$command);

        $response = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','response');
        $epp->appendChild($response);

        $this->assertEquals($response,$epp->getResponse());
        $this->assertInstanceOf(EPPResponseElement::class,$response);

        $extension = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','extension');
        $epp->appendChild($extension);

        $this->assertEquals($extension,$epp->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);
    }

    public function testEPPGreetingElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPGreetingElement $greeting*/
        $greeting = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','greeting');
        $this->assertInstanceOf(EPPGreetingElement::class,$greeting);

        $this->assertNull($greeting->getServerID());
        $this->assertNull($greeting->getServerDate());
        $this->assertNull($greeting->getServiceMenu());
        $this->assertNull($greeting->getDataCollectionPolicy());

        $svID = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','svID');
        $greeting->appendChild($svID);

        $this->assertEquals($svID,$greeting->getServerID());
        $this->assertInstanceOf(EPPServerIdElement::class,$svID);

        $svDate = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','svDate');
        $greeting->appendChild($svDate);

        $this->assertEquals($svDate,$greeting->getServerDate());
        $this->assertInstanceOf(EPPServerDateElement::class,$svDate);

        $svcMenu = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','svcMenu');
        $greeting->appendChild($svcMenu);

        $this->assertEquals($svcMenu,$greeting->getServiceMenu());
        $this->assertInstanceOf(EPPServiceMenuElement::class,$svcMenu);

        $dcp = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','dcp');
        $greeting->appendChild($dcp);

        $this->assertEquals($dcp,$greeting->getDataCollectionPolicy());
        $this->assertInstanceOf(EPPDataCollectionPolicyElement::class,$dcp);
    }

}