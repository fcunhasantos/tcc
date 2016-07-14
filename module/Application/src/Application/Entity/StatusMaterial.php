<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusMaterial
 *
 * @ORM\Table(name="status_material", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_status_material_inscricao1_idx", columns={"inscricao_id"}), @ORM\Index(name="fk_status_material_material1_idx", columns={"material_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\StatusMaterialRepository")
 */
class StatusMaterial
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
     * @var \Application\Entity\Inscricao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Inscricao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="inscricao_id", referencedColumnName="id")
     * })
     */
    private $inscricao;

    /**
     * @var \Application\Entity\Material
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="material_id", referencedColumnName="id")
     * })
     */
    private $material;



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
     * @return StatusMaterial
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
     * Set inscricao
     *
     * @param \Application\Entity\Inscricao $inscricao
     *
     * @return StatusMaterial
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

    /**
     * Set material
     *
     * @param \Application\Entity\Material $material
     *
     * @return StatusMaterial
     */
    public function setMaterial(\Application\Entity\Material $material = null)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return \Application\Entity\Material
     */
    public function getMaterial()
    {
        return $this->material;
    }
}
