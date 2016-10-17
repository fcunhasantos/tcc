<?php

namespace Auth\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Form;

/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 29/09/2016
 * Time: 20:41
 */
class FormLogin extends Form
{
    function __construct()
    {
        parent::__construct('login', array());
        $this->setAttribute('method', 'POST');

        $email = new Text('email');
        //$email->setLabel('Email');
        $email->setAttribute('class', 'form-control input-sm');
        $this->add($email);

        $senha = new Password('senha');
        //$senha->setLabel('Senha');
        $senha->setAttribute('class', 'form-control input-sm');
        $this->add($senha);

        $button = new Button('submit');
        $button->setAttribute('class', 'btn btn-sm btn-primary');
        $button->setLabel('Fazer Login')
            ->setAttributes(array(
                'type' => 'submit'
            ));
        $this->add($button);
    }
}