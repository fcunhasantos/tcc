<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscricao
 *
 * @ORM\Table(name="inscricao", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_inscricao_usuario1_idx", columns={"usuario_id"}), @ORM\Index(name="fk_inscricao_curso1_idx", columns={"curso_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\InscricaoRepository")
 */
class Inscricao
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
     * @var float
     *
     * @ORM\Column(name="nota", type="float", precision=10, scale=0, nullable=false)
     */
    private $nota = '0';

    /**
     * @var \Application\Entity\Curso
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Curso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     * })
     */
    private $curso;

    /**
     * @var \Application\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;



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
     * Set nota
     *
     * @param float $nota
     *
     * @return Inscricao
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return float
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set curso
     *
     * @param \Application\Entity\Curso $curso
     *
     * @return Inscricao
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

    /**
     * Set usuario
     *
     * @param \Application\Entity\Usuario $usuario
     *
     * @return Inscricao
     */
    public function setUsuario(\Application\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Application\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
