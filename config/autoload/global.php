<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=zend2biso;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
        'username' => 'dddzf2user',
        'password' => 'dddzf2pass',
    ),
    'redis' => array(
        'host'     => 'zend2biso_redis_1',
        'port'     => 6379
    ),
    'acl' => array(
        'roles' => array(
            'guest' => null,
            'employee' => 'guest',
            'coordinator' => 'employee',
            'manager' => 'coordinator',
            'director' => 'manager',
            'admin' => 'director',
            'super_admin' => 'admin',
        ),
        'resources' => array(
            'Application\Controller\Index.index',
            'Application\Controller\Index.login',
            'Application\Controller\Index.logout',
            'Application\Controller\Index.entity',
            'Application\Controller\Admin.index',
        ),
        'privilege' => array(
            'guest' => array(
                    'allow' => array(
                        'Application\Controller\Index.index',
                        'Application\Controller\Index.index',
                        'Application\Controller\Index.login',
                        'Application\Controller\Index.logout',
                        'Application\Controller\Index.entity',
                    )
            ),
            'employee' => array(
                'allow' => array(
                    'Application\Controller\Index.index',
                    'Application\Controller\Admin.index',
                )
            ),
            'coordinator' => array(
                'allow' => array(
                    'Application\Controller\Admin.index',
                )
            ),
        )
    )
);