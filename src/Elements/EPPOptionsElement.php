<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPOptionsElement extends EPPElement {

    public function getVersion(): ?EPPVersionElement;

    public function getLanguage(): ?EPPVersionElement;

}