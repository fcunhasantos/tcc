<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 18/07/2016
 * Time: 22:06
 */

namespace Application\Form;


class UsuarioForm extends AbstractCrudForm
{
    private $arrayPerfil;

    public function __construct($name, $entity, $entityManager)
    {
        $this->carregaPefilArray($entityManager);
        $this->fields = array(
            array(
                'type' => 'hidden',
                'name' => 'id'
            ),
            array(
                'name' => 'nome',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ),
            array(
                'name' => 'email',
                'type' => 'Email',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'perfil',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayPerfil,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ),
            array(
                'name' => 'senha',
                'type' => 'Password',
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
                'name' => 'email',
                'required' => true
            ),
            array(
                'name' => 'perfil',
                'required' => true
            ),
            array(
                'name' => 'senha',
                'required' => true
            )
        );

        parent::__construct($name, $entity, $entityManager);
    }

    private function carregaPefilArray($entityManager)
    {
        $perfis = $entityManager->getRepository('Application\Entity\Perfil')->findAll();
        foreach ($perfis as $perfil) {
            $this->arrayPerfil[$perfil->getId()] = $perfil->getNome();
        }
    }
}