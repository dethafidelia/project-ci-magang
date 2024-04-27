<?php

namespace App\Controllers;

class tambahDPPH extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/formDPPH');
    }
}
