<?php

namespace App\Controllers;

class HomeSBR extends BaseController
{
    public function index()
    {
        return view('gereja/SBR')
            . view('gereja/HOME');
    }
}
