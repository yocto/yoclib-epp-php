<?php
namespace YOCLIB\EPP;

use Wikimedia\IDLeDOM\Document;

use YOCLIB\EPP\Elements\EPPExtensionValueElement;
use YOCLIB\EPP\Elements\EPPMessageElement;
use YOCLIB\EPP\Elements\EPPResultElement;
use YOCLIB\EPP\Elements\EPPValueElement;

class EPPElementHelper{

    /**
     * @param Document $document
     * @param string $code
     * @param EPPMessageElement $msg
     * @param ?EPPValueElement|?EPPExtensionValueElement|null $valueOrExtValue
     * @return EPPResultElement
     */
    public static function createEPPResultElement(Document $document,string $code,EPPMessageElement $msg,$valueOrExtValue=null): EPPResultElement{
        /**@var EPPResultElement $resultElement*/
        $resultElement = $document->createElementNS(EPPNamespaces::EPP_1_0,'result');
        $resultElement->setAttribute('code',$code);

        $resultElement->appendChild($msg);

        if($valueOrExtValue){
            $resultElement->appendChild($valueOrExtValue);
        }

        return $resultElement;
    }

    /**
     * @param Document $document
     * @param ?string|null $lang
     * @param mixed ...$content
     * @return EPPMessageElement
     */
    public static function createEPPMessageElement(Document $document,?string $lang=null,... $content): EPPMessageElement{
        /**@var EPPMessageElement $messageElement*/
        $messageElement = $document->createElementNS(EPPNamespaces::EPP_1_0,'msg');
        if($lang){
            $messageElement->setAttribute('lang',$lang);
        }
        if(is_string($content[0] ?? null)){
            $messageElement->textContent = $content;
        }else{
            foreach($content AS $node){
                $messageElement->appendChild($node);
            }
        }
        return $messageElement;
    }

}