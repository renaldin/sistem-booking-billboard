<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use App\Models\ModelOrder;
use PDF;

class Cetak extends Controller
{

    private $ModelUser;
    private $ModelBiodataWeb;
    private $ModelOrder;
    private $kolom;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $jenisCetak = Request()->post('cetak');
        if ($jenisCetak === 'user') {
            $data = [
                'title'     => 'Rekap User',
                'biodata'   => $this->ModelBiodataWeb->detail(1),
                'user'      => $this->ModelUser->dataUser()
            ];

            $pdf = PDF::loadview('admin/cetak/cetak_user', $data);
            return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
        } else {
            return redirect()->route('kelola-user')->with('gagal', 'Cetak PDF mengalami kesalahan!');
        }
    }

    public function cetakOrder()
    {
        if (!Session()->get('status')) {
            return redirect()->route('admin');
        }

        $cetakOrder = Request()->cetakOrder;

        if ($cetakOrder === 'Member') {
            $data = Request()->post('id_member');
        } elseif ($cetakOrder === 'Reklame') {
            $data = Request()->post('id_reklame');
        } elseif ($cetakOrder === 'Tanggal') {
            $data = Request()->post('tanggal');
        }

        $data = [
            'title'     => 'Rekap Order Berdasarkan ' . $cetakOrder,
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'order'     => $this->ModelOrder->cetakOrder($cetakOrder, $data)
        ];

        $pdf = PDF::loadview('admin/cetak/cetak_order', $data);
        return $pdf->download($data['title'] . ' ' . date('d F Y') . '.pdf');
    }

    public function ambilDataOrder()
    {
        if (Request()->kolom === 'Pelanggan') {
            $kolom = $this->ModelOrder->ambilDataOrder('order.id_member', 'user.nama')->toArray();
            $dataKolom = array_values(array_map("unserialize", array_unique(array_map("serialize", $kolom))));
            $data = [
                'dataKolom' => $dataKolom,
                'type'      => 'id_member'
            ];
        }
        return response()->json($data);
    }
}
