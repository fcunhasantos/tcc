<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:41
 */

namespace Application\Controller;


class QuestaoController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Questao';
    protected $form = 'Application\Form\QuestaoForm';
    protected $route = 'questao';
    protected $title = 'Questão';
}