<?php

namespace App\Controllers;

use App\Models\UserModel;
use PDO;

class Gereja extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->has('pengguna')) {
            $gereja = $this->userModel->findAll();
            $data = [
                'List' => $gereja
            ];
            return view('gereja/HOME', $data);
        } else {
            return view('gereja/login');
        }
    }

    public function admin($user)
    {
        if ($user['STATUS'] === 'Admin') {
            $params = ['status' => $user['STATUS']];
            session()->set($params);

            return view('gereja/admin')
                . view('gereja/HOME');
        } else {
            $session = session();
            $session->setFlashdata('error', 'Login gagal. Periksa kembali username dan password Anda.');
            return redirect()->back();
        }
    }

    public function sbr($user)
    {
        if ($user['STATUS'] === 'Sekretaris' || $user['STATUS'] === 'Romo') {
            $params = ['status' => $user['STATUS']];
            session()->set($params);
            return view('gereja/header')
                . view('gereja/HOME');
        } else {
            $session = session();
            $session->setFlashdata('error', 'Login gagal. Periksa kembali username dan password Anda.');
            return redirect()->back();
        }
    }


    public function check()
    {
        $model = new UserModel();
        $usename = $this->request->getVar('usr');
        $password = $this->request->getVar('pwd');

        $user = $model->where('USERNAME', $usename)->first();
        if (!$user) {
            $session = session();
            $session->setFlashData('error', 'Login gagal. Periksa kembali username dan password Anda.');
            return view('Gereja/login');
        }

        if ($user['STATUS'] !== 'Admin') {
            if ($user['STATUS'] !== 'Sekretaris' && $user['STATUS'] !== 'Romo') {
                if ($password == $user['PASSWORD']) {
                    $params = ['status' => $user['STATUS']];
                    session()->set($params);
                    return view('gereja/header')
                        . view('gereja/HOME');
                } else {
                    $session = session();
                    $session->setFlashData('error', 'Login gagal. Periksa kembali username dan password Anda.');
                }
            } else {
                return $this->sbr($user);
            }
        } else {
            return $this->admin($user);
        }
    }

    public function login()
    {
        return view('gereja/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->remove('status');
        return redirect('gereja');
    }
}
