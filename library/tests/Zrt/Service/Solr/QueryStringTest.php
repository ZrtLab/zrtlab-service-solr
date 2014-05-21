<?php

namespace Zrt\Tests\Service;

use Zrt_Service_Solr_QueryString,
    PHPUnit_Framework_TestCase;

class QueryStringTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testInstanceQueryString()
    {
        $queryString = new Zrt_Service_Solr_QueryString();
        $this->assertNotNull($queryString);
    }

}
