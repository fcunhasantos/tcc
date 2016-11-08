<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User;

return array(
    'router' => array(
        'routes' => array(
            'inscricoes' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/inscricoes',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'inscricoes',
                    ),
                ),
            ),
            'inscricao' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/inscricao[/[:usuario[/:curso]]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'inscricao',
                    ),
                ),
            ),
            'inscrever' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/inscrever[/[:usuario[/:curso]]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'inscrever',
                    ),
                ),
            ),
            'meuscursos' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/meuscursos',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'meuscursos',
                    ),
                ),
            ),
            'meucurso' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/meucurso[/[:inscricao]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'meucurso',
                    ),
                ),
            ),
            'avaliacao' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/avaliacao[/[:inscricao]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'avaliacao',
                    ),
                ),
            ),
            'avaliar' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/avaliacao[/[:inscricao]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'avaliacao',
                    ),
                ),
            ),
            'minhaatividade' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/minhaatividade[/[:inscricao[/:atividade]]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'minhaatividade',
                    ),
                ),
            ),
            'meumaterial' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/meumaterial[/[:inscricao[/:material]]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'meumaterial',
                    ),
                ),
            ),
            'certificados' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/certificados',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'certificados',
                    ),
                ),
            ),
            'meucertificado' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/meucertificado[/[:inscricao]]',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action'     => 'meucertificado',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'user' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
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
            'Zend\Authentication\AuthenticationService' => 'Auth\Authentication\Factory\AuthenticationFactory',
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
            'User\Controller\Index' => Controller\IndexController::class,
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'user/index/index' => __DIR__ . '/../view/user/index/index.phtml',
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
            },
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
