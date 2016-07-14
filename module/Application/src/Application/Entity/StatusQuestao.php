<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusQuestao
 *
 * @ORM\Table(name="status_questao", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_status_questao_questao1_idx", columns={"questao_id"}), @ORM\Index(name="fk_status_questao_status_atividade1_idx", columns={"status_atividade_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\StatusQuestaoRepository")
 */
class StatusQuestao
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
     * @var integer
     *
     * @ORM\Column(name="resposta", type="integer", nullable=false)
     */
    private $resposta;

    /**
     * @var \Application\Entity\Questao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Questao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questao_id", referencedColumnName="id")
     * })
     */
    private $questao;

    /**
     * @var \Application\Entity\StatusAtividade
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\StatusAtividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_atividade_id", referencedColumnName="id")
     * })
     */
    private $statusAtividade;



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
     * Set resposta
     *
     * @param integer $resposta
     *
     * @return StatusQuestao
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
     * Set questao
     *
     * @param \Application\Entity\Questao $questao
     *
     * @return StatusQuestao
     */
    public function setQuestao(\Application\Entity\Questao $questao = null)
    {
        $this->questao = $questao;

        return $this;
    }

    /**
     * Get questao
     *
     * @return \Application\Entity\Questao
     */
    public function getQuestao()
    {
        return $this->questao;
    }

    /**
     * Set statusAtividade
     *
     * @param \Application\Entity\StatusAtividade $statusAtividade
     *
     * @return StatusQuestao
     */
    public function setStatusAtividade(\Application\Entity\StatusAtividade $statusAtividade = null)
    {
        $this->statusAtividade = $statusAtividade;

        return $this;
    }

    /**
     * Get statusAtividade
     *
     * @return \Application\Entity\StatusAtividade
     */
    public function getStatusAtividade()
    {
        return $this->statusAtividade;
    }
}
