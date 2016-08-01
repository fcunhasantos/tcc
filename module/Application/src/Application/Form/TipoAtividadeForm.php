<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;


class TipoAtividadeForm extends AbstractCrudForm
{
    public function __construct($name, $entity, $entityManager)
    {
        $this->fields = array(
            array(
                'name' => 'nome',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            )
        );

        $this->filters = array(
            array(
                'name' => 'nome',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }
}