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
            'son-api.rest.clientes' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/clientes[/:clientes_id]',
                    'defaults' => [
                        'controller' => 'SONApi\\V1\\Rest\\Clientes\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'son-api.rpc.sum',
            1 => 'son-api.rest.clientes',
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
            'SONApi\\V1\\Rest\\Clientes\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'SONApi\\V1\\Rest\\Clientes\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'SONApi\\V1\\Rpc\\Sum\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/json',
            ],
            'SONApi\\V1\\Rest\\Clientes\\Controller' => [
                0 => 'application/vnd.son-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \SONApi\V1\Rest\Clientes\ClientesResource::class => \SONApi\V1\Rest\Clientes\ClientesResourceFactory::class,
        ],
    ],
    'zf-rest' => [
        'SONApi\\V1\\Rest\\Clientes\\Controller' => [
            'listener' => \SONApi\V1\Rest\Clientes\ClientesResource::class,
            'route_name' => 'son-api.rest.clientes',
            'route_identifier_name' => 'clientes_id',
            'collection_name' => 'clientes',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \SONApi\V1\Rest\Clientes\ClientesEntity::class,
            'collection_class' => \SONApi\V1\Rest\Clientes\ClientesCollection::class,
            'service_name' => 'Clientes',
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \SONApi\V1\Rest\Clientes\ClientesEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-api.rest.clientes',
                'route_identifier_name' => 'clientes_id',
                'hydrator' => \Zend\Hydrator\ObjectProperty::class,
            ],
            \SONApi\V1\Rest\Clientes\ClientesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-api.rest.clientes',
                'route_identifier_name' => 'clientes_id',
                'is_collection' => true,
            ],
        ],
    ],
];
