<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;

use YOCLIB\EPP\Elements\EPPAbsoluteElement;
use YOCLIB\EPP\Elements\EPPAccessElement;
use YOCLIB\EPP\Elements\EPPAdministrationElement;
use YOCLIB\EPP\Elements\EPPAllElement;
use YOCLIB\EPP\Elements\EPPBusinessElement;
use YOCLIB\EPP\Elements\EPPCheckElement;
use YOCLIB\EPP\Elements\EPPClientIdElement;
use YOCLIB\EPP\Elements\EPPClientTransactionIdElement;
use YOCLIB\EPP\Elements\EPPCommandElement;
use YOCLIB\EPP\Elements\EPPContactElement;
use YOCLIB\EPP\Elements\EPPCreateElement;
use YOCLIB\EPP\Elements\EPPDataCollectionPolicyElement;
use YOCLIB\EPP\Elements\EPPDeleteElement;
use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\Elements\EPPExpiryElement;
use YOCLIB\EPP\Elements\EPPExtensionElement;
use YOCLIB\EPP\Elements\EPPExtensionUriElement;
use YOCLIB\EPP\Elements\EPPExtensionValueElement;
use YOCLIB\EPP\Elements\EPPGreetingElement;
use YOCLIB\EPP\Elements\EPPHelloElement;
use YOCLIB\EPP\Elements\EPPIndefiniteElement;
use YOCLIB\EPP\Elements\EPPInformationElement;
use YOCLIB\EPP\Elements\EPPLanguageElement;
use YOCLIB\EPP\Elements\EPPLegalElement;
use YOCLIB\EPP\Elements\EPPLoginElement;
use YOCLIB\EPP\Elements\EPPLogoutElement;
use YOCLIB\EPP\Elements\EPPMessageElement;
use YOCLIB\EPP\Elements\EPPMessageQueueElement;
use YOCLIB\EPP\Elements\EPPNewPasswordElement;
use YOCLIB\EPP\Elements\EPPNoneElement;
use YOCLIB\EPP\Elements\EPPNullElement;
use YOCLIB\EPP\Elements\EPPObjectUriElement;
use YOCLIB\EPP\Elements\EPPOptionsElement;
use YOCLIB\EPP\Elements\EPPOtherElement;
use YOCLIB\EPP\Elements\EPPOursElement;
use YOCLIB\EPP\Elements\EPPPasswordElement;
use YOCLIB\EPP\Elements\EPPPersonalAndOtherElement;
use YOCLIB\EPP\Elements\EPPPersonalElement;
use YOCLIB\EPP\Elements\EPPPollElement;
use YOCLIB\EPP\Elements\EPPProvisioningElement;
use YOCLIB\EPP\Elements\EPPPublicElement;
use YOCLIB\EPP\Elements\EPPPurposeElement;
use YOCLIB\EPP\Elements\EPPQueueDateElement;
use YOCLIB\EPP\Elements\EPPReasonElement;
use YOCLIB\EPP\Elements\EPPRecipientDescriptionElement;
use YOCLIB\EPP\Elements\EPPRecipientElement;
use YOCLIB\EPP\Elements\EPPRelativeElement;
use YOCLIB\EPP\Elements\EPPRenewElement;
use YOCLIB\EPP\Elements\EPPResponseDataElement;
use YOCLIB\EPP\Elements\EPPResponseElement;
use YOCLIB\EPP\Elements\EPPResultElement;
use YOCLIB\EPP\Elements\EPPRetentionElement;
use YOCLIB\EPP\Elements\EPPSameElement;
use YOCLIB\EPP\Elements\EPPServerDateElement;
use YOCLIB\EPP\Elements\EPPServerIdElement;
use YOCLIB\EPP\Elements\EPPServerTransactionIdElement;
use YOCLIB\EPP\Elements\EPPServiceExtensionElement;
use YOCLIB\EPP\Elements\EPPServiceMenuElement;
use YOCLIB\EPP\Elements\EPPServicesElement;
use YOCLIB\EPP\Elements\EPPStatedElement;
use YOCLIB\EPP\Elements\EPPStatementElement;
use YOCLIB\EPP\Elements\EPPTransactionIdElement;
use YOCLIB\EPP\Elements\EPPTransferElement;
use YOCLIB\EPP\Elements\EPPUnrelatedElement;
use YOCLIB\EPP\Elements\EPPUpdateElement;
use YOCLIB\EPP\Elements\EPPValueElement;
use YOCLIB\EPP\Elements\EPPVersionElement;
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\EPPNamespaces;

