<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelPartner;
use App\Models\ModelUser;
use App\Models\ModelOrder;
use App\Models\ModelFaq;

class Home extends Controller
{

    private $ModelReklame;
    private $ModelPartner;
    private $ModelUser;
    private $ModelOrder;
    private $ModelFaq;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelPartner = new ModelPartner();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
        $this->ModelFaq = new ModelFaq();
    }

    public function index()
    {
        $data = [
            'title'             => 'Home',
            'empatReklame'      => $this->ModelReklame->dataReklameLimit(4, 'Belum Dipesan', 'DESC'),
            'satuReklame'       => $this->ModelReklame->dataReklameLimit(1, 'Belum Dipesan', 'ASC'),
            'reklame'           => $this->ModelReklame->dataReklameDuaStatus('Belum Dipesan', 'Sudah Dibooking'),
            'partner'           => $this->ModelPartner->dataPartner(),
            'faq'               => $this->ModelFaq->dataFaqLimit(6),
            'order'             => $this->ModelOrder->dataOrder(),
            'jumlahPartner'     => $this->ModelPartner->jumlahPartner(),
            'jumlahReklame'     => $this->ModelReklame->jumlahReklame(),
            'jumlahUser'        => $this->ModelUser->jumlahUser(),
            'jumlahOrder'       => $this->ModelOrder->jumlahOrder(),
        ];
        return view('user.home', $data);
    }
}
