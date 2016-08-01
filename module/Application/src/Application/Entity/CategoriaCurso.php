<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaCurso
 *
 * @ORM\Table(name="categoria_curso", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\CategoriaCursoRepository")
 */
class CategoriaCurso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;


    public function toArray()
    {
        return array(
            'id' => $this->id,
            'nome' => $this->nome
        );
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return CategoriaCurso
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }
}
