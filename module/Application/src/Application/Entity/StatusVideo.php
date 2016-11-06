<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusVideo
 *
 * @ORM\Table(name="status_video", indexes={@ORM\Index(name="fk_status_video_video1_idx", columns={"video_id"}), @ORM\Index(name="fk_status_video_inscricao1_idx", columns={"inscricao_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\StatusVideoRepository")
 */
class StatusVideo
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
     * @ORM\Column(name="percentual", type="float", precision=10, scale=0, nullable=true)
     */
    private $percentual;

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
     * @var \Application\Entity\Video
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     * })
     */
    private $video;


}

