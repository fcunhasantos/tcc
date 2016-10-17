<?php

namespace Auth\Authentication;

use Application\Entity\Usuario;
use Doctrine\ORM\EntityManager;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 29/09/2016
 * Time: 21:14
 */
class Adapter implements AdapterInterface
{

    protected $em;
    protected $login;
    protected $password;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        /** @var \Application\Entity\Usuario $user */
        $user = $this->em->getRepository('Application\Entity\Usuario')
            ->findByEmailAndSenha(new Usuario(), $this->getLogin(), $this->getPassword());;

        if($user)
            return new Result(Result::SUCCESS, $user, array());

        return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(
            'Não foi possível conectar. Email ou senha inválidos.'
        ));
    }
}