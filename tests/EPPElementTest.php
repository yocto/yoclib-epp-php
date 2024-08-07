<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;

use YOCLIB\EPP\Elements\EPPAbsoluteElement;
use YOCLIB\EPP\Elements\EPPAccessElement;
use YOCLIB\EPP\Elements\EPPAllElement;
use YOCLIB\EPP\Elements\EPPCheckElement;
use YOCLIB\EPP\Elements\EPPClientTransactionIdElement;
use YOCLIB\EPP\Elements\EPPCommandElement;
use YOCLIB\EPP\Elements\EPPCreateElement;
use YOCLIB\EPP\Elements\EPPDataCollectionPolicyElement;
use YOCLIB\EPP\Elements\EPPDeleteElement;
use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\Elements\EPPExpiryElement;
use YOCLIB\EPP\Elements\EPPExtensionElement;
use YOCLIB\EPP\Elements\EPPExtensionValueElement;
use YOCLIB\EPP\Elements\EPPGreetingElement;
use YOCLIB\EPP\Elements\EPPHelloElement;
use YOCLIB\EPP\Elements\EPPInformationElement;
use YOCLIB\EPP\Elements\EPPLanguageElement;
use YOCLIB\EPP\Elements\EPPLoginElement;
use YOCLIB\EPP\Elements\EPPLogoutElement;
use YOCLIB\EPP\Elements\EPPMessageQueueElement;
use YOCLIB\EPP\Elements\EPPNoneElement;
use YOCLIB\EPP\Elements\EPPNullElement;
use YOCLIB\EPP\Elements\EPPObjectUriElement;
use YOCLIB\EPP\Elements\EPPOtherElement;
use YOCLIB\EPP\Elements\EPPPersonalAndOtherElement;
use YOCLIB\EPP\Elements\EPPPersonalElement;
use YOCLIB\EPP\Elements\EPPPollElement;
use YOCLIB\EPP\Elements\EPPReasonElement;
use YOCLIB\EPP\Elements\EPPRelativeElement;
use YOCLIB\EPP\Elements\EPPRenewElement;
use YOCLIB\EPP\Elements\EPPResponseDataElement;
use YOCLIB\EPP\Elements\EPPResponseElement;
use YOCLIB\EPP\Elements\EPPResultElement;
use YOCLIB\EPP\Elements\EPPServerDateElement;
use YOCLIB\EPP\Elements\EPPServerIdElement;
use YOCLIB\EPP\Elements\EPPServiceExtensionElement;
use YOCLIB\EPP\Elements\EPPServiceMenuElement;
use YOCLIB\EPP\Elements\EPPStatementElement;
use YOCLIB\EPP\Elements\EPPTransactionIdElement;
use YOCLIB\EPP\Elements\EPPTransferElement;
use YOCLIB\EPP\Elements\EPPUpdateElement;
use YOCLIB\EPP\Elements\EPPValueElement;
use YOCLIB\EPP\Elements\EPPVersionElement;
use YOCLIB\EPP\EPPDocumentHelper;

class EPPElementTest extends TestCase{

    public function testEPPAccessElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPAccessElement $access*/
        $access = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','access');
        $this->assertInstanceOf(EPPAccessElement::class,$access);

        $this->assertNull($access->getAll());
        $this->assertNull($access->getNone());
        $this->assertNull($access->getNull());
        $this->assertNull($access->getOther());
        $this->assertNull($access->getPersonal());
        $this->assertNull($access->getPersonalOrOther());

        $all = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','all');
        $access->appendChild($all);

        $this->assertEquals($all,$access->getAll());
        $this->assertInstanceOf(EPPAllElement::class,$all);

        $none = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','none');
        $access->appendChild($none);

        $this->assertEquals($none,$access->getNone());
        $this->assertInstanceOf(EPPNoneElement::class,$none);

        $null = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','null');
        $access->appendChild($null);

        $this->assertEquals($null,$access->getNull());
        $this->assertInstanceOf(EPPNullElement::class,$null);

        $other = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','other');
        $access->appendChild($other);

        $this->assertEquals($other,$access->getOther());
        $this->assertInstanceOf(EPPOtherElement::class,$other);

