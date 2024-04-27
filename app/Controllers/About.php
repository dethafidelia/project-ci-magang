<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/dropdown')
            . view('gereja/ABOUT');
    }
}
