<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\ModelAdmin;
use App\Models\ModelUser;
use App\Models\ModelOrder;

class Dashboard extends Controller
{

    private $ModelAdmin;
    private $ModelUser;
    private $ModelOrder;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'                 => null,
            'subTitle'              => 'Dashboard',
            'jumlahAdmin'           => $this->ModelAdmin->jumlahAdmin(),
            'jumlahUser'            => $this->ModelUser->jumlahUser(),
            'jumlahOrder'           => $this->ModelOrder->jumlahOrder(),
            'jumlahTungguHarga'     => $this->ModelOrder->jumlahTungguHarga(),
        ];
        return view('admin.dashboard', $data);
    }
}
