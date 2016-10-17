<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace User\Form;

use Application\Form\AbstractCrudForm;

class MinhaAtividadeForm extends AbstractCrudForm
{
    public function __construct($name, $entity, $entityManager)
    {
        $questoes = $entityManager->getRepository('Application\Entity\Questao')
            ->findBy(array('atividade' => $entity->getId()));
        foreach ($questoes as $questao) {
            $this->arrayCurso[$curso->getId()] = $curso->getTitulo();
        }

        $this->fields = array(
            array(
                'name' => 'nome',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'descricao',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'curso',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayCurso,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'tipoAtividade',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayTipoAtividade,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }
}