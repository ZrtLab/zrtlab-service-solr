<?php

namespace Zrt\Tests\Service;

use PHPUnit_Framework_TestCase,
    Zrt_Service_Solr,
    Zend_Application,
    Zend_Application_Bootstrap_Bootstrap,
    Zend_Controller_Front;

class SolrTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->application = new Zend_Application('testing');
        $this->bootstrap = new Zend_Application_Bootstrap_Bootstrap($this->application);
        Zend_Controller_Front::getInstance()->resetInstance();
    }

    public function testInitializationReturnsServiceSolr()
    {
        $options = array();
        $resource = new Solr($options);
        $resource->setBootstrap($this->bootstrap);
        $solarium = $resource->init();

        $this->assertInternalType('ZRTSolarium_Registry', $solarium);
    }

    public function testInitializationInitializesSolr()
    {
        $options = array();

        $resource = new Solr($options);
        $resource->setBootstrap($this->bootstrap);
        $resource->init();
    }
}
