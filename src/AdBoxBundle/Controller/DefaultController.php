<?php

namespace AdBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdBoxBundle:Admin:index.html.twig');
    }
}
