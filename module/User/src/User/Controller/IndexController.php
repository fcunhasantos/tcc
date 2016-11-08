<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Application\Controller\AbstractCrudController;
use Application\Entity\Inscricao;
use Application\Entity\StatusAtividade;
use Application\Entity\StatusMaterial;
use Application\Entity\StatusQuestao;
use Application\Util\Util;
use DOMPDFModule\View\Model\PdfModel;
use User\Form\AvaliacaoForm;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractCrudController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function inscricoesAction()
    {
        $usuario = $this->getEntityManager()->getRepository('Application\Entity\Usuario')->find($this->identity()->getId());
        $cursos = $this->getEntityManager()->getRepository('Application\Entity\Curso')->findAll();
        $inscricoes = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')
            ->findBy(array('usuario' => $usuario->getId()));
        $cursosInscritos = array();
        foreach ($inscricoes as $inscricao) {
            $cursosInscritos[] = $inscricao->getCurso()->getId();
        }
        return array(
            'usuario' => $usuario->toArray(),
            'cursos' => Util::arrayObjectsToArray($cursos),
            'inscricoes' => $cursosInscritos
        );
        //return new ViewModel();
    }

    public function inscricaoAction()
    {
        $usuarioId = $this->params()->fromRoute('usuario');
        $cursoId = $this->params()->fromRoute('curso');
        $usuario = $this->getEntityManager()->getRepository('Application\Entity\Usuario')->find($usuarioId);
        $curso = $this->getEntityManager()->getRepository('Application\Entity\Curso')->find($cursoId);
        $unidades = $this->getEntityManager()->getRepository('Application\Entity\Unidade')
            ->findBy(array('curso' => $curso->getId()));
        $videos = $this->getEntityManager()->getRepository('Application\Entity\Video')
            ->findBy(array('curso' => $curso->getId()));
        $atividades = $this->getEntityManager()->getRepository('Application\Entity\Atividade')
            ->findBy(array('curso' => $curso->getId()));
        $materiais = $this->getEntityManager()->getRepository('Application\Entity\Material')
            ->findBy(array('curso' => $curso->getId()));
        return array(
            'usuario' => $usuario->toArray(),
            'curso' => $curso->toArray(),
            'unidades' => Util::arrayObjectsToArray($unidades),
            'videos' => Util::arrayObjectsToArray($videos),
            'atividades' => Util::arrayObjectsToArray($atividades),
            'materiais' => Util::arrayObjectsToArray($materiais)
        );
        //return new ViewModel();
    }

    public function inscreverAction()
    {
        $usuarioId = $this->params()->fromRoute('usuario');
        $cursoId = $this->params()->fromRoute('curso');
        $inscricoes = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')
            ->findBy(array('curso'=>$cursoId, 'usuario'=>$usuarioId));
        if (empty($inscricoes)) {
            $inscricao = new Inscricao();
            $inscricao->setCurso($this->getEntityManager()->getRepository('Application\Entity\Curso')->find($cursoId));
            $inscricao->setUsuario($this->getEntityManager()->getRepository('Application\Entity\Usuario')->find($usuarioId));
            $this->getEntityManager()->persist($inscricao);
            $this->getEntityManager()->flush();
            $this->redirect()->toRoute('meuscursos');
        } else {
            $this->redirect()->toRoute('inscricao');
        }
    }

    public function meuscursosAction()
    {
        $usuario = $this->getEntityManager()->getRepository('Application\Entity\Usuario')->find($this->identity()->getId());
        $inscricoes = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')
            ->findBy(array('usuario'=>$usuario->getId()));
        return array(
            'inscricoes' => Util::arrayObjectsToArray($inscricoes)
        );
        //return new ViewModel();
    }

    public function meucursoAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        $unidades = $this->getEntityManager()->getRepository('Application\Entity\Unidade')
            ->findBy(array('curso' => $inscricao->getCurso()->getId()));
        $videos = $this->getEntityManager()->getRepository('Application\Entity\Video')
            ->findBy(array('curso' => $inscricao->getCurso()->getId()));
        $atividades = $this->getEntityManager()->getRepository('Application\Entity\Atividade')
            ->findBy(array('curso' => $inscricao->getCurso()->getId()));
        $materiais = $this->getEntityManager()->getRepository('Application\Entity\Material')
            ->findBy(array('curso' => $inscricao->getCurso()->getId()));
        return array(
            'inscricao' => $inscricao->toArray(),
            'unidades' => Util::arrayObjectsToArray($unidades),
            'videos' => Util::arrayObjectsToArray($videos),
            'atividades' => Util::arrayObjectsToArray($atividades),
            'materiais' => Util::arrayObjectsToArray($materiais)
        );
        //return new ViewModel();
    }

    /*public function avaliacaoAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        return array(
            'inscricao' => $inscricao->toArray()
        );
        //return new ViewModel();
    }*/
    public function avaliacaoAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        $form = new AvaliacaoForm($this->getEntityManager());
        $basePath = $this->getRequest()->getRequestUri();
        $form->setAttribute('action',$basePath);
        $form->setAttribute('inscricao',$inscricao);
        $form->setLabel('Avaliar Curso');
        if ($this->getRequest()->isPost()) {
            $form->setData(
                array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(),
                    $this->getRequest()->getFiles()->toArray()
                )
            );
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setInscricao($inscricao);
                $this->getEntityManager()->persist($data);
                $this->getEntityManager()->flush();
                $this->redirect()->toRoute('meucurso',array('inscricao' => $inscricaoId));
            }
        }
        $form->prepare();
        return array(
            'form' => $form
        );
    }

    public function avaliarAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        return array(
            'inscricao' => $inscricao->toArray()
        );
        //return new ViewModel();
    }

    public function minhaatividadeAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $atividadeId = $this->params()->fromRoute('atividade');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        $atividade = $this->getEntityManager()->getRepository('Application\Entity\Atividade')->find($atividadeId);
        // Transforma a atividade em array e preenche o array com um array de questões, e cada questão com um array de respostas
        $arrayAtividade = $atividade->toArray();
        $arrayAtividade['questoes'] = array();
        $questoes = $this->getEntityManager()->getRepository('Application\Entity\Questao')
            ->findBy(array('atividade' => $atividade->getId()));
        foreach ($questoes as $questao) {
            $arrayQuestao = $questao->toArray();
            $arrayQuestao['respostas'] = array();
            $respostas = $this->getEntityManager()->getRepository('Application\Entity\Resposta')
                ->findBy(array('questao' => $questao->getId()));
            foreach ($respostas as $resposta) {
                $arrayQuestao['respostas'][$resposta->getId()] = $resposta->toArray();
            }
            $arrayAtividade['questoes'][$questao->getId()] = $arrayQuestao;
        }
        //@todo Carregar status das questões

        if ($this->getRequest()->isPost()) {
            //var_dump($this->getRequest()->getPost()->toArray());die;
            $statusAtividade = $this->getEntityManager()->getRepository('Application\Entity\StatusAtividade')
                ->findOneBy(array('inscricao' => $inscricaoId, 'atividade' => $atividadeId));
            //var_dump($statusAtividade->getId());die;
            if (!is_object($statusAtividade)) {
                $statusAtividade = new StatusAtividade();
                $statusAtividade->setInscricao($inscricao);
                $statusAtividade->setAtividade($atividade);
                $statusAtividade->setPercentual(0);
                $this->getEntityManager()->persist($statusAtividade);
                $this->getEntityManager()->flush();
            }

            foreach ($this->getRequest()->getPost()->toArray() as $questao => $resposta) {
                //var_dump($questao);die;
                $statusQuestao = $this->getEntityManager()->getRepository('Application\Entity\StatusQuestao')
                    ->findOneBy(array('statusAtividade' => $statusAtividade->getId(), 'questao' => $questao));
                //var_dump($statusQuestao->getId());die;
                if (!is_object($statusQuestao)) {
                    $statusQuestao = new StatusQuestao();
                    $statusQuestao->setStatusAtividade($statusAtividade);
                    $statusQuestao->setQuestao($this->getEntityManager()->getRepository('Application\Entity\Questao')->find($questao));
                    $statusQuestao->setResposta($resposta);
                }
                $statusQuestao->setResposta($resposta);
                $this->getEntityManager()->persist($statusQuestao);
                $this->getEntityManager()->flush();
            }

            //Atualiza percentual da atividade
            $nrquestoes = count($questoes);
            $nrrespondidas = count($this->getRequest()->getPost()->toArray());
            $statusAtividade->setPercentual($nrrespondidas/$nrquestoes*100);
            $this->getEntityManager()->persist($statusAtividade);
            $this->getEntityManager()->flush();

            //Redireciona para curso atual
            $this->redirect()->toRoute("meucurso", array('inscricao'=>$inscricaoId));
        }
        //$form->prepare();
        return array(
            'atividade' => $arrayAtividade,
        );
    }

    public function meumaterialAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $materialId = $this->params()->fromRoute('material');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);
        $material = $this->getEntityManager()->getRepository('Application\Entity\Material')->find($materialId);

        //@todo Carregar status do material
        //@todo Get file mime type to show video

        $file = $material->getArquivo();

        if (strpos(mime_content_type($file),'video') !== false) {
            //show video
            $materialArray = $material->toArray();
            $materialArray['type'] = mime_content_type($file);
            return array(
                'material' => $materialArray,
            );
        } else {
            //download file
            $nameToSave = $inscricao->getCurso()->getTitulo() . '_' . $material->getNome() . '.' . pathinfo($file, PATHINFO_EXTENSION);
            $response = new \Zend\Http\Response\Stream();
            $response->setStream(fopen($file, 'r'));
            $response->setStatusCode(200);
            //$response->setStreamName(basename($file));
            $response->setStreamName($nameToSave);
            $headers = new \Zend\Http\Headers();
            $headers->addHeaders(array(
                //'Content-Disposition' => 'attachment; filename="' . basename($file) .'"',
                'Content-Disposition' => 'attachment; filename="' . $nameToSave . '"',
                'Content-Type' => 'application/octet-stream',
                'Content-Length' => filesize($file),
                'Expires' => '@0', // @0, because zf2 parses date as string to \DateTime() object
                'Cache-Control' => 'must-revalidate',
                'Pragma' => 'public'
            ));
            $response->setHeaders($headers);
            return $response;
        }

        /*if ($this->getRequest()->isPost()) {
            $statusMaterial = $this->getEntityManager()->getRepository('Application\Entity\StatusMaterial')
                ->findOneBy(array('inscricao' => $inscricaoId, 'material' => $materialId));
            if (!is_object($statusMaterial)) {
                $statusMaterial = new StatusMaterial();
                $statusMaterial->setInscricao($inscricao);
                $statusMaterial->setMaterial($material);
            }
            //Atualiza percentual do material
            $statusMaterial->setPercentual(100);
            $this->getEntityManager()->persist($statusMaterial);
            $this->getEntityManager()->flush();

            //Redireciona para curso atual
            $this->redirect()->toRoute("meucurso", array('inscricao'=>$inscricaoId));
        }
        return array(
            'material' => $material->toArray(),
        );*/
    }

    public function certificadosAction()
    {
        $usuario = $this->getEntityManager()->getRepository('Application\Entity\Usuario')->find($this->identity()->getId());
        $inscricoes = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')
            ->findBy(array('usuario'=>$usuario->getId()));
        return array(
            'inscricoes' => Util::arrayObjectsToArray($inscricoes)
        );
        //return new ViewModel();
    }

    public function meucertificadoAction()
    {
        $inscricaoId = $this->params()->fromRoute('inscricao');
        $inscricao = $this->getEntityManager()->getRepository('Application\Entity\Inscricao')->find($inscricaoId);

        // Instantiate new PDF Model
        $pdf = new PdfModel();

        // set filename
        $pdf->setOption('filename', 'certificado.pdf');

        // Defaults to "8x11"
        $pdf->setOption('paperSize', 'a4');

        // paper orientation
        $pdf->setOption('paperOrientation', 'landscape');

        $pdf->setVariables(array(
            'inscricao' => $inscricao->toArray(),
            'tituloCurso' =>$inscricao->getCurso()->getTitulo(),
            'usuarioNome' =>$inscricao->getUsuario()->getNome(),
            'instrutorNome' =>$inscricao->getCurso()->getInstrutor()->getNome(),
        ));

        return $pdf;
    }
}