        $personal = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','personal');
        $access->appendChild($personal);

        $this->assertEquals($personal,$access->getPersonal());
        $this->assertInstanceOf(EPPPersonalElement::class,$personal);

        $personalAndOther = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','personalAndOther');
        $access->appendChild($personalAndOther);

        $this->assertEquals($personalAndOther,$access->getPersonalOrOther());
        $this->assertInstanceOf(EPPPersonalAndOtherElement::class,$personalAndOther);
    }

    public function testEPPCommandElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPCommandElement $command*/
        $command = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','command');
        $this->assertInstanceOf(EPPCommandElement::class,$command);

        $this->assertNull($command->getCheck());
        $this->assertNull($command->getCreate());
        $this->assertNull($command->getDelete());
        $this->assertNull($command->getInformation());
        $this->assertNull($command->getLogin());
        $this->assertNull($command->getLogout());
        $this->assertNull($command->getPoll());
        $this->assertNull($command->getRenew());
        $this->assertNull($command->getTransfer());
        $this->assertNull($command->getUpdate());
        $this->assertNull($command->getExtension());
        $this->assertNull($command->getClientTransactionID());

        $check = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','check');
        $command->appendChild($check);

        $this->assertEquals($check,$command->getCheck());
        $this->assertInstanceOf(EPPCheckElement::class,$check);

        $create = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','create');
        $command->appendChild($create);

        $this->assertEquals($create,$command->getCreate());
        $this->assertInstanceOf(EPPCreateElement::class,$create);

        $delete = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','delete');
        $command->appendChild($delete);

        $this->assertEquals($delete,$command->getDelete());
        $this->assertInstanceOf(EPPDeleteElement::class,$delete);

        $info = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','info');
        $command->appendChild($info);

        $this->assertEquals($info,$command->getInformation());
        $this->assertInstanceOf(EPPInformationElement::class,$info);

        $login = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','login');
        $command->appendChild($login);

        $this->assertEquals($login,$command->getLogin());
        $this->assertInstanceOf(EPPLoginElement::class,$login);

        $logout = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','logout');
        $command->appendChild($logout);

        $this->assertEquals($logout,$command->getLogout());
        $this->assertInstanceOf(EPPLogoutElement::class,$logout);

        $poll = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','poll');
        $command->appendChild($poll);

        $this->assertEquals($poll,$command->getPoll());
        $this->assertInstanceOf(EPPPollElement::class,$poll);

        $renew = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','renew');
        $command->appendChild($renew);

        $this->assertEquals($renew,$command->getRenew());
        $this->assertInstanceOf(EPPRenewElement::class,$renew);

        $transfer = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','transfer');
        $command->appendChild($transfer);

        $this->assertEquals($transfer,$command->getTransfer());
        $this->assertInstanceOf(EPPTransferElement::class,$transfer);

        $update = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','update');
        $command->appendChild($update);

        $this->assertEquals($update,$command->getUpdate());
        $this->assertInstanceOf(EPPUpdateElement::class,$update);

        $extension = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','extension');
        $command->appendChild($extension);

        $this->assertEquals($extension,$command->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);

        $clTRID = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','clTRID');
        $command->appendChild($clTRID);

        $this->assertEquals($clTRID,$command->getClientTransactionID());
        $this->assertInstanceOf(EPPClientTransactionIdElement::class,$clTRID);
    }

    public function testEPPDataCollectionPolicyElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPDataCollectionPolicyElement $dcp*/
        $dcp = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','dcp');
        $this->assertInstanceOf(EPPDataCollectionPolicyElement::class,$dcp);

        $this->assertNull($dcp->getAccess());
        $this->assertEmpty($dcp->getStatement());
        $this->assertNull($dcp->getExpiry());

        $access = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','access');
        $dcp->appendChild($access);

        $this->assertEquals($access,$dcp->getAccess());
        $this->assertInstanceOf(EPPAccessElement::class,$access);

        $statement = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','statement');
        $dcp->appendChild($statement);

        $this->assertEquals($statement,$dcp->getStatement()[0]);
        $this->assertInstanceOf(EPPStatementElement::class,$statement);

        $expiry = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','expiry');
        $dcp->appendChild($expiry);

        $this->assertEquals($expiry,$dcp->getExpiry());
        $this->assertInstanceOf(EPPExpiryElement::class,$expiry);
    }

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

    public function testEPPExpiryElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPExpiryElement $expiry*/
        $expiry = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','expiry');
        $this->assertInstanceOf(EPPExpiryElement::class,$expiry);

        $this->assertNull($expiry->getAbsolute());
        $this->assertNull($expiry->getRelative());

        $absolute = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','absolute');
        $expiry->appendChild($absolute);

        $this->assertEquals($absolute,$expiry->getAbsolute());
        $this->assertInstanceOf(EPPAbsoluteElement::class,$absolute);

        $relative = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','relative');
        $expiry->appendChild($relative);

        $this->assertEquals($relative,$expiry->getRelative());
        $this->assertInstanceOf(EPPRelativeElement::class,$relative);
    }

    public function testEPPExtensionValueElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPExtensionValueElement $extValue*/
        $extValue = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','extValue');
        $this->assertInstanceOf(EPPExtensionValueElement::class,$extValue);

        $this->assertNull($extValue->getValue());
        $this->assertNull($extValue->getReason());

        $value = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','value');
        $extValue->appendChild($value);

        $this->assertEquals($value,$extValue->getValue());
        $this->assertInstanceOf(EPPValueElement::class,$value);

        $reason = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','reason');
        $extValue->appendChild($reason);

        $this->assertEquals($reason,$extValue->getReason());
        $this->assertInstanceOf(EPPReasonElement::class,$reason);
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

    public function testEPPResponseElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPResponseElement $response*/
        $response = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','response');
        $this->assertInstanceOf(EPPResponseElement::class,$response);

        $result = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','result');
        $response->appendChild($result);

        $this->assertEquals($result,$response->getResult()[0]);
        $this->assertInstanceOf(EPPResultElement::class,$result);

        $msgQ = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','msgQ');
        $response->appendChild($msgQ);

        $this->assertEquals($msgQ,$response->getMessageQueue());
        $this->assertInstanceOf(EPPMessageQueueElement::class,$msgQ);

        $resData = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','resData');
        $response->appendChild($resData);

        $this->assertEquals($resData,$response->getResponseData());
        $this->assertInstanceOf(EPPResponseDataElement::class,$resData);

        $extension = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','extension');
        $response->appendChild($extension);

        $this->assertEquals($extension,$response->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);

        $trID = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','trID');
        $response->appendChild($trID);

        $this->assertEquals($trID,$response->getTransactionID());
        $this->assertInstanceOf(EPPTransactionIdElement::class,$trID);
    }

    public function testEPPServiceMenuElement(){
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPServiceMenuElement $svcMenu*/
        $svcMenu = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','svcMenu');
        $this->assertInstanceOf(EPPServiceMenuElement::class,$svcMenu);

        $this->assertEmpty($svcMenu->getVersion());
        $this->assertEmpty($svcMenu->getLanguage());
        $this->assertEmpty($svcMenu->getObjectURI());
        $this->assertNull($svcMenu->getServiceExtension());

        $version = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','version');
        $svcMenu->appendChild($version);

        $this->assertEquals($version,$svcMenu->getVersion()[0]);
        $this->assertInstanceOf(EPPVersionElement::class,$version);

        $lang = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','lang');
        $svcMenu->appendChild($lang);

        $this->assertEquals($lang,$svcMenu->getLanguage()[0]);
        $this->assertInstanceOf(EPPLanguageElement::class,$lang);

        $objURI = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','objURI');
        $svcMenu->appendChild($objURI);

        $this->assertEquals($objURI,$svcMenu->getObjectURI()[0]);
        $this->assertInstanceOf(EPPObjectUriElement::class,$objURI);

        $svcExtension = $document->createElementNS('urn:ietf:params:xml:ns:epp-1.0','svcExtension');
        $svcMenu->appendChild($svcExtension);

        $this->assertEquals($svcExtension,$svcMenu->getServiceExtension());
        $this->assertInstanceOf(EPPServiceExtensionElement::class,$svcExtension);
    }

}