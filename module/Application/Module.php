<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sharedEvents = $eventManager->getSharedManager();
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController','dispatch', function($ev){
            /**
             * @var $ev \Zend\Mvc\MvcEvent
             * @var $auth \Zend\Authentication\AuthenticationService
             */
            $auth = $ev->getApplication()->getServiceManager()->get('Zend\Authentication\AuthenticationService');
            $t = $ev->getTarget();
            if($auth->hasIdentity()){
                return;
            }
            if($ev->getRouteMatch()->getParam('action') == 'login'){
                return;
            }
            return $t->redirect()->toRoute('auth');
        }, 99);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
