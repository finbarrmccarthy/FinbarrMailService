<?php
namespace FinbarrMailService\Mail\Options\Service;

use FinbarrMailService\Mail\Options\TransportOptions;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class TransportOptionsFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $config = $serviceLocator->get('Config');
        return new TransportOptions(isset($config['finbarrmailservice']) ? $config['finbarrmailservice'] : array());
    }

}