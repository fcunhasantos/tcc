<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:41
 */

namespace Application\Controller;


class TipoAtividadeController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\TipoAtividade';
    protected $form = 'Application\Form\TipoAtividadeForm';
    protected $route = 'tipoatividade';
    protected $title = 'Tipo de Atividade';
}