<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:11
 */

namespace Application\Controller;


class CategoriaCursoController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\CategoriaCurso';
    protected $form = 'Application\Form\CategoriaCursoForm';
    protected $route = 'categoriacurso';
    protected $title = 'Categoria de Curso';
}