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

    public function __construct($name, $entity, $entityManager, $id)
    {
        $this->carregaAtividadeArray($entityManager);
        $this->fields = array(
            array(
                'name' => 'descricao',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
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
                'name' => 'descricao',
                'required' => true
            ),
            array(
                'name' => 'atividade',
                'required' => true
            )
        );

        $this->setAttribute('respostas', $this->getArrayRespostas($entityManager, $id));

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaAtividadeArray($entityManager)
    {
        $atividades = $entityManager->getRepository('Application\Entity\Atividade')->findAll();
        foreach ($atividades as $atividade) {
            $this->arrayAtividade[$atividade->getId()] = $atividade->getNome();
        }
    }

    private function getArrayRespostas($entityManager, $questaoId)
    {
        $arrayRespostas = array();
        $respostas = $entityManager->getRepository('Application\Entity\Resposta')->findByQuestao($questaoId,array('descricao'=>'ASC'));
        foreach ($respostas as $resposta) {
            $arrayRespostas[] = $resposta->toArray();
        }
        return $arrayRespostas;
    }
}