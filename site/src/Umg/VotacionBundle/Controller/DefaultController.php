<?php

namespace Umg\VotacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UmgVotacionBundle:Default:index.html.twig', array('name' => $name));
    }
}
