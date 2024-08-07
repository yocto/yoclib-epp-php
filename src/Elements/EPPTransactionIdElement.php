<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPTransactionIdElement extends EPPElement {

    public function getClientTransactionID(): ?EPPClientTransactionIdElement;

    public function getServerTransactionID(): ?EPPServerTransactionIdElement;

}