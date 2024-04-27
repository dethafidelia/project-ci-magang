<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('gereja/header')
            . view('gereja/HOME');
    }
}
