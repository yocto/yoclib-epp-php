<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPResultElement extends EPPElement {

    public function getMessage(): ?EPPMessageElement;

    /**
     * @return array|EPPValueElement[]
     */
    public function getValue(): array;

    /**
     * @return array|EPPExtensionValueElement[]
     */
    public function getExtensionValue(): array;

}