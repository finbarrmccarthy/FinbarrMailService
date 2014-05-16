<?php
namespace FinbarrMailService;

use Zend\Mvc\MvcEvent;
use Zend\Loader\StandardAutoloader;
use Zend\Loader\AutoloaderFactory;

class Module {

    public function getAutoloaderConfig() {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig() {
        return array(
            'shared' => array(
                'finbarrmailservice_message'   => false
            ),
            'invokables' => array(
                'finbarrmailservice_message'   => 'FinbarrMailService\Mail\Service\Message',
            ),
            'factories' => array(
                'finbarrmailservice_options'   => 'FinbarrMailService\Mail\Options\Service\TransportOptionsFactory',
                'finbarrmailservice_transport' => 'FinbarrMailService\Mail\Transport\Service\TransportFactory',
                'finbarrmailservice_renderer'  => 'FinbarrMailService\Mail\View\MailPhpRendererFactory',
            ),
        );
    }
}

