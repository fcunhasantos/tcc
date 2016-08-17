<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questao
 *
 * @ORM\Table(name="questao", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_questao_atividade1_idx", columns={"atividade_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\QuestaoRepository")
 */
class Questao
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
     * @ORM\Column(name="descricao", type="string", length=1000, nullable=false)
     */
    private $descricao;

    /**
     * @var integer
     *
     * @ORM\Column(name="resposta", type="integer", nullable=true)
     */
    private $resposta;

    /**
     * @var \Application\Entity\Atividade
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Atividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atividade_id", referencedColumnName="id")
     * })
     */
    private $atividade;


    public function toArray()
    {
        return array(
            'id' => $this->id,
            'descricao' => $this->descricao,
            'resposta' => $this->resposta,
            'atividade' => $this->atividade->toArray()
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
     * @return Questao
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
     * Set resposta
     *
     * @param integer $resposta
     *
     * @return Questao
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    /**
     * Get resposta
     *
     * @return integer
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * Set atividade
     *
     * @param \Application\Entity\Atividade $atividade
     *
     * @return Questao
     */
    public function setAtividade(\Application\Entity\Atividade $atividade = null)
    {
        $this->atividade = $atividade;

        return $this;
    }

    /**
     * Get atividade
     *
     * @return \Application\Entity\Atividade
     */
    public function getAtividade()
    {
        return $this->atividade;
    }
}
