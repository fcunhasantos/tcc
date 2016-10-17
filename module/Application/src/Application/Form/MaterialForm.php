<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:42
 */

namespace Application\Form;

use Application\Validator\UploadFilter;

class MaterialForm extends AbstractCrudForm
{
    private $arrayCurso;
    private $arrayUnidade;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaCursoArray($entityManager);
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
                'name' => 'arquivo',
                'type' => 'File',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'url',
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
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Please enter a value for "foo".',
                            ),
                        ),
                    ),
                )
            ),
            array(
                'name' => 'arquivo',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Please enter a value for "foo".',
                            ),
                        ),
                    ),
                )
            ),
            array(
                'name' => 'url',
                'required' => true
            ),
            array(
                'name' => 'curso',
                'required' => true
            ),
            array(
                'name' => 'unidade',
                'required' => true
            ),
            array(
                'name' => 'nrordem',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
        $this->setInputFilter(new UploadFilter('arquivo'));
    }

    private function carregaCursoArray($entityManager)
    {
        $cursos = $entityManager->getRepository('Application\Entity\Curso')->findAll();
        foreach ($cursos as $curso) {
            $this->arrayCurso[$curso->getId()] = $curso->getTitulo();
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