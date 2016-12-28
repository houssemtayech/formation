<?php

namespace Formation\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FormationAppBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
