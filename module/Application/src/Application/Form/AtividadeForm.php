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
    private $arrayTipo;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaCursoArray($entityManager);
        $this->carregaTipoArray($entityManager);
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
                'name' => 'tipoatividade',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayTipo,
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

    private function carregaTipoArray($entityManager)
    {
        $tipos = $entityManager->getRepository('Application\Entity\TipoAtividade')->findAll();
        foreach ($tipos as $tipo) {
            $this->arrayTipo[$tipo->getId()] = $tipo->getNome();
        }
    }
}