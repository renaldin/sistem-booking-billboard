<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;

class Login extends Controller
{

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        if (Session()->get('email')) {
            return redirect()->route('home');
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth.login', $data);
    }
}
