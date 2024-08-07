<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;
use YOCLIB\EPP\EPPDocumentHelper;

class EPPDocumentHelperTest extends TestCase{

    public function testCreateEPPDocument(){
        $document = EPPDocumentHelper::createEPPDocument();

        $this->assertNotNull($document);
        $this->assertEquals('application/epp+xml',$document->getContentType());
    }

}