<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 05/11/2016
 * Time: 15:41
 */

namespace Application\Controller;


class VideoController extends AbstractCrudController
{
    protected $entity = 'Application\Entity\Video';
    protected $form = 'Application\Form\VideoForm';
    protected $route = 'video';
    protected $title = 'Vídeo';
}