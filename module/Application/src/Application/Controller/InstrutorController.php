<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 18/07/2016
 * Time: 22:25
 */

namespace Application\Controller;



class InstrutorController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Instrutor';
    protected $form = 'Application\Form\InstrutorForm';
    protected $route = 'instrutor';
    protected $title = 'Instrutor';
}