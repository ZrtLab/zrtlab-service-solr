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
        $options = array(
            'solarium' => array(
                'endpoint' => array(
                    'aviso' => array(
                        'host' => '127.0.0.1',
                        'port' => 8080,
                        'path' => '/solr',
                        'core' => 'aviso',
                        'timeout' => 5
                    ),
                    'ubigeo' => array(
                        'host' => '127.0.0.1',
                        'port' => 8080,
                        'path' => '/solr',
                        'core' => 'ubigeo',
                        'timeout' => 5
                    )
                )
            )
        );
        $service = new Zrt_Service_Solr($options);
        $this->assertNotNull($service);
    }

    public function testSolrResponsePing()
    {
        $options = array(
            'solarium' => array(
                'endpoint' => array(
                    'aviso' => array(
                        'host' => '127.0.0.1',
                        'port' => 8080,
                        'path' => '/solr',
                        'core' => 'aviso',
                        'timeout' => 5
                    ),
                    'ubigeo' => array(
                        'host' => '127.0.0.1',
                        'port' => 8080,
                        'path' => '/solr',
                        'core' => 'ubigeo',
                        'timeout' => 5
                    )
                )
            )
        );
        $service = new Zrt_Service_Solr($options);
        $this->assertNotEmpty($service->getPing());
    }

}
