<?php
namespace YOCLIB\EPP\Elements;

use YOCLIB\EPP\EPPElement;

interface EPPEppElement extends EPPElement{

    public function getGreeting(): ?EPPGreetingElement;

    public function getHello(): ?EPPHelloElement;

    public function getCommand(): ?EPPCommandElement;

    public function getResponse(): ?EPPResponseElement;

    public function getExtension(): ?EPPExtensionElement;

}