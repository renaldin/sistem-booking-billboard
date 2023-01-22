<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\ModelAdmin;
use App\Models\ModelUser;

class Dashboard extends Controller
{

    private $ModelAdmin;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'         => 'Dashboard',
            'subTitle'      => null,
            'jumlahAdmin'   => $this->ModelAdmin->jumlahAdmin(),
            'jumlahUser'    => $this->ModelUser->jumlahUser(),
        ];
        return view('admin.dashboard', $data);
    }
}
