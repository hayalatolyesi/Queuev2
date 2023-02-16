<?php return array(
    'root' => array(
        'name' => 'erdal/queue-manager',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'erdal/queue-manager' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'erdal/responder' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '474a4510d3c88c7a94f62d968df0a4f041372b39',
            'type' => 'library',
            'install_path' => __DIR__ . '/../erdal/responder',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'php-amqplib/php-amqplib' => array(
            'pretty_version' => 'v2.10.1',
            'version' => '2.10.1.0',
            'reference' => '6e2b2501e021e994fb64429e5a78118f83b5c200',
            'type' => 'library',
            'install_path' => __DIR__ . '/../php-amqplib/php-amqplib',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'videlalvaro/php-amqplib' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v2.10.1',
            ),
        ),
    ),
);
