<?php
namespace YOCLIB\EPP;

use Wikimedia\Dodo\Element;
use Wikimedia\IDLeDOM\Document;

use YOCLIB\EPP\Elements\EPPAbsoluteElementImpl;
use YOCLIB\EPP\Elements\EPPAccessElementImpl;
use YOCLIB\EPP\Elements\EPPAdministratorElementImpl;
use YOCLIB\EPP\Elements\EPPAllElementImpl;
use YOCLIB\EPP\Elements\EPPBusinessElementImpl;
use YOCLIB\EPP\Elements\EPPCheckElementImpl;
use YOCLIB\EPP\Elements\EPPClientIdElementImpl;
use YOCLIB\EPP\Elements\EPPClientTransactionIdElementImpl;
use YOCLIB\EPP\Elements\EPPCommandElementImpl;
use YOCLIB\EPP\Elements\EPPContactElementImpl;
use YOCLIB\EPP\Elements\EPPCreateElementImpl;
use YOCLIB\EPP\Elements\EPPDataCollectionPolicyElementImpl;
use YOCLIB\EPP\Elements\EPPDeleteElementImpl;
use YOCLIB\EPP\Elements\EPPEppElementImpl;
use YOCLIB\EPP\Elements\EPPExpiryElementImpl;
use YOCLIB\EPP\Elements\EPPExtensionElementImpl;
use YOCLIB\EPP\Elements\EPPExtensionUriElementImpl;
use YOCLIB\EPP\Elements\EPPExtensionValueElementImpl;
use YOCLIB\EPP\Elements\EPPGreetingElementImpl;
use YOCLIB\EPP\Elements\EPPHelloElementImpl;
use YOCLIB\EPP\Elements\EPPIndefiniteElementImpl;
use YOCLIB\EPP\Elements\EPPInformationElementImpl;
use YOCLIB\EPP\Elements\EPPLanguageElementImpl;
use YOCLIB\EPP\Elements\EPPLegalElementImpl;
use YOCLIB\EPP\Elements\EPPLoginElementImpl;
use YOCLIB\EPP\Elements\EPPLogoutElementImpl;
use YOCLIB\EPP\Elements\EPPMessageElementImpl;
use YOCLIB\EPP\Elements\EPPMessageQueueElementImpl;
use YOCLIB\EPP\Elements\EPPNewPasswordElementImpl;
use YOCLIB\EPP\Elements\EPPNoneElementImpl;
use YOCLIB\EPP\Elements\EPPNullElementImpl;
use YOCLIB\EPP\Elements\EPPObjectUriElementImpl;
use YOCLIB\EPP\Elements\EPPOptionsElementImpl;
use YOCLIB\EPP\Elements\EPPOtherElementImpl;
use YOCLIB\EPP\Elements\EPPOursElementImpl;
use YOCLIB\EPP\Elements\EPPPasswordElementImpl;
use YOCLIB\EPP\Elements\EPPPersonalAndOtherElementImpl;
use YOCLIB\EPP\Elements\EPPPersonalElementImpl;
use YOCLIB\EPP\Elements\EPPPollElementImpl;
use YOCLIB\EPP\Elements\EPPProvisioningElementImpl;
use YOCLIB\EPP\Elements\EPPPublicElementImpl;
use YOCLIB\EPP\Elements\EPPPurposeElementImpl;
use YOCLIB\EPP\Elements\EPPQueueDateElementImpl;
use YOCLIB\EPP\Elements\EPPReasonElementImpl;
use YOCLIB\EPP\Elements\EPPRecipientDescriptionElementImpl;
use YOCLIB\EPP\Elements\EPPRecipientElementImpl;
use YOCLIB\EPP\Elements\EPPRelativeElementImpl;
use YOCLIB\EPP\Elements\EPPRenewElementImpl;
use YOCLIB\EPP\Elements\EPPResponseDataElementImpl;
use YOCLIB\EPP\Elements\EPPResponseElementImpl;
use YOCLIB\EPP\Elements\EPPResultElementImpl;
use YOCLIB\EPP\Elements\EPPRetentionElementImpl;
use YOCLIB\EPP\Elements\EPPSameElementImpl;
use YOCLIB\EPP\Elements\EPPServerDateElementImpl;
use YOCLIB\EPP\Elements\EPPServerIdElementImpl;
use YOCLIB\EPP\Elements\EPPServerTransactionIdElementImpl;
use YOCLIB\EPP\Elements\EPPServiceExtensionElementImpl;
use YOCLIB\EPP\Elements\EPPServiceMenuElementImpl;
use YOCLIB\EPP\Elements\EPPServicesElementImpl;
use YOCLIB\EPP\Elements\EPPStatedElementImpl;
use YOCLIB\EPP\Elements\EPPStatementElementImpl;
use YOCLIB\EPP\Elements\EPPTransactionIdElementImpl;
use YOCLIB\EPP\Elements\EPPTransferElementImpl;
use YOCLIB\EPP\Elements\EPPUnknownElementImpl;
use YOCLIB\EPP\Elements\EPPUnrelatedElementImpl;
use YOCLIB\EPP\Elements\EPPUpdateElementImpl;
use YOCLIB\EPP\Elements\EPPValueElementImpl;
use YOCLIB\EPP\Elements\EPPVersionElementImpl;

