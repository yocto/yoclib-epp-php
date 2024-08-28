# yocLib - EPP (PHP)

This yocLibrary enables your project to send and receive with EPP (Extensible Provisioning Protocol) in PHP.

## Status

[![PHP Composer](https://github.com/yocto/yoclib-epp-php/actions/workflows/php.yml/badge.svg)](https://github.com/yocto/yoclib-epp-php/actions/workflows/php.yml)
[![codecov](https://codecov.io/gh/yocto/yoclib-epp-php/graph/badge.svg)](https://codecov.io/gh/yocto/yoclib-epp-php)

## Installation

`composer require yocto/yoclib-epp`

## Usage

### Reading

```php
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\Connections\EPPTCPConnection;
use YOCLIB\EPP\Elements\EPPEppElement;

$conn = new EPPTCPConnection(new SIDNTest());

$doc = $conn->readDocument();

/**@var EPPEppElement $epp*/
$epp = $doc->documentElement;

$hello = $epp->getHello();
```

### Writing

```php
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\EPPNamespaces;
use YOCLIB\EPP\Connections\EPPTCPConnection;
use YOCLIB\EPP\Registries\SIDNTest;

$doc = EPPDocumentHelper::createEPPDocument();

$epp = $doc->createElementNS(EPPNamespaces::EPP_1_0,'epp');

$hello = $doc->createElementNS(EPPNamespaces::EPP_1_0,'hello');

$epp->appendChild($hello);

$doc->appendChild($epp);

$conn = new EPPTCPConnection(new SIDNTest());

$xml = $conn->writeDocument($doc);
```