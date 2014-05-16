<?php

namespace FinbarrMailServiceTest\Mail\Options\Service;

use FinbarrMailService\Mail\Transport\Service\TransportFactory;
use FinbarrMailServiceTest\Util\ServiceManagerFactory;

class TransportFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testCreateViaServiceManager() {
        $sm = ServiceManagerFactory::getServiceManager();
        $transport = $sm->get('finbarrmailservice_transport');

        $this->assertInstanceOf('Zend\Mail\Transport\File', $transport);
    }

    public function testCreateService() {
        $sm = ServiceManagerFactory::getServiceManager();
        $factory = new TransportFactory();
        $transport = $factory->createService($sm, 'finbarrmailservicetransport');

        $this->assertInstanceOf('Zend\Mail\Transport\File', $transport);
    }

    /**
     * @expectedException Exception
     */
    public function testServiceThrowsExceptionWhenTransportClassNotExists() {
        $sm = ServiceManagerFactory::getServiceManager();

        $options = $sm->get('finbarrmailservice_options');
        $options->setTransportClass('DoesNotExist');

        $transport = $sm->get('finbarrmailservice_transport');
    }
}