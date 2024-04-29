<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/LAPORAN');
    }
}
