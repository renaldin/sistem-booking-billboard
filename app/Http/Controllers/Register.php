<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Register extends Controller
{
    public function index()
    {
        if (Session()->get('email')) {
            return redirect()->route('home');
        }

        $data = [
            'title' => 'Register'
        ];

        return view('auth.register', $data);
    }

    public function prosesRegister(Request $request)
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'alamat'            => 'required',
            'nama_perusahaan'   => 'required',
            'alamat_perusahaan' => 'required',
            'email'             => 'required|unique:user,email|email',
            'password'          => 'min:6|required',
        ]);

        dd(Request());

        // $data = [
        //     'id'        => $admin_id,
        //     'username'  => Request()->username,
        //     'email'     => Request()->email,
        //     'password'  => Hash::make(Request()->password),
        // ];

        // $this->ModelAuth->register($data);
        // return redirect()->route('register')->with('success', 'Anda berhasil membuat akun !');
    }
}
