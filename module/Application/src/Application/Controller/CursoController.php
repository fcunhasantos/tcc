<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 01/08/2016
 * Time: 15:22
 */

namespace Application\Controller;


class CursoController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Curso';
    protected $form = 'Application\Form\CursoForm';
    protected $route = 'curso';
    protected $title = 'Curso';
}