<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="resposta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_resposta_questao1_idx", columns={"questao_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\RespostaRepository")
 */
class Resposta
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
     * @ORM\Column(name="descricao", type="string", length=500, nullable=false)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="idcorreta", type="string", length=1, nullable=true)
     */
    private $idcorreta = 'N';

    /**
     * @var \Application\Entity\Questao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Questao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questao_id", referencedColumnName="id")
     * })
     */
    private $questao;

    public function toArray()
    {
        return array(
            'id' => $this->id,
            'descricao' => $this->descricao,
            'idcorreta' => $this->idcorreta,
            'questao' => $this->questao->toArray()
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
     * @return Resposta
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
     * Set questao
     *
     * @param \Application\Entity\Questao $questao
     *
     * @return Resposta
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
     * @return string
     */
    public function getIdcorreta()
    {
        return $this->idcorreta;
    }

    /**
     * @param string $idcorreta
     */
    public function setIdcorreta($idcorreta)
    {
        var_dump($idcorreta);die;
        $this->idcorreta = $idcorreta;
    }


}
