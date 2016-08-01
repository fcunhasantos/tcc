<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 06/07/2016
 * Time: 23:33
 */

namespace Application\Controller;



class PerfilController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Perfil';
    protected $form = 'Application\Form\PerfilForm';
    protected $route = 'perfil';
    protected $title = 'Perfil de Usuário';
}