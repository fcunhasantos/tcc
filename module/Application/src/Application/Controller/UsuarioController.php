<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 06/07/2016
 * Time: 23:33
 */

namespace Application\Controller;



class UsuarioController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Usuario';
    protected $form = 'Application\Form\UsuarioForm';
    protected $route = 'usuario';
    protected $title = 'Usuário';
}