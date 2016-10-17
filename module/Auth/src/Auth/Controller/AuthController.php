<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Auth\Controller;

use Auth\Form\FormLogin;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $viewModel = new ViewModel();

        $form = new FormLogin();

        if($this->getRequest()->isPost()){

            $form->setData($this->getRequest()->getPost()->toArray());

            if($form->isValid()) {
                $data = $form->getData();

                /**
                 * @var $auth \Zend\Authentication\AuthenticationService
                 * @var $adapter \Auth\Authentication\Adapter
                 */
                $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter = $auth->getAdapter();
                $adapter->setLogin($data['email']);
                $adapter->setPassword($data['senha']);

                if ($auth->authenticate()->isValid()) {
                    $this->identity()->setPerfilId($this->identity()->getPerfil()->getId());
                    if ($this->identity()->getPerfilId() === 1) {
                        return $this->redirect()->toRoute('home', array('controller' => 'home', 'action' => 'index'));
                    }
                    elseif ($this->identity()->getPerfilId() === 4) {
                        return $this->redirect()->toRoute('user', array('controller' => 'index', 'action' => 'index'));
                    }
                }

                $mensagem = $auth->authenticate()->getMessages();
                $this->flashMessenger()->addErrorMessage($mensagem[0]);
            }
        }

        return $viewModel->setVariables(array('form' => $form));
    }
}
