<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 18/07/2016
 * Time: 22:06
 */

namespace Application\Form;


class InstrutorForm extends AbstractCrudForm
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
            ),
            array(
                'name' => 'email',
                'type' => 'Email',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
        );

        $this->filters = array(
            array(
                'name' => 'nome',
                'required' => true
            ),
            array(
                'name' => 'email',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }
}