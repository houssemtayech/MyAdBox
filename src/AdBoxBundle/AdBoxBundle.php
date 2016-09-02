<?php

namespace AdBoxBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AdBoxBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
