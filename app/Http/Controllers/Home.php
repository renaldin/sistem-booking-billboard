<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\ModelReklame;
use App\Models\ModelPartner;

class Home extends Controller
{

    private $ModelReklame;
    private $ModelPartner;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelPartner = new ModelPartner();
    }

    public function index()
    {
        $data = [
            'title'     => 'Home',
            'reklame'   => $this->ModelReklame->dataReklameLimit(4),
            'partner'   => $this->ModelPartner->dataPartner(4),
        ];
        return view('user.home', $data);
    }
}
