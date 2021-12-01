<?php

return [
    'doctrine' => [
        /*
         * Paths for Doctrine to find Entities
         */
        'paths' => array(
            "src/Entity",
        ),

        /*
         * Doctrine configuration parameters
         */
        'db_params' => array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'test',
            'driverOptions' => array(
                1002 => 'SET NAMES UTF8MB4'
            )
        ),

        /*
         * Tells Doctrine what mode we want
         * For Production environment set to \Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_NEVER;
         */
        'is_dev_mode' => false
    ]
];