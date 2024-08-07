<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPCommandElement extends EPPElement {

    public function getCheck(): ?EPPCheckElement;

    public function getCreate(): ?EPPCreateElement;

    public function getDelete(): ?EPPDeleteElement;

    public function getInformation(): ?EPPInformationElement;

    public function getLogin(): ?EPPLoginElement;

    public function getLogout(): ?EPPLogoutElement;

    public function getPoll(): ?EPPPollElement;

    public function getRenew(): ?EPPRenewElement;

    public function getTransfer(): ?EPPTransferElement;

    public function getUpdate(): ?EPPUpdateElement;

    public function getExtension(): ?EPPExtensionElement;

    public function getClientTransactionID(): ?EPPClientTransactionIdElement;

}