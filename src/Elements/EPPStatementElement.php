<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPStatementElement extends EPPElement {

    public function getPurpose(): ?EPPPurposeElement;

    public function getRecipient(): ?EPPRecipientElement;

    public function getRetention(): ?EPPRetentionElement;

}