class EPPElementImpl extends Element implements EPPElement {

    private static $ELEMENTS = [];

    public static function __createElementNS(Document $doc, ?string $ns, string $lname, ?string $prefix) {
        $className = self::__lookupClass($ns,$lname);
        if($className==null){
            return null;
        }
        return new $className($doc,$lname,$prefix);
    }

    private static function __getElements(): array{
        if(!isset(self::$ELEMENTS['urn:ietf:params:xml:ns:epp-1.0'])){
            self::$ELEMENTS = array_merge(self::$ELEMENTS,self::getCustomElementsEPP());
        }
        return self::$ELEMENTS;
    }

    private static function __lookupClass(?string $ns, string $lname){
        $namespace = self::__getElements()[$ns ?? ''] ?? [];
        return $namespace[$lname] ?? $namespace['*'] ?? null;
    }

    public static function getCustomElementsEPP(): array{
        return [
            'urn:ietf:params:xml:ns:epp-1.0' => [
                'absolute' => EPPAbsoluteElementImpl::class,
                'access' => EPPAccessElementImpl::class,
                'admin' => EPPAdministratorElementImpl::class,
                'all' => EPPAllElementImpl::class,
                'business' => EPPBusinessElementImpl::class,
                'check' => EPPCheckElementImpl::class,
                'clID' => EPPClientIdElementImpl::class,
                'clTRID' => EPPClientTransactionIdElementImpl::class,
                'command' => EPPCommandElementImpl::class,
                'contact' => EPPContactElementImpl::class,
                'create' => EPPCreateElementImpl::class,
                'dcp' => EPPDataCollectionPolicyElementImpl::class,
                'delete' => EPPDeleteElementImpl::class,
                'epp' => EPPEppElementImpl::class,
                'expiry' => EPPExpiryElementImpl::class,
                'extension' => EPPExtensionElementImpl::class,
                'extURI' => EPPExtensionUriElementImpl::class,
                'extValue' => EPPExtensionValueElementImpl::class,
                'greeting' => EPPGreetingElementImpl::class,
                'hello' => EPPHelloElementImpl::class,
                'indefinite' => EPPIndefiniteElementImpl::class,
                'info' => EPPInformationElementImpl::class,
                'lang' => EPPLanguageElementImpl::class,
                'legal' => EPPLegalElementImpl::class,
                'login' => EPPLoginElementImpl::class,
                'logout' => EPPLogoutElementImpl::class,
                'msg' => EPPMessageElementImpl::class,
                'msgQ' => EPPMessageQueueElementImpl::class,
                'newPW' => EPPNewPasswordElementImpl::class,
                'none' => EPPNoneElementImpl::class,
                'null' => EPPNullElementImpl::class,
                'objURI' => EPPObjectUriElementImpl::class,
                'options' => EPPOptionsElementImpl::class,
                'other' => EPPOtherElementImpl::class,
                'ours' => EPPOursElementImpl::class,
                'password' => EPPPasswordElementImpl::class,
                'personal' => EPPPersonalElementImpl::class,
                'personalAndOther' => EPPPersonalAndOtherElementImpl::class,
                'poll' => EPPPollElementImpl::class,
                'prov' => EPPProvisioningElementImpl::class,
                'public' => EPPPublicElementImpl::class,
                'purpose' => EPPPurposeElementImpl::class,
                'pw' => EPPPasswordElementImpl::class,
                'qDate' => EPPQueueDateElementImpl::class,
                'reason' => EPPReasonElementImpl::class,
                'recipient' => EPPRecipientElementImpl::class,
                'recDesc' => EPPRecipientDescriptionElementImpl::class,
                'relative' => EPPRelativeElementImpl::class,
                'renew' => EPPRenewElementImpl::class,
                'response' => EPPResponseElementImpl::class,
                'resData' => EPPResponseDataElementImpl::class,
                'result' => EPPResultElementImpl::class,
                'retention' => EPPRetentionElementImpl::class,
                'same' => EPPSameElementImpl::class,
                'svDate' => EPPServerDateElementImpl::class,
                'svID' => EPPServerIdElementImpl::class,
                'svTRID' => EPPServerTransactionIdElementImpl::class,
                'svcExtension' => EPPServiceExtensionElementImpl::class,
                'svcMenu' => EPPServiceMenuElementImpl::class,
                'svcs' => EPPServicesElementImpl::class,
                'stated' => EPPStatedElementImpl::class,
                'statement' => EPPStatementElementImpl::class,
                'trID' => EPPTransactionIdElementImpl::class,
                'transfer' => EPPTransferElementImpl::class,
                'unrelated' => EPPUnrelatedElementImpl::class,
                'update' => EPPUpdateElementImpl::class,
                'value' => EPPValueElementImpl::class,
                'version' => EPPVersionElementImpl::class,

                '*' => EPPUnknownElementImpl::class,
            ],
        ];
    }

}