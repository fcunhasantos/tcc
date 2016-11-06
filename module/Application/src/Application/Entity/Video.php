<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video", indexes={@ORM\Index(name="fk_video_curso1_idx", columns={"curso_id"}), @ORM\Index(name="fk_video_unidade1_idx", columns={"unidade_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="url", type="string", length=500, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="arquivo", type="string", length=500, nullable=true)
     */
    private $arquivo;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * @param string $arquivo
     */
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    /**
     * @return int
     */
    public function getNrordem()
    {
        return $this->nrordem;
    }

    /**
     * @param int $nrordem
     */
    public function setNrordem($nrordem)
    {
        $this->nrordem = $nrordem;
    }

    /**
     * @return Curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @param Curso $curso
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    /**
     * @return Unidade
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * @param Unidade $unidade
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
    }
}

