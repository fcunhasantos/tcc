<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_material_curso1_idx", columns={"curso_id"}), @ORM\Index(name="fk_material_unidade1_idx", columns={"unidade_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\MaterialRepository")
 */
class Material
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
     * @ORM\Column(name="arquivo", type="string", length=500, nullable=false)
     */
    private $arquivo;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=false)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="nrordem", type="integer", nullable=false)
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
            'arquivo' => $this->arquivo,
            'url' => $this->url,
            'nrordem' => $this->nrordem,
            'curso' => $this->curso->toArray(),
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
     * @return Material
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
     * Set arquivo
     *
     * @param string $arquivo
     *
     * @return Material
     */
    public function setArquivo($arquivo)
    {
        if (is_array($arquivo)) {
            $this->arquivo = $arquivo['tmp_name'];
        } else {
            $this->arquivo = $arquivo;
        }

        return $this;
    }

    /**
     * Get arquivo
     *
     * @return string
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Material
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
     * @return Material
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
     * @return \Application\Entity\Curso
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
