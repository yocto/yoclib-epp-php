<?php
require_once 'vendor/autoload.php';

use YOCLIB\EPP\EPPElementHelper;

$document = \YOCLIB\EPP\EPPDocumentHelper::createEPPDocument();

EPPElementHelper::createEPPMessageElement($document,'Nederlands','ABC');
//EPPElementHelper::createEPPMessageElement($document,content:'ABC');