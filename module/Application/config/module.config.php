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
            'perfil' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/perfil[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Perfil',
                        'action' => 'index'
                    )
                ),
            ),
            'usuario' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/usuario[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Usuario',
                        'action' => 'index'
                    )
                ),
            ),
            'instrutor' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/instrutor[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Instrutor',
                        'action' => 'index'
                    )
                ),
            ),
            'categoriacurso' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/categoriacurso[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\CategoriaCurso',
                        'action' => 'index'
                    )
                ),
            ),
            'tipoatividade' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/tipoatividade[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\TipoAtividade',
                        'action' => 'index'
                    )
                ),
            ),
            'curso' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/curso[/:action][/:id][/]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Curso',
                        'action' => 'index'
                    )
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
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class,
            'Application\Controller\Perfil' => Controller\PerfilController::class,
            'Application\Controller\Usuario' => Controller\UsuarioController::class,
            'Application\Controller\Instrutor' => Controller\InstrutorController::class,
            'Application\Controller\CategoriaCurso' => Controller\CategoriaCursoController::class,
            'Application\Controller\TipoAtividade' => Controller\TipoAtividadeController::class,
            'Application\Controller\Curso' => Controller\CursoController::class,
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Application/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
                )
            )
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
    'view_helpers' => [
        'factories' => [
            'formelementerrors' => function($vhm) {
                $fee = new \Zend\Form\View\Helper\FormElementErrors();
                $fee->setAttributes([
                    'class' => 'alert alert-warning',
                    'role' => 'alert'
                ]);
                return $fee;
            }
        ]
    ],
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
