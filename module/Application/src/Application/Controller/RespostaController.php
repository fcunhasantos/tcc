<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:41
 */

namespace Application\Controller;


class RespostaController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Resposta';
    protected $form = 'Application\Form\RespostaForm';
    protected $route = 'resposta';
    protected $title = 'Resposta';
}