class EPPElementTest extends TestCase{

    public function testEPPAccessElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPAccessElement $access*/
        $access = $document->createElementNS(EPPNamespaces::EPP_1_0,'access');
        $this->assertInstanceOf(EPPAccessElement::class,$access);

        $this->assertNull($access->getAll());
        $this->assertNull($access->getNone());
        $this->assertNull($access->getNull());
        $this->assertNull($access->getOther());
        $this->assertNull($access->getPersonal());
        $this->assertNull($access->getPersonalOrOther());

        $all = $document->createElementNS(EPPNamespaces::EPP_1_0,'all');
        $access->appendChild($all);

        $this->assertEquals($all,$access->getAll());
        $this->assertInstanceOf(EPPAllElement::class,$all);

        $none = $document->createElementNS(EPPNamespaces::EPP_1_0,'none');
        $access->appendChild($none);

        $this->assertEquals($none,$access->getNone());
        $this->assertInstanceOf(EPPNoneElement::class,$none);

        $null = $document->createElementNS(EPPNamespaces::EPP_1_0,'null');
        $access->appendChild($null);

        $this->assertEquals($null,$access->getNull());
        $this->assertInstanceOf(EPPNullElement::class,$null);

        $other = $document->createElementNS(EPPNamespaces::EPP_1_0,'other');
        $access->appendChild($other);

        $this->assertEquals($other,$access->getOther());
        $this->assertInstanceOf(EPPOtherElement::class,$other);

        $personal = $document->createElementNS(EPPNamespaces::EPP_1_0,'personal');
        $access->appendChild($personal);

        $this->assertEquals($personal,$access->getPersonal());
        $this->assertInstanceOf(EPPPersonalElement::class,$personal);

        $personalAndOther = $document->createElementNS(EPPNamespaces::EPP_1_0,'personalAndOther');
        $access->appendChild($personalAndOther);

