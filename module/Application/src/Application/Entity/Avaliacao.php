<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avaliacao
 *
 * @ORM\Table(name="avaliacao", indexes={@ORM\Index(name="fk_avaliacao_inscricao1_idx", columns={"inscricao_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\AvaliacaoRepository")
 */
class Avaliacao
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
     * @ORM\Column(name="comentario", type="string", length=500, nullable=false)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="nota", type="integer", nullable=false)
     */
    private $nota;

    /**
     * @var \Application\Entity\Inscricao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Inscricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inscricao_id", referencedColumnName="id")
     * })
     */
    private $inscricao;

    public function toArray()
    {
        return array(
            'id' => $this->id,
            'comentario' => $this->comentario,
            'nota' => $this->nota,
            'inscricao' => $this->inscricao->toArray()
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
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param string $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return int
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param int $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    /**
     * @return Inscricao
     */
    public function getInscricao()
    {
        return $this->inscricao;
    }

    /**
     * @param Inscricao $inscricao
     */
    public function setInscricao($inscricao)
    {
        $this->inscricao = $inscricao;
    }


}

