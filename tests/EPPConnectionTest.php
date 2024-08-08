<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;
use YOCLIB\EPP\Connections\EPPBaseConnection;
use YOCLIB\EPP\Connections\EPPTCPConnection;
use YOCLIB\EPP\Elements\EPPEppElement;
use YOCLIB\EPP\EPPDocumentHelper;
use YOCLIB\EPP\Registries\SIDNTest;
use function PHPUnit\Framework\assertEquals;

class EPPConnectionTest extends TestCase {

    public function testBaseConnection(){
        $conn = new class extends EPPBaseConnection{

            public function readXML(): ?string{
                return '<readXML/>';
            }

            public function writeXML(string $xml): void{
                assertEquals('<writeXML/>',$xml);
            }

            public function close(): bool{
                return true;
            }

            public function isClosed(): bool{
                return true;
            }

            public function open(): bool{
                return true;
            }
        };

        $this->assertEquals('<readXML/>',$conn->readXML());
        $conn->writeXML('<writeXML/>');

        $this->assertTrue($conn->isClosed());
        $this->assertTrue($conn->open());
        $this->assertTrue($conn->isClosed());
        $this->assertTrue($conn->close());
        $this->assertTrue($conn->isClosed());
    }

    /**
     * This test performs a real request to the test servers of SIDN.
     * @return void
     */
    public function testTCPConnection(){
        $registry = new SIDNTest;

        $conn = new EPPTCPConnection($registry);
        $this->assertNotNull($conn);

        $conn->writeXML('<epp xmlns="urn:ietf:params:xml:ns:epp-1.0"><hello/></epp>');
        $this->assertNotNull($conn);

        $result = $conn->readXML();
        $this->assertIsString($result);

        $doc = EPPDocumentHelper::createEPPDocument();
        $doc->loadXML($result);
        $this->assertInstanceOf(EPPEppElement::class,$doc->documentElement);

        $this->assertFalse($conn->isClosed());
        $this->assertTrue($conn->close());
        $this->assertTrue($conn->isClosed());
    }

}