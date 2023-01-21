<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelKelolaAdmin;
use Illuminate\Contracts\Session\Session;

class KelolaAdmin extends Controller
{

    private $ModelKelolaAdmin;

    public function __construct()
    {
        $this->ModelKelolaAdmin = new ModelKelolaAdmin();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Kelola Admin',
            'admin'     => $this->ModelKelolaAdmin->dataAdmin()
        ];

        return view('admin.kelolaAdmin.dataAdmin', $data);
    }
}
