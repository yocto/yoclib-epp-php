<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPRetentionElement extends EPPElement {

    public function getBusiness(): ?EPPBusinessElement;

    public function getIndefinite(): ?EPPIndefiniteElement;

    public function getLegal(): ?EPPLegalElement;

    public function getNone(): ?EPPNoneElement;

    public function getStated(): ?EPPStatedElement;

}