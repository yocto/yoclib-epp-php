<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPExtensionValueElement extends EPPElement {

    public function getValue(): ?EPPValueElement;

    public function getReason(): ?EPPReasonElement;

}