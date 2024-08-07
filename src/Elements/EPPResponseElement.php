<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPResponseElement extends EPPElement {

    /**
     * @return array|EPPResultElement[]
     */
    public function getResult(): array;

    public function getMessageQueue(): ?EPPMessageQueueElement;

    public function getResponseData(): ?EPPResponseDataElement;

    public function getExtension(): ?EPPExtensionElement;

    public function getTransactionID(): ?EPPTransactionIdElement;

}