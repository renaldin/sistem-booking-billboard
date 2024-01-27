<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelPartner;
use App\Models\ModelUser;
use App\Models\ModelOrder;
use App\Models\ModelFaq;
use App\Models\ModelBiodataWeb;

class Home extends Controller
{

    private $ModelReklame;
    private $ModelPartner;
    private $ModelUser;
    private $ModelOrder;
    private $ModelFaq;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelPartner = new ModelPartner();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
        $this->ModelFaq = new ModelFaq();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        $data = [
            'title'             => 'Home',
            'empatReklame'      => $this->ModelReklame->reklameLimit(4, 'DESC'),
            'satuReklame'       => $this->ModelReklame->reklameLimit(1, 'ASC'),
            'reklame'           => $this->ModelReklame->dataReklameDuaStatus('Belum Dipesan', 'Sudah Dibooking'),
            'partner'           => $this->ModelPartner->dataPartner(),
            'faq'               => $this->ModelFaq->dataFaqLimit(6),
            'order'             => $this->ModelOrder->dataOrder(),
            'jumlahPartner'     => $this->ModelPartner->jumlahPartner(),
            'jumlahReklame'     => $this->ModelReklame->jumlahReklame(),
            'jumlahUser'        => $this->ModelUser->jumlahUser(),
            'biodata'           => $this->ModelBiodataWeb->detail(1),
            'jumlahOrder'       => $this->ModelOrder->jumlahOrder(),
        ];
        return view('user.home', $data);
    }
}
