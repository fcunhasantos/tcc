<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;


class UnidadeForm extends AbstractCrudForm
{
    private $arrayCurso;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaCursoArray($entityManager);
        $this->fields = array(
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
        );

        $this->filters = array(
            array(
                'name' => 'descricao',
                'required' => true
            ),
            array(
                'name' => 'curso',
                'required' => true
            ),
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
}