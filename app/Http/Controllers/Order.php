<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelOrder;
use App\Models\ModelReklame;
use App\Models\ModelUser;
use Illuminate\Contracts\Session\Session;

class Order extends Controller
{

    private $ModelOrder;
    private $ModelReklame;
    private $ModelUser;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
        $this->ModelReklame = new ModelReklame();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'             => 'Data Order',
            'subTitle'          => 'Kelola Order',
            'jumlahTungguHarga' => $this->ModelOrder->jumlahTungguHarga(),
            'order'             => $this->ModelOrder->dataOrder(),
        ];

        return view('admin.order.dataOrder', $data);
    }

    public function beriHarga($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Order',
            'subTitle'  => 'Beri Harga',
            'form'      => 'Tambah',
            'order'     => $this->ModelOrder->detail($id_pesanan),
        ];

        return view('admin.order.formHarga', $data);
    }

    public function prosesBeriHarga($id_pesanan)
    {
        Request()->validate([
            'harga'          => 'required',
        ], [
            'harga.required'  => 'Harga harus diisi!'
        ]);

        $data = [
            'id_pesanan'    => $id_pesanan,
            'harga'         => Request()->harga
        ];

        $this->ModelOrder->edit($data);
        return redirect()->route('kelola-order')->with('berhasil', "Harga ID Pesanan $id_pesanan Berhasil Diupdate !");
    }

    public function editHarga($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Order',
            'subTitle'  => 'Edit Harga',
            'form'      => 'Edit',
            'order'     => $this->ModelOrder->detail($id_pesanan),
        ];

        return view('admin.order.formHarga', $data);
    }

    public function detail($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        $data = [
            'title'             => 'Data Order',
            'subTitle'          => 'Detail Order',
            'order'             => $dataOrder,
            'reklame'           => $this->ModelReklame->detail($dataOrder->id_reklame),
            'user'              => $this->ModelUser->detail($dataOrder->id_member)
        ];

        return view('admin.order.detail', $data);
    }
}
