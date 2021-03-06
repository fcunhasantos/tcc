<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atividade
 *
 * @ORM\Table(name="atividade", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_atividade_curso1_idx", columns={"curso_id"}), @ORM\Index(name="fk_atividade_tipo_atividade1_idx", columns={"tipo_atividade_id"}), @ORM\Index(name="fk_atividade_unidade1_idx", columns={"unidade_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\AtividadeRepository")
 */
class Atividade
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

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=500, nullable=true)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="nrordem", type="integer", nullable=true)
     */
    private $nrordem;

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
     * @var \Application\Entity\TipoAtividade
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TipoAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_atividade_id", referencedColumnName="id")
     * })
     */
    private $tipoAtividade;

    /**
     * @var \Application\Entity\Unidade
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Unidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidade_id", referencedColumnName="id")
     * })
     */
    private $unidade;


    public function toArray()
    {
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'nrordem' => $this->nrordem,
            'curso' => $this->curso->toArray(),
            'tipoAtividade' => $this->tipoAtividade->toArray(),
            'unidade' => $this->unidade->toArray()
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
     * @return Atividade
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

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Atividade
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
     * Set nrordem
     *
     * @param int $nrordem
     *
     * @return Material
     */
    public function setNrordem($nrordem)
    {
        $this->nrordem = $nrordem;

        return $this;
    }

    /**
     * Get nrordem
     *
     * @return int
     */
    public function getNrordem()
    {
        return $this->nrordem;
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

    /**
     * Set tipoAtividade
     *
     * @param \Application\Entity\TipoAtividade $tipoAtividade
     *
     * @return Atividade
     */
    public function setTipoAtividade(\Application\Entity\TipoAtividade $tipoAtividade = null)
    {
        $this->tipoAtividade = $tipoAtividade;

        return $this;
    }

    /**
     * Get tipoAtividade
     *
     * @return \Application\Entity\TipoAtividade
     */
    public function getTipoAtividade()
    {
        return $this->tipoAtividade;
    }

    /**
     * Set unidade
     *
     * @param \Application\Entity\Unidade $unidade
     *
     * @return Material
     */
    public function setUnidade(\Application\Entity\Unidade $unidade = null)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return \Application\Entity\Unidade
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
