<?php

namespace AdBoxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationUserZeusController extends Controller
{
    public function registerAction()
    {
        return $this->container
                    ->get('pugx_multi_user.registration_manager')
                    ->register('AdBoxBundle\Entity\Zeus');
    }
}