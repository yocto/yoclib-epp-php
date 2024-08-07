<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPAccessElement extends EPPElement{

    public function getAll(): ?EPPAllElement;

    public function getNone(): ?EPPNoneElement;

    public function getNull(): ?EPPNullElement;

    public function getOther(): ?EPPOtherElement;

    public function getPersonal(): ?EPPPersonalElement;

    public function getPersonalOrOther(): ?EPPPersonalAndOtherElement;

}