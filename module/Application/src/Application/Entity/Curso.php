<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table(name="curso", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_curso_categoria_curso1_idx", columns={"categoria_curso_id"}), @ORM\Index(name="fk_curso_instrutor1_idx", columns={"instrutor_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\CursoRepository")
 */
class Curso
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
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="palavras_chave", type="string", length=500, nullable=true)
     */
    private $palavrasChave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_limite", type="date", nullable=true)
     */
    private $dataLimite;

    /**
     * @var \Application\Entity\CategoriaCurso
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CategoriaCurso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_curso_id", referencedColumnName="id")
     * })
     */
    private $categoriaCurso;

    /**
     * @var \Application\Entity\Instrutor
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Instrutor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instrutor_id", referencedColumnName="id")
     * })
     */
    private $instrutor;



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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Curso
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set palavrasChave
     *
     * @param string $palavrasChave
     *
     * @return Curso
     */
    public function setPalavrasChave($palavrasChave)
    {
        $this->palavrasChave = $palavrasChave;

        return $this;
    }

    /**
     * Get palavrasChave
     *
     * @return string
     */
    public function getPalavrasChave()
    {
        return $this->palavrasChave;
    }

    /**
     * Set dataLimite
     *
     * @param \DateTime $dataLimite
     *
     * @return Curso
     */
    public function setDataLimite($dataLimite)
    {
        $this->dataLimite = $dataLimite;

        return $this;
    }

    /**
     * Get dataLimite
     *
     * @return \DateTime
     */
    public function getDataLimite()
    {
        return $this->dataLimite;
    }

    /**
     * Set categoriaCurso
     *
     * @param \Application\Entity\CategoriaCurso $categoriaCurso
     *
     * @return Curso
     */
    public function setCategoriaCurso(\Application\Entity\CategoriaCurso $categoriaCurso = null)
    {
        $this->categoriaCurso = $categoriaCurso;

        return $this;
    }

    /**
     * Get categoriaCurso
     *
     * @return \Application\Entity\CategoriaCurso
     */
    public function getCategoriaCurso()
    {
        return $this->categoriaCurso;
    }

    /**
     * Set instrutor
     *
     * @param \Application\Entity\Instrutor $instrutor
     *
     * @return Curso
     */
    public function setInstrutor(\Application\Entity\Instrutor $instrutor = null)
    {
        $this->instrutor = $instrutor;

        return $this;
    }

    /**
     * Get instrutor
     *
     * @return \Application\Entity\Instrutor
     */
    public function getInstrutor()
    {
        return $this->instrutor;
    }
}
