<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPMessageQueueElement extends EPPElement {

    public function getQueueDate(): ?EPPQueueDateElement;

    public function getMessage(): ?EPPMessageElement;

}