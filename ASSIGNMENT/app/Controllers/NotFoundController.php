<?php

namespace App\Controllers;

class NotFoundController extends BaseController
{
    public function index()
    {
        return $this->render('not_found.index');
    }
}
