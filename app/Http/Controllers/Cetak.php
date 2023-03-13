<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use PDF;

class Cetak extends Controller
{

    private $ModelUser;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        if (!Session()->get('email')) {
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
}
