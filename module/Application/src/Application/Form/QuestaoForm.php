<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;


class QuestaoForm extends AbstractCrudForm
{
    private $arrayAtividade;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaAtividadeArray($entityManager);
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
                'name' => 'resposta',
                'type' => 'Select',
                'options' => array(
                    'value_options' => array(),
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'atividade',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayAtividade,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            )
        );

        $this->filters = array(
            array(
                'name' => 'nome',
                'required' => true
            ),
            array(
                'name' => 'descricao',
                'required' => true
            ),
            array(
                'name' => 'resposta',
                'required' => true
            ),
            array(
                'name' => 'atividade',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaAtividadeArray($entityManager)
    {
        $atividades = $entityManager->getRepository('Application\Entity\Atividade')->findAll();
        foreach ($atividades as $atividade) {
            $this->arrayAtividade[$atividade->getId()] = $atividade->getNome();
        }
    }
}