<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        return view('gereja/admin')
            . view('gereja/formDPPH');
    }
}
