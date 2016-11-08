<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:12
 */

namespace User\Form;

use Application\Form\AbstractCrudForm;

class AvaliacaoForm extends AbstractCrudForm
{
    protected $name = 'avaliacao';
    protected $entity = 'Application\Entity\Avaliacao';

    public function __construct($entityManager)
    {
        $this->fields = array(
            array(
                'name' => 'comentario',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'nota',
                'type' => 'Number',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                    'min'  => '0',   // default minimum is 0
                    'max'  => '100', // default maximum is 100
                    'step' => '1',   // default interval is 1
                )
            ),
        );

        $this->filters = array(
            array(
                'name' => 'comentario',
                'messages' => array(
                    'message'
                ),
                'required' => true
            ),
            array(
                'name' => 'nota',
                'required' => true
            )
        );

        parent::__construct($this->name, $this->entity, $entityManager);
    }
}