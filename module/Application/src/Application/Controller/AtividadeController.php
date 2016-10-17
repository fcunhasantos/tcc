<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 31/07/2016
 * Time: 15:41
 */

namespace Application\Controller;


class AtividadeController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Atividade';
    protected $form = 'Application\Form\AtividadeForm';
    protected $route = 'atividade';
    protected $title = 'Atividade';

    public function atividadeCursoAction()
    {
        $data = $this->getRepository()->findByCurso($this->params()->fromRoute('curso'));
        $dataArray = array();
        foreach($data as $object){
            $dataArray[] = $object->toArray($this->getEntityManager());
        }
        return array(
            'title'=> $this->title,
            'cursoId' => $this->params()->fromRoute('curso'),
            'data' => $dataArray
        );
    }
}