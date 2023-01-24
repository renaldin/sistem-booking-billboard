<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\ModelReklame;

class Home extends Controller
{

    private $ModelReklame;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
    }

    public function index()
    {
        $data = [
            'title'     => 'Home',
            'reklame'   => $this->ModelReklame->dataReklameLimit(4),
        ];
        return view('user.home', $data);
    }
}
