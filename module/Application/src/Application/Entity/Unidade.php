<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidade
 *
 * @ORM\Table(name="unidade", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_unidade_curso1_idx", columns={"curso_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\UnidadeRepository")
 */
class Unidade
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
     * @ORM\Column(name="descricao", type="string", length=100, nullable=false)
     */
    private $descricao;

    /**
     * @var \Application\Entity\Curso
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     * })
     */
    private $curso;


    public function toArray()
    {
        return array(
            'id' => $this->id,
            'descricao' => $this->descricao,
            'curso' => $this->curso->toArray()
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Unidade
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set curso
     *
     * @param \Application\Entity\Curso $curso
     *
     * @return Atividade
     */
    public function setCurso(\Application\Entity\Curso $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return \Application\Entity\Curso
     */
    public function getCurso()
    {
        return $this->curso;
    }
}
