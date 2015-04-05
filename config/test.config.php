<?php

return array(
    'db' => array(
        'driver' => 'PDO',
        'dsn' => 'mysql:dbname=zend2biso_test;host=localhost',
        'username' => 'zend2bisouser',
        'password' => 'zend2bisopass',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
        'doctrine' => array(
            'connection' => array(
                'driver' => 'pdo_mysql',
                'host'=> 'localhost',
                'port' => '3306',
                'user' => 'zend2bisouser',
                'password' => 'zend2bisopass',
                'dbname' => 'zend2biso_test'
            )            
        ),
        ));