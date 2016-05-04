<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'recepies' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/recepies',
                    'defaults' => array(
                        'controller'    => 'Application\Controller\Index',
                        'action'        => 'recepies',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                                    'default' => array(
                                        'type'    => 'Segment',
                                        'options' => array(
                                            'route'    => '/:id',
                                            'constraints' => array(
                                                'id' => '[0-9]*',
                                            ),
                                            'defaults' => array(
                                                'action' => 'single',
                                            ),
                                        ),
                                    ),
                                ),
            ),
            'backoffice' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/backoffice',
                    'defaults' => array(
                        'controller'    => 'Application\Controller\Backoffice',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                                    'create_recepy' => array(
                                        'type'    => 'Literal',
                                        'options' => array(
                                            'route'    => '/new-recepy',
                                            'defaults' => array(
                                                'action' => 'create',
                                            ),
                                        ),
                                    ),
                                    'update_recepy' => array(
                                        'type'    => 'Literal',
                                        'options' => array(
                                            'route'    => '/edit-recepy',
                                        ),
                                        'may_terminate' => true,
                                        'child_routes' => array(
                                                            'default' => array(
                                                                'type'    => 'Segment',
                                                                'options' => array(
                                                                    'route'    => '/:id',
                                                                    'constraints' => array(
                                                                        'id' => '[0-9]*',
                                                                    ),
                                                                    'defaults' => array(
                                                                        'action' => 'update',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                    ),
                                ),
            ),
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Application\Controller\Index' => Controller\IndexControllerFactory::class,
            'Application\Controller\Backoffice' => Controller\BackofficeControllerFactory::class,
            //'Prodotti\Controller\Admin' => Controller\AdminControllerFactory::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Application\Service\RecepyService' => Service\RecepyServiceFactory::class,
            'Application\Form\RecepyForm' => Form\RecepyFormFactory::class,
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine'        => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity']
            ],
            'orm_default'             => [
                'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ],
        ],
    ],

    // ACL
    'bjyauthorize' => [
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [
                ['controller' => 'zfcuser', 'roles' => []],
                ['controller' => 'Application\Controller\Index', 'roles' => []],
                ['controller' => 'Application\Controller\Backoffice', 'roles' => ['user', 'admin']],
                ['controller' => '\Controller\AdminController', 'roles' => ['admin']],

            ],
        ],
    ],
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
