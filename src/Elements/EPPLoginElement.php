<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPLoginElement extends EPPElement {

    public function getClientID(): ?EPPClientIdElement;

    public function getPassword(): ?EPPPasswordElement;

    public function getNewPassword(): ?EPPNewPasswordElement;

    public function getOptions(): ?EPPOptionsElement;

    public function getServices(): ?EPPServicesElement;

}