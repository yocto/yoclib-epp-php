<?php
namespace YOCLIB\EPP;

use Wikimedia\IDLeDOM\XMLDocument;

interface EPPDocument extends XMLDocument {

    public function createElementNS(?string $namespace, string $qualifiedName, $options = null);

    public function setContentType($contentType): void;

}