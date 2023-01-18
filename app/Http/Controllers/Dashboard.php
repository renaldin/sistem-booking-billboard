<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {

        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin.dashboard', $data);
    }
}
