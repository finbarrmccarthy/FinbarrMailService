FinbarrMailService
================

Version 0.0.2 Created by Finbarr

Introduction
------------

Provide configurable Mail Transport Factory  and simple messaging for ZF2

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master).

Features / Goals
----------------

* Configure transport service for using Zend\Mail [COMPLETE]

Installation
------------

### Main Setup

#### With composer

1. Add this project and the requirements in your composer.json:

    ```json
    "require": {
        "finbarrmccarthy/finbarr-mailservice": "1.*"
    }
    ```

2. Now tell composer to download FinbarrMailService by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'FinbarrMailService'
        ),
        // ...
    );
    ```
2. Copy the configuration files for local and global from
`./vendor/finbarrmccarthy/finbarr-mailservice/config/finbarrmailservice.{local,global}.php.dist` to
`./config/autoload/finbarrmailservice.{local,global}.php` and change the values as desired.

3. If you are using the FileTransport (for development) create the directory `./data/mail`.

Usage
-----

	// The template used by the PhpRenderer to create the content of the mail
	$viewTemplate = 'module/email/testmail';

	// The ViewModel variables to pass into the renderer
	$value = array('foo' => 'bar');

	$mailService = $this->getServiceManager()->get('finbarrmailservice_message');
	$message = $mailService->createTextMessage($from, $to, $subject, $viewTemplate, $values);
	$mailService->send($message);

SMTP Setup
----------

FinbarrMailService uses sendmail by default, but you can set it up to use SMTP by putting your information in the config file like this:

    $settings = array(
        'transport_class' => 'Zend\Mail\Transport\Smtp',

        'options_class' => 'Zend\Mail\Transport\SmtpOptions',

        'options' => array(
            'host' => 'smtp.gmail.com',
            'connection_class' => 'login',
            'connection_config' => array(
                'ssl' => 'tls',
                'username' => 'YOUR-USERNAME-HERE@gmail.com',
                'password' => 'YOUR-PASSWORD-HERE'
            ),
            'port' => 587
        )
    );
