<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelPartner;
use App\Models\ModelUser;
use App\Models\ModelOrder;

class Home extends Controller
{

    private $ModelReklame;
    private $ModelPartner;
    private $ModelUser;
    private $ModelOrder;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelPartner = new ModelPartner();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        $data = [
            'title'             => 'Home',
            'reklame'           => $this->ModelReklame->dataReklameLimit(4),
            'partner'           => $this->ModelPartner->dataPartner(4),
            'jumlahPartner'     => $this->ModelPartner->jumlahPartner(),
            'jumlahReklame'     => $this->ModelReklame->jumlahReklame(),
            'jumlahUser'        => $this->ModelUser->jumlahUser(),
            'jumlahOrder'       => $this->ModelOrder->jumlahOrder(),
        ];
        return view('user.home', $data);
    }
}
