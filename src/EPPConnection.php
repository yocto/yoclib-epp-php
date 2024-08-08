<?php
namespace YOCLIB\EPP;

interface EPPConnection{

    public function close(): bool;

    public function isClosed(): bool;

    public function open(): bool;

    public function readDocument(): EPPDocument;

    public function readXML(): ?string;

    public function writeDocument(EPPDocument $doc): void;

    public function writeXML(string $xml);

}