<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPOursElement extends EPPElement {

    public function getRecipientDescription(): ?EPPRecipientDescriptionElement;

}