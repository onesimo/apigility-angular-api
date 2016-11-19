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
            'son-api.rest.tasks' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/tasks[/:tasks_id]',
                    'defaults' => [
                        'controller' => 'SONApi\\V1\\Rest\\Tasks\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'son-api.rpc.sum',
            1 => 'son-api.rest.clientes',
            2 => 'son-api.rest.tasks',
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
            'SONApi\\V1\\Rest\\Tasks\\Controller' => 'HalJson',
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
            'SONApi\\V1\\Rest\\Tasks\\Controller' => [
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
            'SONApi\\V1\\Rest\\Tasks\\Controller' => [
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
        'SONApi\\V1\\Rest\\Tasks\\Controller' => [
            'listener' => 'SONApi\\V1\\Rest\\Tasks\\TasksResource',
            'route_name' => 'son-api.rest.tasks',
            'route_identifier_name' => 'tasks_id',
            'collection_name' => 'tasks',
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
            'entity_class' => \SONApi\V1\Rest\Tasks\TasksEntity::class,
            'collection_class' => \SONApi\V1\Rest\Tasks\TasksCollection::class,
            'service_name' => 'tasks',
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
            \SONApi\V1\Rest\Tasks\TasksEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-api.rest.tasks',
                'route_identifier_name' => 'tasks_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \SONApi\V1\Rest\Tasks\TasksCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'son-api.rest.tasks',
                'route_identifier_name' => 'tasks_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'SONApi\\V1\\Rest\\Tasks\\TasksResource' => [
                'adapter_name' => 'MysqlAdapter',
                'table_name' => 'tasks',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'SONApi\\V1\\Rest\\Tasks\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'SONApi\\V1\\Rest\\Tasks\\Controller' => [
            'input_filter' => 'SONApi\\V1\\Rest\\Tasks\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'SONApi\\V1\\Rest\\Tasks\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '250',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
