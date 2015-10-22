<?php

namespace Umg\VotacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Umg\VotacionBundle\Entity\Evaluacion;
use Umg\VotacionBundle\Entity\Respuestum;
use Umg\VotacionBundle\Entity\Opcion;
use Umg\VotacionBundle\Entity\Catedratico;
use Ob\HighchartsBundle\Highcharts\Highchart;


class RcatedraticoController extends Controller
{
    /**
     * @Route("/lista")
     * @Template()
     */
    public function listaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usr= $this->get('security.context')->getToken()->getUser();
        $catedratico = $em->getRepository('UmgVotacionBundle:Catedratico')->findOneByUsuario($usr);
        $carreras = $em->getRepository('UmgVotacionBundle:CampusCarrera')->findByCatedratico($catedratico);
        /*$cc = $em->getRepository('UmgVotacionBundle:CarreraCurso')->findOneByCampusCarrera($carrera);
        $lstCatedraticos = $em->getRepository('UmgVotacionBundle:CarreraCurso')->findCatedraticosCarrera($carrera);*/
        
        return array(
            'carreras'   => $carreras,
                // ...
        );    
    }

    /**
     * @Route("/{id}/catedraticos")
     * @Template()
     */
    public function catedraticosAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $carrera = $em->getRepository('UmgVotacionBundle:CampusCarrera')->find($id);
        $lstCatedraticos = $em->getRepository('UmgVotacionBundle:CarreraCurso')->findCatedraticosCarrera($carrera);

        return array(
            'carrera' => $carrera,
            'lstCat'  => $lstCatedraticos,
        );
    }

    /**
     * @Route("/{cid}ver/{caid}")
     * @Template()
     */
    public function verAction($cid,$caid)
    {
        $em = $this->getDoctrine()->getManager();
        $carrera = $em->getRepository('UmgVotacionBundle:CampusCarrera')->find($caid);
        $catedratico = $em->getRepository('UmgVotacionBundle:Catedratico')->find($cid);
        $cursos = $em->getRepository('UmgVotacionBundle:CarreraCurso')->findCursos($carrera, $catedratico);
        $promedio = $em->getRepository('UmgVotacionBundle:CampusCarrera')->findPunteoCatedraticoCarrera( $catedratico , $carrera);
        $datos = array();
        foreach($promedio as $prom)
            $datos[] = floatval($prom['calificacion']);

        $series = array(
            array("name" => "Data Serie Name",    "data" => $datos)
        );

        $ob = new Highchart();
        $ob->chart->renderTo('linechart');  // The #id of the div where to render the chart
        $ob->title->text('Chart Title');
        $ob->xAxis->title(array('text'  => "Promedios"));
        $ob->yAxis->title(array('text'  => "Evaluaciones"));
        $ob->series($series);

        return array(
            'chart' => $ob,
            'catedratico' => $catedratico,
            'cursos' => $cursos,
                // ...
            );    }

    /**
     * @Route("/observacion")
     * @Template()
     */
    public function observacionAction()
    {
        return array(
                // ...
            );    }

}
