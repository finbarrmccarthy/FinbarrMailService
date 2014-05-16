<?php

namespace FinbarrMailServiceTest\Mail\View;

use FinbarrMailService\Mail\View\MailPhpRendererFactory;
use FinbarrMailServiceTest\Util\ServiceManagerFactory;

class MailPhpRendererFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $sm;

    public function setUp() {

    }

    public function testCreateViaServiceManager() {
        $sm = ServiceManagerFactory::getServiceManager();
        $options = $sm->get('finbarrmailservice_renderer');

        $this->assertInstanceOf('Zend\View\Renderer\PhpRenderer', $options);
    }

    public function testCreateService() {
        $sm = ServiceManagerFactory::getServiceManager();
        $factory = new MailPhpRendererFactory();
        $options = $factory->createService($sm, 'finbarrmailservicerenderer');

        $this->assertInstanceOf('Zend\View\Renderer\PhpRenderer', $options);
    }
}