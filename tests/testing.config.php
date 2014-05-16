<?php
return array(
    'service_manager' => array(
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
    ),
);