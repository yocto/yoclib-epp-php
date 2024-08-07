<?php
namespace YOCLIB\EPP\Elements;

interface EPPServiceExtensionElement{

    /**
     * @return array|EPPExtensionUriElement[]
     */
    public function getExtensionURI(): array;

}