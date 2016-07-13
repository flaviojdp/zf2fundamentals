<?php
return array(
    'controllers' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory',
            'market-index-controller' => 'Market\Factory\IndexControllerFactory',
            'market-view-controller' => 'Market\Factory\ViewControllerFactory',
        ),
        'aliases' => array(
            'alt'=> 'market-view-controller'
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'market-post-form' => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFilterFactory',
            'listings-table' => 'Market\Factory\ListingsTableFactory',
            'city-codes-table' => 'Market\Factory\CityCodesTableFactory',
        ),
        'services' => array(
            'expireDays' => array( 1,2,3,4,5,6,7,8,9,10,
                                    11,12,13,14,15,16,17,18,19,20,
                                    21,22,23,24,25,26,27,28,29,30),
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'market-index-controller',
                        'action' => 'index'
                    ),
                ),
            ),
            'market' => array(
                'type'    => 'literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        //'__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'slash' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/',
                            'defaults' => array(
                                'controller'    => 'market-index-controller',
                                'action'        => 'index',
                            ),
                        ),
                     ),
                    'view' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/view',
                            'defaults' => array(
                                'controller' => 'market-view-controller',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'slash' => array(
                                'type'    => 'Literal',
                                'options' => array(
                                    'route'    => '/',
                                    'defaults' => array(
                                        'controller'    => 'market-view-controller',
                                        'action'        => 'index',
                                    ),
                                ),
                             ),
                            'index' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/main[/:category][/]'
                                ),
                            ),
                            'item' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/item[/:itemId][/]',
                                    'defaults' => array(
                                        'action' => 'item'
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'post' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/post',
                            'defaults' => array(
                                'controller' => 'market-post-controller',
                                'action' => 'index'
                            ),
                        ),
                    ),
                ),
            ),
            /*'market' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        //'__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller][/:action]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),*/
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'market' => __DIR__ . '/../view',
        ),
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'template_map' => array(
            'market/view/item' => __DIR__ . '/../view/market/view/item.phtml'
        )
    ),
);
