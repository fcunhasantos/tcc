<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;


class RespostaForm extends AbstractCrudForm
{
    private $arrayQuestao;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaQuestaoArray($entityManager);
        $this->attributes = array(
            'class' => 'form'
        );
        $this->fields = array(
            array(
                'name' => 'descricao',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'idcorreta',
                'type' => 'Select',
                'options' => array(
                    'value_options' => array(
                        'N' => 'Não',
                        'S' => 'Sim'
                    ),
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'questao',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayQuestao,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            )
        );

        $this->filters = array(
            array(
                'name' => 'descricao',
                'required' => true
            ),
            array(
                'name' => 'idcorreta',
                'required' => true
            ),
            array(
                'name' => 'questao',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaQuestaoArray($entityManager)
    {
        $questoes = $entityManager->getRepository('Application\Entity\Questao')->findAll();
        foreach ($questoes as $questao) {
            $this->arrayQuestao[$questao->getId()] = $questao->getDescricao();
        }
    }
}