<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 08/06/2016
 * Time: 21:58
 */

namespace Application\Controller;


use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractCrudController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    protected $service;
    protected $entity;
    protected $form;
    protected $filter;
    protected $itensPorPagina = 10;
    protected $template;
    protected $filtro = array();
    protected $where = array();
    protected $order = array();

    protected $route = 'home';
    protected $module;
    protected $controller;
    protected $action;

    protected $title = 'Início';

    public function indexAction()
    {
        if($this->order == '') {
            $data = $this->getRepository()->findAll();
        } else {
            $data = $this->getRepository()->findBy(array(),$this->order);
        }
        $dataArray = array();
        foreach($data as $object){
            $dataArray[] = $object->toArray();
        }
        return array(
            'title'=> $this->title,
            'data' => $dataArray
        );
    }

    public function adicionarAction()
    {
        // recebe id da rota quando é selecionada adição a partir do registro pai
        $id = $this->params()->fromRoute('id');
        $form = new $this->form($this->route, $this->entity, $this->getEntityManager(), null);
        $basePath = $this->getRequest()->getRequestUri();
        $form->setAttribute('action',$basePath);
        $form->setAttribute('fk1',$id);
        $form->setLabel('Adicionar '.$this->title);
        if ($this->getRequest()->isPost()) {
            $form->setData(
                array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(),
                    $this->getRequest()->getFiles()->toArray()
                )
            );
            if ($form->isValid()) {
                $data = $form->getData();
                $this->getEntityManager()->persist($data);
                $this->getEntityManager()->flush();
                if($id) {
                    $this->redirect()->toRoute($this->fk1route, array('action'=>'editar', 'id'=>$id));
                } else {
                    $this->redirect()->toRoute($this->route);
                }
            }
        }
        $form->prepare();
        return array(
            'form' => $form
        );
    }

    public function editarAction()
    {
        try {
            /**
             * @var $form Form
             */
            //@todo verificar outra forma de passar o nome para o form. N�o utilizar a rota
            /*$form = new $this->form($this->route, array(
                'om' => $this->getEntityManager()
            ));*/
            $id = $this->params()->fromRoute('id');
            $form = new $this->form($this->route, $this->entity, $this->getEntityManager(), $id);
            $basePath = $this->getRequest()->getRequestUri();
            $form->setAttribute('action', $basePath);
            $form->setLabel('Editar ' . $this->title);
            $object = $this->getRepository()->findOneById($id);
            $form->bind($object);

            if ($this->getRequest()->isPost()) {
                $form->setData(
                    array_merge_recursive(
                        $this->getRequest()->getPost()->toArray(),
                        $this->getRequest()->getFiles()->toArray()
                    )
                );
                if ($form->isValid()) {
                    $data = $form->getData();
                    $this->getEntityManager()->persist($data);
                    $this->getEntityManager()->flush();
                    $this->redirect()->toRoute($this->route);
                }
            }
            $form->prepare();
            //@todo verificar outra forma de passar o nome para o form. N�o utilizar a rota
            return array(
                'form' => $form,
                $this->route => $object
            );
        } catch (\Exception $e) {
            var_dump($e->getMessage());die;
        }
    }

    public function removerAction()
    {
        $id = $this->params()->fromRoute('id');
        $object = $this->getRepository()->findOneById($id);
        $this->getEntityManager()->remove($object);
        $this->getEntityManager()->flush();
        $this->redirect()->toRoute($this->route);
    }

    public function getEntityManager()
    {
        if ($this->entityManager === null) {
            $this->entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->entityManager;
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->getEntityManager()->getRepository($this->entity);
    }
}