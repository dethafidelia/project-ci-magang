<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class MonevSBR extends BaseController
{
    public function index()
    {
        return view('gereja/SBR')
            . view('gereja/dropdown')
            . view('gereja/monevSBR');
    }
}
