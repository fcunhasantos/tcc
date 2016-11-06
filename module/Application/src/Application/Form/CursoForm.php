<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 01/08/2016
 * Time: 15:23
 */

namespace Application\Form;


class CursoForm extends AbstractCrudForm
{
    private $arrayCategoria;
    private $arrayInstrutor;

    public function __construct($name, $entity, $entityManager, $id)
    {
        $this->carregaCategoriaArray($entityManager);
        $this->carregaInstrutorArray($entityManager);
        $this->fields = array(
            array(
                'name' => 'titulo',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'palavrasChave',
                'type' => 'TextArea',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'dataLimite',
                'type' => 'Date',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'categoriaCurso',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayCategoria,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'instrutor',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayInstrutor,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
        );

        $this->filters = array(
            array(
                'name' => 'titulo',
                'required' => true
            ),
            array(
                'name' => 'palavrasChave',
                'required' => true
            ),
            array(
                'name' => 'dataLimite',
                'required' => true
            ),
            array(
                'name' => 'categoriaCurso',
                'required' => true
            ),
            array(
                'name' => 'instrutor',
                'required' => true
            ),
        );

        $this->setAttribute('videos', $this->getArrayVideos($entityManager, $id));
        $this->setAttribute('atividades', $this->getArrayAtividades($entityManager, $id));
        $this->setAttribute('materiais', $this->getArrayMateriais($entityManager, $id));

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaCategoriaArray($entityManager)
    {
        $categorias = $entityManager->getRepository('Application\Entity\CategoriaCurso')->findAll();
        foreach ($categorias as $categoria) {
            $this->arrayCategoria[$categoria->getId()] = $categoria->getNome();
        }
    }

    private function carregaInstrutorArray($entityManager)
    {
        $instrutores = $entityManager->getRepository('Application\Entity\Instrutor')->findAll();
        foreach ($instrutores as $instrutor) {
            $this->arrayInstrutor[$instrutor->getId()] = $instrutor->getNome();
        }
    }

    private function getArrayVideos($entityManager, $cursoId)
    {
        $arrayVideos = array();
        $videos = $entityManager->getRepository('Application\Entity\Video')->findByCurso($cursoId);
        foreach ($videos as $video) {
            $arrayVideos[] = $video->toArray();
        }
        return $arrayVideos;
    }

    private function getArrayAtividades($entityManager, $cursoId)
    {
        $arrayAtividades = array();
        $atividades = $entityManager->getRepository('Application\Entity\Atividade')->findByCurso($cursoId);
        foreach ($atividades as $atividade) {
            $arrayAtividades[] = $atividade->toArray();
        }
        return $arrayAtividades;
    }

    private function getArrayMateriais($entityManager, $cursoId)
    {
        $arrayMateriais = array();
        $materiais = $entityManager->getRepository('Application\Entity\Material')->findByCurso($cursoId);
        foreach ($materiais as $material) {
            $arrayMateriais[] = $material->toArray();
        }
        return $arrayMateriais;
    }
}