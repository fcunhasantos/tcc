<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 18/07/2016
 * Time: 22:06
 */

namespace Application\Form;


class PerfilForm extends AbstractCrudForm
{
    public function __construct($name, $entity, $entityManager)
    {
        $this->fields = array(
            array(
                'type' => 'hidden',
                'name' => 'id'
            ),
            array(
                'name' => 'nome',
                'type' => 'Text',
                'options' => array(
                    'label' => 'Nome'
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
        );

        $this->filters = array(
            array(
                'name' => 'nome',
                'required' => true
            ),
        );

        parent::__construct($name, $entity, $entityManager);
    }
}