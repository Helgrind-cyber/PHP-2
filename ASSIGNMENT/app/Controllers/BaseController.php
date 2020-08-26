<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class BaseController
{
    protected function render($view, $arrData = [])
    {
        $blade = new Blade('./app/Views', 'cache');
        echo $blade->make($view, $arrData)->render();
    }
}
