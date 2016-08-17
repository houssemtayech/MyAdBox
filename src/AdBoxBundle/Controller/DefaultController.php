<?php

namespace AdBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdBoxBundle:Admin:index.html.twig');
    }
    public function loginAction()
    {
       return $this->render('AdBoxBundle:Admin:login.html.twig');

    }
      public function registerAction()
    {
       return $this->render('AdBoxBundle:Admin:register.html.twig');

    }
}
