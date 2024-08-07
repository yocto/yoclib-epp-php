<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPExpiryElement extends EPPElement {

    public function getAbsolute(): ?EPPAbsoluteElement;

    public function getRelative(): ?EPPRelativeElement;

}