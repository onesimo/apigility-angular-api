<?php
return [
    'controllers' => [
        'factories' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => \SONApi\V1\Rpc\Sum\SumControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'son-api.rpc.sum' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/sum',
                    'defaults' => [
                        'controller' => 'SONApi\\V1\\Rpc\\Sum\\Controller',
                        'action' => 'sum',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'son-api.rpc.sum',
        ],
    ],
    'zf-rpc' => [
        'SONApi\\V1\\Rpc\\Sum\\Controller' => [
            'service_name' => 'Sum',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'son-api.rpc.sum',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
];
