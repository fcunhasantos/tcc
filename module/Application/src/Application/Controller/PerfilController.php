<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 06/07/2016
 * Time: 23:33
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Application\Form\PerfilForm;

class PerfilController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Perfil';
    protected $form = 'Application\Form\PerfilForm';
    protected $route = 'perfil';

    /*public function indexAction()
    {
        $perfis = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Perfil')
            ->findAll();
        return array(
            'perfis' => $perfis
        );
    }*/

    /*public function adicionarAction()
    {
        $form = new PerfilForm('perfil', array(
            'om' => $this->getServiceLocator()->get('Doctrine\ORM\EntityManager')
        ));
        if ($this->getRequest()->isPost()) {
            $form->setData(array_merge_recursive($this->getRequest()
                ->getPost()
                ->toArray(), $this->getRequest()
                ->getFiles()
                ->toArray()));
            if ($form->isValid()) {
                $data = $form->getData();
                $this->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager')
                    ->persist($data);
                $this->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager')
                    ->flush();
                $this->redirect()->toRoute('perfil');
            }
        }
        $form->prepare();
        return array(
            'form' => $form
        );
    }*/

    /*public function editarAction()
    {
        $form = new PerfilForm('perfil', array(
            'om' => $this->getServiceLocator()->get('Doctrine\ORM\EntityManager')
        ));
        $id = $this->params()->fromRoute('id');
        $perfil = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Perfil')
            ->findOneById($id);
        $form->bind($perfil);

        if ($this->getRequest()->isPost()) {
            $form->setData(array_merge_recursive($this->getRequest()
                ->getPost()
                ->toArray(), $this->getRequest()
                ->getFiles()
                ->toArray()));
            if ($form->isValid()) {
                $data = $form->getData();

                $this->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager')
                    ->persist($data);
                $this->getServiceLocator()
                    ->get('Doctrine\ORM\EntityManager')
                    ->flush();
                $this->redirect()->toRoute('perfil');
            }
        }
        $form->prepare();
        return array(
            'form' => $form,
            'perfil' => $perfil
        );
    }*/

    /*public function removerAction()
    {
        $id = $this->params()->fromRoute('id');
        $perfil = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\Perfil')
            ->findOneById($id);
        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->remove($perfil);
        $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->flush();
        $this->redirect()->toRoute('perfil');
    }*/
}