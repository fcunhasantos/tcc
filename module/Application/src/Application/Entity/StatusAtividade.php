<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusAtividade
 *
 * @ORM\Table(name="status_atividade", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_status_atividade_atividade1_idx", columns={"atividade_id"}), @ORM\Index(name="fk_status_atividade_inscricao1_idx", columns={"inscricao_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\StatusAtividadeRepository")
 */
class StatusAtividade
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
     * @ORM\Column(name="percentual", type="float", precision=10, scale=0, nullable=false)
     */
    private $percentual = '0';

    /**
     * @var \Application\Entity\Atividade
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Atividade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atividade_id", referencedColumnName="id")
     * })
     */
    private $atividade;

    /**
     * @var \Application\Entity\Inscricao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Inscricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inscricao_id", referencedColumnName="id")
     * })
     */
    private $inscricao;



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
     * Set percentual
     *
     * @param float $percentual
     *
     * @return StatusAtividade
     */
    public function setPercentual($percentual)
    {
        $this->percentual = $percentual;

        return $this;
    }

    /**
     * Get percentual
     *
     * @return float
     */
    public function getPercentual()
    {
        return $this->percentual;
    }

    /**
     * Set atividade
     *
     * @param \Application\Entity\Atividade $atividade
     *
     * @return StatusAtividade
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

    /**
     * Set inscricao
     *
     * @param \Application\Entity\Inscricao $inscricao
     *
     * @return StatusAtividade
     */
    public function setInscricao(\Application\Entity\Inscricao $inscricao = null)
    {
        $this->inscricao = $inscricao;

        return $this;
    }

    /**
     * Get inscricao
     *
     * @return \Application\Entity\Inscricao
     */
    public function getInscricao()
    {
        return $this->inscricao;
    }
}
