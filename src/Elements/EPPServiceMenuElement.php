<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPServiceMenuElement extends EPPElement {

    /**
     * @return array|EPPVersionElement[]
     */
    public function getVersion(): array;

    /**
     * @return array|EPPLanguageElement[]
     */
    public function getLanguage(): array;

    /**
     * @return array|EPPObjectUriElement[]
     */
    public function getObjectURI(): array;

    public function getServiceExtension(): ?EPPServiceExtensionElement;

}