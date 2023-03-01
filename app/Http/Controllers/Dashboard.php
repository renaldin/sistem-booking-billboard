<?php

namespace App\Http\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelUser;
use App\Models\ModelOrder;
use App\Models\ModelBiodataWeb;

class Dashboard extends Controller
{

    private $ModelAdmin;
    private $ModelUser;
    private $ModelOrder;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'                 => null,
            'subTitle'              => 'Dashboard',
            'biodata'               => $this->ModelBiodataWeb->detail(1),
            'jumlahAdmin'           => $this->ModelAdmin->jumlahAdmin(),
            'jumlahUser'            => $this->ModelUser->jumlahUser(),
            'jumlahOrder'           => $this->ModelOrder->jumlahOrder(),
            'jumlahTungguHarga'     => $this->ModelOrder->jumlahTungguHarga(),
        ];
        return view('admin.dashboard', $data);
    }
}
