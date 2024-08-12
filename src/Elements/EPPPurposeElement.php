<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPPurposeElement extends EPPElement {

    public function getAdministration(): ?EPPAdministrationElement;

    public function getContact(): ?EPPContactElement;

    public function getOther(): ?EPPOtherElement;

    public function getProvisioning(): ?EPPProvisioningElement;

}