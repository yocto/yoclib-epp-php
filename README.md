# yocLib - EPP (PHP)

This yocLibrary enables your project to send and receive with EPP (Extensible Provisioning Protocol) in PHP.

## Status

[![PHP Composer](https://github.com/yocto/yoclib-epp-php/actions/workflows/php.yml/badge.svg)](https://github.com/yocto/yoclib-epp-php/actions/workflows/php.yml)
[![codecov](https://codecov.io/gh/yocto/yoclib-epp-php/graph/badge.svg)](https://codecov.io/gh/yocto/yoclib-epp-php)

## Installation

`composer require yocto/yoclib-epp`

## Usage

### Serializing

```php
use YOCLIB\EPP\EPPDocumentHelper;

$doc = EPPDocumentHelper::createEPPDocument();

$epp = $doc->createElementNS('urn:ietf:params:xml:ns:epp-1.0','epp');

$hello = $doc->createElementNS('urn:ietf:params:xml:ns:epp-1.0','hello');

$epp->appendChild($hello);

$doc->appendChild($epp);

$xml = $doc->saveXML();
```

### Deserializing

```php
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\Elements\EPPEppElement;

$xml = '<?xml version="1.0" encoding="UTF-8" standalone="no"?><epp xmlns="urn:ietf:params:xml:ns:epp-1.0"><hello/></epp>';

$doc = EPPDocumentHelper::createEPPDocument();

$doc->loadXML($xml);

/**@var EPPEppElement $epp*/
$epp = $doc->documentElement;

$hello = $epp->getHello();
```