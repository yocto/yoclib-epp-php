<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPRecipientElement extends EPPElement {

    public function getOther(): ?EPPOtherElement;

    /**
     * @return array|EPPOursElement[]
     */
    public function getOurs(): array;

    public function getPublic(): ?EPPPublicElement;

    public function getSame(): ?EPPSameElement;

    public function getUnrelated(): ?EPPUnrelatedElement;

}