        $this->assertEquals($personalAndOther,$access->getPersonalOrOther());
        $this->assertInstanceOf(EPPPersonalAndOtherElement::class,$personalAndOther);
    }

    public function testEPPCommandElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPCommandElement $command*/
        $command = $document->createElementNS(EPPNamespaces::EPP_1_0,'command');
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

        $check = $document->createElementNS(EPPNamespaces::EPP_1_0,'check');
        $command->appendChild($check);

        $this->assertEquals($check,$command->getCheck());
        $this->assertInstanceOf(EPPCheckElement::class,$check);

        $create = $document->createElementNS(EPPNamespaces::EPP_1_0,'create');
        $command->appendChild($create);

        $this->assertEquals($create,$command->getCreate());
        $this->assertInstanceOf(EPPCreateElement::class,$create);

        $delete = $document->createElementNS(EPPNamespaces::EPP_1_0,'delete');
        $command->appendChild($delete);

        $this->assertEquals($delete,$command->getDelete());
        $this->assertInstanceOf(EPPDeleteElement::class,$delete);

        $info = $document->createElementNS(EPPNamespaces::EPP_1_0,'info');
        $command->appendChild($info);

        $this->assertEquals($info,$command->getInformation());
        $this->assertInstanceOf(EPPInformationElement::class,$info);

        $login = $document->createElementNS(EPPNamespaces::EPP_1_0,'login');
        $command->appendChild($login);

        $this->assertEquals($login,$command->getLogin());
        $this->assertInstanceOf(EPPLoginElement::class,$login);

        $logout = $document->createElementNS(EPPNamespaces::EPP_1_0,'logout');
        $command->appendChild($logout);

        $this->assertEquals($logout,$command->getLogout());
        $this->assertInstanceOf(EPPLogoutElement::class,$logout);

        $poll = $document->createElementNS(EPPNamespaces::EPP_1_0,'poll');
        $command->appendChild($poll);

        $this->assertEquals($poll,$command->getPoll());
        $this->assertInstanceOf(EPPPollElement::class,$poll);

        $renew = $document->createElementNS(EPPNamespaces::EPP_1_0,'renew');
        $command->appendChild($renew);

        $this->assertEquals($renew,$command->getRenew());
        $this->assertInstanceOf(EPPRenewElement::class,$renew);

        $transfer = $document->createElementNS(EPPNamespaces::EPP_1_0,'transfer');
        $command->appendChild($transfer);

        $this->assertEquals($transfer,$command->getTransfer());
        $this->assertInstanceOf(EPPTransferElement::class,$transfer);

        $update = $document->createElementNS(EPPNamespaces::EPP_1_0,'update');
        $command->appendChild($update);

        $this->assertEquals($update,$command->getUpdate());
        $this->assertInstanceOf(EPPUpdateElement::class,$update);

        $extension = $document->createElementNS(EPPNamespaces::EPP_1_0,'extension');
        $command->appendChild($extension);

        $this->assertEquals($extension,$command->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);

        $clTRID = $document->createElementNS(EPPNamespaces::EPP_1_0,'clTRID');
        $command->appendChild($clTRID);

        $this->assertEquals($clTRID,$command->getClientTransactionID());
        $this->assertInstanceOf(EPPClientTransactionIdElement::class,$clTRID);
    }

    public function testEPPDataCollectionPolicyElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPDataCollectionPolicyElement $dcp*/
        $dcp = $document->createElementNS(EPPNamespaces::EPP_1_0,'dcp');
        $this->assertInstanceOf(EPPDataCollectionPolicyElement::class,$dcp);

        $this->assertNull($dcp->getAccess());
        $this->assertEmpty($dcp->getStatement());
        $this->assertNull($dcp->getExpiry());

        $access = $document->createElementNS(EPPNamespaces::EPP_1_0,'access');
        $dcp->appendChild($access);

        $this->assertEquals($access,$dcp->getAccess());
        $this->assertInstanceOf(EPPAccessElement::class,$access);

        $statement = $document->createElementNS(EPPNamespaces::EPP_1_0,'statement');
        $dcp->appendChild($statement);

        $this->assertEquals($statement,$dcp->getStatement()[0]);
        $this->assertInstanceOf(EPPStatementElement::class,$statement);

        $expiry = $document->createElementNS(EPPNamespaces::EPP_1_0,'expiry');
        $dcp->appendChild($expiry);

        $this->assertEquals($expiry,$dcp->getExpiry());
        $this->assertInstanceOf(EPPExpiryElement::class,$expiry);
    }

    public function testEPPEppElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPEppElement $epp*/
        $epp = $document->createElementNS(EPPNamespaces::EPP_1_0,'epp');
        $this->assertInstanceOf(EPPEppElement::class,$epp);

        $this->assertNull($epp->getGreeting());
        $this->assertNull($epp->getHello());
        $this->assertNull($epp->getCommand());
        $this->assertNull($epp->getResponse());
        $this->assertNull($epp->getExtension());

        $greeting = $document->createElementNS(EPPNamespaces::EPP_1_0,'greeting');
        $epp->appendChild($greeting);

        $this->assertEquals($greeting,$epp->getGreeting());
        $this->assertInstanceOf(EPPGreetingElement::class,$greeting);

        $hello = $document->createElementNS(EPPNamespaces::EPP_1_0,'hello');
        $epp->appendChild($hello);

        $this->assertEquals($hello,$epp->getHello());
        $this->assertInstanceOf(EPPHelloElement::class,$hello);

        $command = $document->createElementNS(EPPNamespaces::EPP_1_0,'command');
        $epp->appendChild($command);

        $this->assertEquals($command,$epp->getCommand());
        $this->assertInstanceOf(EPPCommandElement::class,$command);

        $response = $document->createElementNS(EPPNamespaces::EPP_1_0,'response');
        $epp->appendChild($response);

        $this->assertEquals($response,$epp->getResponse());
        $this->assertInstanceOf(EPPResponseElement::class,$response);

        $extension = $document->createElementNS(EPPNamespaces::EPP_1_0,'extension');
        $epp->appendChild($extension);

        $this->assertEquals($extension,$epp->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);
    }

    public function testEPPExpiryElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPExpiryElement $expiry*/
        $expiry = $document->createElementNS(EPPNamespaces::EPP_1_0,'expiry');
        $this->assertInstanceOf(EPPExpiryElement::class,$expiry);

        $this->assertNull($expiry->getAbsolute());
        $this->assertNull($expiry->getRelative());

        $absolute = $document->createElementNS(EPPNamespaces::EPP_1_0,'absolute');
        $expiry->appendChild($absolute);

        $this->assertEquals($absolute,$expiry->getAbsolute());
        $this->assertInstanceOf(EPPAbsoluteElement::class,$absolute);

        $relative = $document->createElementNS(EPPNamespaces::EPP_1_0,'relative');
        $expiry->appendChild($relative);

        $this->assertEquals($relative,$expiry->getRelative());
        $this->assertInstanceOf(EPPRelativeElement::class,$relative);
    }

    public function testEPPExtensionValueElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPExtensionValueElement $extValue*/
        $extValue = $document->createElementNS(EPPNamespaces::EPP_1_0,'extValue');
        $this->assertInstanceOf(EPPExtensionValueElement::class,$extValue);

        $this->assertNull($extValue->getValue());
        $this->assertNull($extValue->getReason());

        $value = $document->createElementNS(EPPNamespaces::EPP_1_0,'value');
        $extValue->appendChild($value);

        $this->assertEquals($value,$extValue->getValue());
        $this->assertInstanceOf(EPPValueElement::class,$value);

        $reason = $document->createElementNS(EPPNamespaces::EPP_1_0,'reason');
        $extValue->appendChild($reason);

        $this->assertEquals($reason,$extValue->getReason());
        $this->assertInstanceOf(EPPReasonElement::class,$reason);
    }

    public function testEPPGreetingElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPGreetingElement $greeting*/
        $greeting = $document->createElementNS(EPPNamespaces::EPP_1_0,'greeting');
        $this->assertInstanceOf(EPPGreetingElement::class,$greeting);

        $this->assertNull($greeting->getServerID());
        $this->assertNull($greeting->getServerDate());
        $this->assertNull($greeting->getServiceMenu());
        $this->assertNull($greeting->getDataCollectionPolicy());

        $svID = $document->createElementNS(EPPNamespaces::EPP_1_0,'svID');
        $greeting->appendChild($svID);

        $this->assertEquals($svID,$greeting->getServerID());
        $this->assertInstanceOf(EPPServerIdElement::class,$svID);

        $svDate = $document->createElementNS(EPPNamespaces::EPP_1_0,'svDate');
        $greeting->appendChild($svDate);

        $this->assertEquals($svDate,$greeting->getServerDate());
        $this->assertInstanceOf(EPPServerDateElement::class,$svDate);

        $svcMenu = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcMenu');
        $greeting->appendChild($svcMenu);

        $this->assertEquals($svcMenu,$greeting->getServiceMenu());
        $this->assertInstanceOf(EPPServiceMenuElement::class,$svcMenu);

        $dcp = $document->createElementNS(EPPNamespaces::EPP_1_0,'dcp');
        $greeting->appendChild($dcp);

        $this->assertEquals($dcp,$greeting->getDataCollectionPolicy());
        $this->assertInstanceOf(EPPDataCollectionPolicyElement::class,$dcp);
    }

    public function testEPPLoginElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPLoginElement $login*/
        $login = $document->createElementNS(EPPNamespaces::EPP_1_0,'login');
        $this->assertInstanceOf(EPPLoginElement::class,$login);

        $this->assertNull($login->getClientID());
        $this->assertNull($login->getPassword());
        $this->assertNull($login->getNewPassword());
        $this->assertNull($login->getOptions());
        $this->assertNull($login->getServices());

        $clID = $document->createElementNS(EPPNamespaces::EPP_1_0,'clID');
        $login->appendChild($clID);

        $this->assertEquals($clID,$login->getClientID());
        $this->assertInstanceOf(EPPClientIdElement::class,$clID);

        $pw = $document->createElementNS(EPPNamespaces::EPP_1_0,'pw');
        $login->appendChild($pw);

        $this->assertEquals($pw,$login->getPassword());
        $this->assertInstanceOf(EPPPasswordElement::class,$pw);

        $newPW = $document->createElementNS(EPPNamespaces::EPP_1_0,'newPW');
        $login->appendChild($newPW);

        $this->assertEquals($newPW,$login->getNewPassword());
        $this->assertInstanceOf(EPPNewPasswordElement::class,$newPW);

        $options = $document->createElementNS(EPPNamespaces::EPP_1_0,'options');
        $login->appendChild($options);

        $this->assertEquals($options,$login->getOptions());
        $this->assertInstanceOf(EPPOptionsElement::class,$options);

        $svcs = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcs');
        $login->appendChild($svcs);

        $this->assertEquals($svcs,$login->getServices());
        $this->assertInstanceOf(EPPServicesElement::class,$svcs);
    }

    public function testEPPMessageQueueElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPMessageQueueElement $msgQ*/
        $msgQ = $document->createElementNS(EPPNamespaces::EPP_1_0,'msgQ');
        $this->assertInstanceOf(EPPMessageQueueElement::class,$msgQ);

        $this->assertNull($msgQ->getQueueDate());
        $this->assertNull($msgQ->getMessage());

        $qDate = $document->createElementNS(EPPNamespaces::EPP_1_0,'qDate');
        $msgQ->appendChild($qDate);

        $this->assertEquals($qDate,$msgQ->getQueueDate());
        $this->assertInstanceOf(EPPQueueDateElement::class,$qDate);

        $msg = $document->createElementNS(EPPNamespaces::EPP_1_0,'msg');
        $msgQ->appendChild($msg);

        $this->assertEquals($msg,$msgQ->getMessage());
        $this->assertInstanceOf(EPPMessageElement::class,$msg);
    }

    public function testEPPOptionsElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPOptionsElement $options*/
        $options = $document->createElementNS(EPPNamespaces::EPP_1_0,'options');
        $this->assertInstanceOf(EPPOptionsElement::class,$options);

        $this->assertNull($options->getVersion());
        $this->assertNull($options->getLanguage());

        $version = $document->createElementNS(EPPNamespaces::EPP_1_0,'version');
        $options->appendChild($version);

        $this->assertEquals($version,$options->getVersion());
        $this->assertInstanceOf(EPPVersionElement::class,$version);

        $lang = $document->createElementNS(EPPNamespaces::EPP_1_0,'lang');
        $options->appendChild($lang);

        $this->assertEquals($lang,$options->getLanguage());
        $this->assertInstanceOf(EPPLanguageElement::class,$lang);
    }

    public function testEPPOursElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPOursElement $ours*/
        $ours = $document->createElementNS(EPPNamespaces::EPP_1_0,'ours');
        $this->assertInstanceOf(EPPOursElement::class,$ours);

        $this->assertNull($ours->getRecipientDescription());

        $recDesc = $document->createElementNS(EPPNamespaces::EPP_1_0,'recDesc');
        $ours->appendChild($recDesc);

        $this->assertEquals($recDesc,$ours->getRecipientDescription());
        $this->assertInstanceOf(EPPRecipientDescriptionElement::class,$recDesc);
    }

    public function testEPPPurposeElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPPurposeElement $purpose*/
        $purpose = $document->createElementNS(EPPNamespaces::EPP_1_0,'purpose');
        $this->assertInstanceOf(EPPPurposeElement::class,$purpose);

        $this->assertNull($purpose->getAdministration());
        $this->assertNull($purpose->getContact());
        $this->assertNull($purpose->getOther());
        $this->assertNull($purpose->getProvisioning());

        $admin = $document->createElementNS(EPPNamespaces::EPP_1_0,'admin');
        $purpose->appendChild($admin);

        $this->assertEquals($admin,$purpose->getAdministration());
        $this->assertInstanceOf(EPPAdministrationElement::class,$admin);

        $contact = $document->createElementNS(EPPNamespaces::EPP_1_0,'contact');
        $purpose->appendChild($contact);

        $this->assertEquals($contact,$purpose->getContact());
        $this->assertInstanceOf(EPPContactElement::class,$contact);

        $other = $document->createElementNS(EPPNamespaces::EPP_1_0,'other');
        $purpose->appendChild($other);

        $this->assertEquals($other,$purpose->getOther());
        $this->assertInstanceOf(EPPOtherElement::class,$other);

        $prov = $document->createElementNS(EPPNamespaces::EPP_1_0,'prov');
        $purpose->appendChild($prov);

        $this->assertEquals($prov,$purpose->getProvisioning());
        $this->assertInstanceOf(EPPProvisioningElement::class,$prov);
    }

    public function testEPPRecipientElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPRecipientElement $recipient*/
        $recipient = $document->createElementNS(EPPNamespaces::EPP_1_0,'recipient');
        $this->assertInstanceOf(EPPRecipientElement::class,$recipient);

        $this->assertNull($recipient->getOther());
        $this->assertEmpty($recipient->getOurs());
        $this->assertNull($recipient->getPublic());
        $this->assertNull($recipient->getSame());
        $this->assertNull($recipient->getUnrelated());

        $other = $document->createElementNS(EPPNamespaces::EPP_1_0,'other');
        $recipient->appendChild($other);

        $this->assertEquals($other,$recipient->getOther());
        $this->assertInstanceOf(EPPOtherElement::class,$other);

        $ours = $document->createElementNS(EPPNamespaces::EPP_1_0,'ours');
        $recipient->appendChild($ours);

        $this->assertEquals($ours,$recipient->getOurs()[0]);
        $this->assertInstanceOf(EPPOursElement::class,$ours);

        $public = $document->createElementNS(EPPNamespaces::EPP_1_0,'public');
        $recipient->appendChild($public);

        $this->assertEquals($public,$recipient->getPublic());
        $this->assertInstanceOf(EPPPublicElement::class,$public);

        $same = $document->createElementNS(EPPNamespaces::EPP_1_0,'same');
        $recipient->appendChild($same);

        $this->assertEquals($same,$recipient->getSame());
        $this->assertInstanceOf(EPPSameElement::class,$same);

        $unrelated = $document->createElementNS(EPPNamespaces::EPP_1_0,'unrelated');
        $recipient->appendChild($unrelated);

        $this->assertEquals($unrelated,$recipient->getUnrelated());
        $this->assertInstanceOf(EPPUnrelatedElement::class,$unrelated);
    }

    public function testEPPResponseElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPResponseElement $response*/
        $response = $document->createElementNS(EPPNamespaces::EPP_1_0,'response');
        $this->assertInstanceOf(EPPResponseElement::class,$response);

        $this->assertEmpty($response->getResult());
        $this->assertNull($response->getMessageQueue());
        $this->assertNull($response->getResponseData());
        $this->assertNull($response->getExtension());
        $this->assertNull($response->getTransactionID());

        $result = $document->createElementNS(EPPNamespaces::EPP_1_0,'result');
        $response->appendChild($result);

        $this->assertEquals($result,$response->getResult()[0]);
        $this->assertInstanceOf(EPPResultElement::class,$result);

        $msgQ = $document->createElementNS(EPPNamespaces::EPP_1_0,'msgQ');
        $response->appendChild($msgQ);

        $this->assertEquals($msgQ,$response->getMessageQueue());
        $this->assertInstanceOf(EPPMessageQueueElement::class,$msgQ);

        $resData = $document->createElementNS(EPPNamespaces::EPP_1_0,'resData');
        $response->appendChild($resData);

        $this->assertEquals($resData,$response->getResponseData());
        $this->assertInstanceOf(EPPResponseDataElement::class,$resData);

        $extension = $document->createElementNS(EPPNamespaces::EPP_1_0,'extension');
        $response->appendChild($extension);

        $this->assertEquals($extension,$response->getExtension());
        $this->assertInstanceOf(EPPExtensionElement::class,$extension);

        $trID = $document->createElementNS(EPPNamespaces::EPP_1_0,'trID');
        $response->appendChild($trID);

        $this->assertEquals($trID,$response->getTransactionID());
        $this->assertInstanceOf(EPPTransactionIdElement::class,$trID);
    }

    public function testEPPResultElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPResultElement $result*/
        $result = $document->createElementNS(EPPNamespaces::EPP_1_0,'result');
        $this->assertInstanceOf(EPPResultElement::class,$result);

        $this->assertNull($result->getMessage());
        $this->assertEmpty($result->getValue());
        $this->assertEmpty($result->getExtensionValue());

        $msg = $document->createElementNS(EPPNamespaces::EPP_1_0,'msg');
        $result->appendChild($msg);

        $this->assertEquals($msg,$result->getMessage());
        $this->assertInstanceOf(EPPMessageElement::class,$msg);

        $value = $document->createElementNS(EPPNamespaces::EPP_1_0,'value');
        $result->appendChild($value);

        $this->assertEquals($value,$result->getValue()[0]);
        $this->assertInstanceOf(EPPValueElement::class,$value);

        $extValue = $document->createElementNS(EPPNamespaces::EPP_1_0,'extValue');
        $result->appendChild($extValue);

        $this->assertEquals($extValue,$result->getExtensionValue()[0]);
        $this->assertInstanceOf(EPPExtensionValueElement::class,$extValue);
    }

    public function testEPPRetentionElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPRetentionElement $retention*/
        $retention = $document->createElementNS(EPPNamespaces::EPP_1_0,'retention');
        $this->assertInstanceOf(EPPRetentionElement::class,$retention);

        $this->assertNull($retention->getBusiness());
        $this->assertNull($retention->getIndefinite());
        $this->assertNull($retention->getLegal());
        $this->assertNull($retention->getNone());
        $this->assertNull($retention->getStated());

        $business = $document->createElementNS(EPPNamespaces::EPP_1_0,'business');
        $retention->appendChild($business);

        $this->assertEquals($business,$retention->getBusiness());
        $this->assertInstanceOf(EPPBusinessElement::class,$business);

        $indefinite = $document->createElementNS(EPPNamespaces::EPP_1_0,'indefinite');
        $retention->appendChild($indefinite);

        $this->assertEquals($indefinite,$retention->getIndefinite());
        $this->assertInstanceOf(EPPIndefiniteElement::class,$indefinite);

        $legal = $document->createElementNS(EPPNamespaces::EPP_1_0,'legal');
        $retention->appendChild($legal);

        $this->assertEquals($legal,$retention->getLegal());
        $this->assertInstanceOf(EPPLegalElement::class,$legal);

        $none = $document->createElementNS(EPPNamespaces::EPP_1_0,'none');
        $retention->appendChild($none);

        $this->assertEquals($none,$retention->getNone());
        $this->assertInstanceOf(EPPNoneElement::class,$none);

        $stated = $document->createElementNS(EPPNamespaces::EPP_1_0,'stated');
        $retention->appendChild($stated);

        $this->assertEquals($stated,$retention->getStated());
        $this->assertInstanceOf(EPPStatedElement::class,$stated);
    }

    public function testEPPServiceExtensionElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPServiceExtensionElement $svcExtension*/
        $svcExtension = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcExtension');
        $this->assertInstanceOf(EPPServiceExtensionElement::class,$svcExtension);

        $this->assertEmpty($svcExtension->getExtensionURI());

        $extURI = $document->createElementNS(EPPNamespaces::EPP_1_0,'extURI');
        $svcExtension->appendChild($extURI);

        $this->assertEquals($extURI,$svcExtension->getExtensionURI()[0]);
        $this->assertInstanceOf(EPPExtensionUriElement::class,$extURI);
    }

    public function testEPPServiceMenuElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPServiceMenuElement $svcMenu*/
        $svcMenu = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcMenu');
        $this->assertInstanceOf(EPPServiceMenuElement::class,$svcMenu);

        $this->assertEmpty($svcMenu->getVersion());
        $this->assertEmpty($svcMenu->getLanguage());
        $this->assertEmpty($svcMenu->getObjectURI());
        $this->assertNull($svcMenu->getServiceExtension());

        $version = $document->createElementNS(EPPNamespaces::EPP_1_0,'version');
        $svcMenu->appendChild($version);

        $this->assertEquals($version,$svcMenu->getVersion()[0]);
        $this->assertInstanceOf(EPPVersionElement::class,$version);

        $lang = $document->createElementNS(EPPNamespaces::EPP_1_0,'lang');
        $svcMenu->appendChild($lang);

        $this->assertEquals($lang,$svcMenu->getLanguage()[0]);
        $this->assertInstanceOf(EPPLanguageElement::class,$lang);

        $objURI = $document->createElementNS(EPPNamespaces::EPP_1_0,'objURI');
        $svcMenu->appendChild($objURI);

        $this->assertEquals($objURI,$svcMenu->getObjectURI()[0]);
        $this->assertInstanceOf(EPPObjectUriElement::class,$objURI);

        $svcExtension = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcExtension');
        $svcMenu->appendChild($svcExtension);

        $this->assertEquals($svcExtension,$svcMenu->getServiceExtension());
        $this->assertInstanceOf(EPPServiceExtensionElement::class,$svcExtension);
    }

    public function testEPPServicesElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPServicesElement $svcs*/
        $svcs = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcs');
        $this->assertInstanceOf(EPPServicesElement::class,$svcs);

        $this->assertEmpty($svcs->getObjectURI());
        $this->assertNull($svcs->getServiceExtension());

        $objURI = $document->createElementNS(EPPNamespaces::EPP_1_0,'objURI');
        $svcs->appendChild($objURI);

        $this->assertEquals($objURI,$svcs->getObjectURI()[0]);
        $this->assertInstanceOf(EPPObjectUriElement::class,$objURI);

        $svcExtension = $document->createElementNS(EPPNamespaces::EPP_1_0,'svcExtension');
        $svcs->appendChild($svcExtension);

        $this->assertEquals($svcExtension,$svcs->getServiceExtension());
        $this->assertInstanceOf(EPPServiceExtensionElement::class,$svcExtension);
    }

    public function testEPPStatementElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPStatementElement $statement*/
        $statement = $document->createElementNS(EPPNamespaces::EPP_1_0,'statement');
        $this->assertInstanceOf(EPPStatementElement::class,$statement);

        $this->assertNull($statement->getPurpose());
        $this->assertNull($statement->getRecipient());
        $this->assertNull($statement->getRetention());

        $purpose = $document->createElementNS(EPPNamespaces::EPP_1_0,'purpose');
        $statement->appendChild($purpose);

        $this->assertEquals($purpose,$statement->getPurpose());
        $this->assertInstanceOf(EPPPurposeElement::class,$purpose);

        $recipient = $document->createElementNS(EPPNamespaces::EPP_1_0,'recipient');
        $statement->appendChild($recipient);

        $this->assertEquals($recipient,$statement->getRecipient());
        $this->assertInstanceOf(EPPRecipientElement::class,$recipient);

        $retention = $document->createElementNS(EPPNamespaces::EPP_1_0,'retention');
        $statement->appendChild($retention);

        $this->assertEquals($retention,$statement->getRetention());
        $this->assertInstanceOf(EPPRetentionElement::class,$retention);
    }

    public function testEPPTransactionIdElement(): void{
        $document = EPPDocumentHelper::createEPPDocument();

        /**@var EPPTransactionIdElement $trID*/
        $trID = $document->createElementNS(EPPNamespaces::EPP_1_0,'trID');
        $this->assertInstanceOf(EPPTransactionIdElement::class,$trID);

        $this->assertNull($trID->getClientTransactionID());
        $this->assertNull($trID->getServerTransactionID());

        $clTRID = $document->createElementNS(EPPNamespaces::EPP_1_0,'clTRID');
        $trID->appendChild($clTRID);

        $this->assertEquals($clTRID,$trID->getClientTransactionID());
        $this->assertInstanceOf(EPPClientTransactionIdElement::class,$clTRID);

        $svTRID = $document->createElementNS(EPPNamespaces::EPP_1_0,'svTRID');
        $trID->appendChild($svTRID);

        $this->assertEquals($svTRID,$trID->getServerTransactionID());
        $this->assertInstanceOf(EPPServerTransactionIdElement::class,$svTRID);
    }

}