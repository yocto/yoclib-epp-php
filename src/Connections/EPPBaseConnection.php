<?php
namespace YOCLIB\EPP\Connections;

use YOCLIB\EPP\EPPConnection;
use YOCLIB\EPP\EPPDocument;
use YOCLIB\EPP\EPPDocumentHelper;

abstract class EPPBaseConnection implements EPPConnection {

    public function readDocument(): ?EPPDocument{
        $doc = EPPDocumentHelper::createEPPDocument();
        $doc->loadXML($this->readXML());
        return $doc;
    }

    public abstract function readXML(): ?string;

    public function writeDocument(EPPDocument $doc): void{
        $this->writeXML($doc->saveXML());
    }

    public abstract function writeXML(string $xml): void;

}