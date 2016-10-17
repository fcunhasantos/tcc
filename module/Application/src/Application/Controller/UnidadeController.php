<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 16/10/2016
 * Time: 15:41
 */

namespace Application\Controller;


class UnidadeController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Unidade';
    protected $form = 'Application\Form\UnidadeForm';
    protected $route = 'unidade';
    protected $title = 'Unidade';
}