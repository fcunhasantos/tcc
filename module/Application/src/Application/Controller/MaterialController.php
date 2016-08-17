<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:41
 */

namespace Application\Controller;


class MaterialController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Material';
    protected $form = 'Application\Form\MaterialForm';
    protected $route = 'material';
    protected $title = 'Material';
}