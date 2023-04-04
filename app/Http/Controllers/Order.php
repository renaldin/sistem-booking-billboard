<?php

namespace App\Http\Controllers;

use App\Models\ModelOrder;
use App\Models\ModelReklame;
use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;

class Order extends Controller
{

    private $ModelOrder;
    private $ModelReklame;
    private $ModelUser;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
        $this->ModelReklame = new ModelReklame();
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        // Data Cetak
        $member = $this->ModelOrder->ambilDataOrder('order.id_member', 'user.nama')->toArray();
        $dataMember = array_values(array_map("unserialize", array_unique(array_map("serialize", $member))));

        $reklame = $this->ModelOrder->ambilDataOrder('order.id_reklame', 'reklame.lokasi')->toArray();
        $dataReklame = array_values(array_map("unserialize", array_unique(array_map("serialize", $reklame))));

        $tanggal = $this->ModelOrder->ambilDataOrder('order.tanggal', 'order.tanggal')->toArray();
        $dataTanggal = array_values(array_map("unserialize", array_unique(array_map("serialize", $tanggal))));

        $data = [
            'title'             => 'Data Order',
            'subTitle'          => 'Kelola Order',
            'biodata'           => $this->ModelBiodataWeb->detail(1),
            'jumlahTungguHarga' => $this->ModelOrder->jumlahTungguHarga(),
            'order'             => $this->ModelOrder->dataOrder(),
            'dataMember'        => $dataMember,
            'dataReklame'       => $dataReklame,
            'dataTanggal'       => $dataTanggal,
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'biodata'           => $this->ModelBiodataWeb->detail(1),
            'reklame'           => $this->ModelReklame->detail($dataOrder->id_reklame),
            'user'              => $this->ModelUser->detail($dataOrder->id_member)
        ];

        return view('admin.order.detail', $data);
    }

    public function hapus($id_pesanan)
    {
        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        $dataReklame = [
            'id_reklame'    => $dataOrder->id_reklame,
            'status'        => 'Belum Dipesan'
        ];

        $this->ModelReklame->edit($dataReklame);
        $this->ModelOrder->hapus($id_pesanan);
        return redirect()->route('kelola-order')->with('berhasil', 'Anda Berhasil Menghapus Pembayaran ID Pesanan ' . $dataOrder->id_pesanan);
    }
}
