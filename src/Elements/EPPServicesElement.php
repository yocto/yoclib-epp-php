<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPServicesElement extends EPPElement {

    /**
     * @return array|EPPObjectUriElement[]
     */
    public function getObjectURI(): array;

    public function getServiceExtension(): ?EPPServiceExtensionElement;

}