<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElementImpl;

class EPPOptionsElementImpl extends EPPElementImpl implements EPPOptionsElement {

    public function getVersion(): ?EPPVersionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'version')[0] ?? null;
    }

    public function getLanguage(): ?EPPVersionElement{
        return $this->getElementsByTagNameNS($this->namespaceURI,'lang')[0] ?? null;
    }

}