<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;


class AtividadeForm extends AbstractCrudForm
{
    private $arrayCurso;
    private $arrayTipoAtividade;
    private $arrayUnidade;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaCursoArray($entityManager);
        $this->carregaTipoAtividadeArray($entityManager);
        $this->carregaUnidadeArray($entityManager);
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
            ),
            array(
                'name' => 'unidade',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayUnidade,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'nrordem',
                'type' => 'Number',
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
            array(
                'name' => 'descricao',
                'required' => true
            ),
            array(
                'name' => 'curso',
                'required' => true
            ),
            array(
                'name' => 'tipoAtividade',
                'required' => true
            ),
            array(
                'name' => 'unidade',
                'required' => true
            ),
            array(
                'name' => 'nrordem',
                'required' => false
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaCursoArray($entityManager)
    {
        $cursos = $entityManager->getRepository('Application\Entity\Curso')->findAll();
        foreach ($cursos as $curso) {
            $this->arrayCurso[$curso->getId()] = $curso->getTitulo();
        }
    }

    private function carregaTipoAtividadeArray($entityManager)
    {
        $tipos = $entityManager->getRepository('Application\Entity\TipoAtividade')->findAll();
        foreach ($tipos as $tipo) {
            $this->arrayTipoAtividade[$tipo->getId()] = $tipo->getNome();
        }
    }

    private function carregaUnidadeArray($entityManager)
    {
        $unidades = $entityManager->getRepository('Application\Entity\Unidade')->findAll();
        foreach ($unidades as $unidade) {
            $this->arrayUnidade[$unidade->getId()] = $unidade->getDescricao();
        }
    }
}