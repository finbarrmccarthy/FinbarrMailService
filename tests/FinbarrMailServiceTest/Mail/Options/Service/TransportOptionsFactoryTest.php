<?php

namespace FinbarrMailServiceTest\Mail\Options\Service;

use FinbarrMailService\Mail\Options\Service\TransportOptionsFactory;
use FinbarrMailServiceTest\Util\ServiceManagerFactory;

class TransportOptionsFactoryTest extends \PHPUnit_Framework_TestCase {

    public function testCreateViaServiceManager() {
        $sm = ServiceManagerFactory::getServiceManager();
        $options = $sm->get('finbarrmailservice_options');

        $this->assertInstanceOf('FinbarrMailService\Mail\Options\TransportOptions', $options);
    }

    public function testCreateService() {
        $sm = ServiceManagerFactory::getServiceManager();
        $factory = new TransportOptionsFactory();
        $options = $factory->createService($sm, 'finbarrmailserviceoptions', 'FinbarrMailServiceTest\Mail\Options\TransportOptions');

        $this->assertInstanceOf('FinbarrMailService\Mail\Options\TransportOptions', $options);
    }
}