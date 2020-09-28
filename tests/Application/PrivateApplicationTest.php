<?php

namespace XeroPHP_VS\tests\Application;

use XeroPHP_VS\Application\PrivateApplication;

class PrivateApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $config = [
            'oauth' => [
                'callback' => 'http://localhost/',
                'consumer_key' => 'k',
                'consumer_secret' => 's',
                'rsa_private_key' => 'file://certs/private.pem',
                'rsa_public_key' => 'file://certs/public.pem'
            ]
        ];

        new PrivateApplication($config);
    }
}
