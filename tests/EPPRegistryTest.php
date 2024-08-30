<?php
namespace YOCLIB\EPP\Tests;

use PHPUnit\Framework\TestCase;
use YOCLIB\EPP\EPPRegistry;
use YOCLIB\EPP\Registries\CentralNIC;
use YOCLIB\EPP\Registries\CentralNICTest;
use YOCLIB\EPP\Registries\EURID;
use YOCLIB\EPP\Registries\EURIDTest;
use YOCLIB\EPP\Registries\SIDN;
use YOCLIB\EPP\Registries\SIDNTest;

class EPPRegistryTest extends TestCase {

    public function testHost(): void{
        $this->assertEquals('tcp://example.com',(new class('tcp://example.com',1234) extends EPPRegistry{})->getHost());

        $this->assertEquals('ssl://epp.centralnic.com',(new CentralNIC)->getHost());
        $this->assertEquals('ssl://epp-ote.centralnic.com',(new CentralNICTest)->getHost());
        $this->assertEquals('ssl://epp.registry.eu',(new EURID)->getHost());
        $this->assertEquals('ssl://epp.tryout.registry.eu',(new EURIDTest)->getHost());
        $this->assertEquals('ssl://drs.domain-registry.nl',(new SIDN)->getHost());
        $this->assertEquals('ssl://testdrs.domain-registry.nl',(new SIDNTest)->getHost());
    }

    public function testPort(): void{
        $this->assertEquals(1234,(new class('tcp://example.com',1234) extends EPPRegistry{})->getPort());

        $this->assertEquals(700,(new CentralNIC)->getPort());
        $this->assertEquals(700,(new CentralNICTest)->getPort());
        $this->assertEquals(700,(new EURID)->getPort());
        $this->assertEquals(700,(new EURIDTest)->getPort());
        $this->assertEquals(700,(new SIDN)->getPort());
        $this->assertEquals(700,(new SIDNTest)->getPort());
    }

}