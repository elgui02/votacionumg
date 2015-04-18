<?php

namespace Umg\VotacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\VotacionBundle\Entity\Evaluacion;
use Umg\VotacionBundle\Entity\Alumno;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usr= $this->get('security.context')->getToken()->getUser();
        $evaluacion = $em->getRepository('UmgVotacionBundle:Alumno')->findEvaluaciones($usr->getId());
        
        return $this->render('UmgVotacionBundle:Default:index.html.twig', array(
            'eva' => count($evaluacion),
            'evaluaciones' => $evaluacion,
        ));
    }

    public function verAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evaluacion = $em->getRepository('UmgVotacionBundle:Evaluacion')->find($id);
        $usr= $this->get('security.context')->getToken()->getUser();
        $cc = $em->getRepository('UmgVotacionBundle:Alumno')->findRespuestasCurso($id,$usr->getId());
        $cnc = $em->getRepository('UmgVotacionBundle:Alumno')->findCursosNoCalificados($id,$usr->getId());

        return $this->render('UmgVotacionBundle:Default:ver.html.twig', array(
            'evaluacion' => $evaluacion,
            'cc' => $cc,
            'cnc' => $cnc,
        ));
    }
}
