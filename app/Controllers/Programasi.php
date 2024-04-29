<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class Programasi extends BaseController
{
    public function index()
    {
        return view('gereja/header')
            . view('gereja/formAgenda');
    }
}
