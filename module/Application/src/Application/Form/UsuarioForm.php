<?php
namespace Application\Form;

use Zend\Form\Form;
use Application\Entity\Usuario;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\InputFilter\InputFilter;

class UsuarioForm extends Form
{
    protected $objectManager;
    protected $arrayPerfil;

    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->objectManager = $options['om'];
        $this->carregaPefilArray();
        $this->setObject(new Usuario())
            ->setHydrator(new DoctrineObject($this->objectManager))
            ->add(array(
                'type' => 'hidden',
                'name' => 'id'
            ))
            ->add(array(
                'name' => 'nome',
                'type' => 'Text',
                'attributes' => array(
                    'class' => 'form-control input-sm'
                )
            ))
            ->add(array(
                'name' => 'email',
                'type' => 'Email',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ))
            ->add(array(
                'name' => 'perfil',
                'type' => 'Select',
                'options' => array(
                    'value_options' => $this->arrayPerfil,
                ),
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ))
            ->add(array(
                'name' => 'senha',
                'type' => 'Password',
                'attributes' => array(
                    'class' => 'form-control input-sm',
                )
            ));

        $filter = new InputFilter();
        $filter
            ->add(array(
                'name' => 'nome',
                'required' => true
            ))
            ->add(array(
                'name' => 'email',
                'required' => true
            ))
            ->add(array(
                'name' => 'perfil',
                'required' => true
            ))
            ->add(array(
                'name' => 'senha',
                'required' => true
            ));
        $this->setInputFilter($filter);
    }

    private function carregaPefilArray()
    {
        $perfis = $this->objectManager->getRepository('Application\Entity\Perfil')->findAll();
        foreach ($perfis as $perfil) {
            $this->arrayPerfil[$perfil->getId()] = $perfil->getNome();
        }
    }
}