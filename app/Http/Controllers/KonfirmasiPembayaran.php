<?php

namespace App\Http\Controllers;

use App\Models\ModelKonfirmasiPembayaran;
use App\Models\ModelUser;
use App\Models\ModelOrder;
use App\Models\ModelReklame;
use App\Models\ModelBiodataWeb;

class KonfirmasiPembayaran extends Controller
{

    private $ModelKonfirmasiPembayaran;
    private $ModelUser;
    private $ModelOrder;
    private $ModelReklame;
    private $ModelBiodataWeb, $publicPath;

    public function __construct()
    {
        $this->ModelKonfirmasiPembayaran = new ModelKonfirmasiPembayaran();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
        $this->ModelReklame = new ModelReklame();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->publicPath = 'foto_bukti_bayar';
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Konfirmasi Pembayaran',
            'subTitle'  => 'Kelola Konfirmasi Pembayaran',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'order'     => $this->ModelKonfirmasiPembayaran->dataKonfirmasiPembayaran(),
        ];

        return view('admin.konfirmasiPembayaran.dataKonfirmasiPembayaran', $data);
    }

    public function detail($id_konfirmasi_pembayaran)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $detailBayar = $this->ModelKonfirmasiPembayaran->detail($id_konfirmasi_pembayaran);

        $data = [
            'title'     => 'Data Konfirmasi Pembayaran',
            'subTitle'  => 'Detail',
            'pembayaran' => $detailBayar,
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'order'     => $this->ModelOrder->detail($detailBayar->id_pesanan),
            'reklame'   => $this->ModelReklame->detail($detailBayar->id_reklame),
            'user'      => $this->ModelUser->detail($detailBayar->id_member)
        ];

        return view('admin.konfirmasiPembayaran.detail', $data);
    }

    public function editStatus($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        if (Request()->status_order === 'Dibayar') {
            // order
            $dataPesan = [
                'id_pesanan'    => $id_pesanan,
                'status_order'  => 'Dibayar',
            ];

            // reklame
            $dataReklame = [
                'id_reklame'    => $dataOrder->id_reklame,
                'status'        => 'Sudah Dipesan'
            ];
        } elseif (Request()->status_order === 'Approve/Tayang') {
            // order
            $dataPesan = [
                'id_pesanan'    => $id_pesanan,
                'status_order'  => 'Approve/Tayang',
            ];

            // reklame
            $dataReklame = [
                'id_reklame'    => $dataOrder->id_reklame,
                'status'        => 'Sudah Dipesan'
            ];
        } elseif (Request()->status_order === 'Selesai') {
            // order
            $dataPesan = [
                'id_pesanan'    => $id_pesanan,
                'status_order'  => 'Selesai',
            ];

            // reklame
            $dataReklame = [
                'id_reklame'    => $dataOrder->id_reklame,
                'status'        => 'Belum Dipesan'
            ];
        }

        $this->ModelReklame->edit($dataReklame);
        $this->ModelOrder->edit($dataPesan);
        return redirect()->route('konfirmasi-pembayaran')->with('berhasil', 'Anda Berhasil Status ID Pesanan ' . $dataOrder->id_pesanan);
    }

    public function hapus($id_konfirmasi_pembayaran)
    {
        $detailBayar = $this->ModelKonfirmasiPembayaran->detail($id_konfirmasi_pembayaran);
        $dataOrder = $this->ModelOrder->detail($detailBayar->id_pesanan);

        $data = [
            'id_pesanan'    => $dataOrder->id_pesanan,
            'status_order'  => "Batal"
        ];

        $dataReklame = [
            'id_reklame'    => $dataOrder->id_reklame,
            'status'        => 'Belum Dipesan'
        ];

        $this->ModelReklame->edit($dataReklame);
        $this->ModelOrder->edit($data);
        $this->ModelKonfirmasiPembayaran->hapus($id_konfirmasi_pembayaran);
        return redirect()->route('konfirmasi-pembayaran')->with('berhasil', 'Anda Berhasil Menghapus Pembayaran ID Pesanan ' . $dataOrder->id_pesanan);
    }

    public function pembayaran($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        $data = [
            'title'         => 'Konfirmasi Pembayaran',
            'jumlahOrder'   => $this->ModelOrder->jumlahOrderMember(Session()->get('id_member')),
            'user'          => $this->ModelUser->detail($dataOrder->id_member),
            'biodata'       => $this->ModelBiodataWeb->detail(1),
            'id_pesanan'    => $id_pesanan
        ];

        return view('user.pembayaran.pembayaran', $data);
    }

    public function prosesPembayaran($id_pesanan)
    {
        Request()->validate([
            'upload_BT' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'star'      => 'required',
        ], [
            'star.required'         => 'Tolong beri star rating!',
            'upload_BT.required'       => 'Upload Bukti harus diisi!',
            'upload_BT.mimes'          => 'Format Upload Bukti harus jpg/jpeg/png/bmp!',
            'upload_BT.max'            => 'Ukuran Upload Bukti maksimal 5 mb',
        ]);

        $file = Request()->upload_BT;
        $fileName = date('mdYHis') . $id_pesanan . '.' . $file->extension();
        $file->move(public_path($this->publicPath), $fileName);

        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        $data = [
            'id_pesanan'    => $id_pesanan,
            'id_member'     => $dataOrder->id_member,
            'id_reklame'    => $dataOrder->id_reklame,
            'tanggal_bayar' => date('Y-m-d'),
            'upload_BT'     => $fileName,
        ];

        $dataReklame = [
            'id_reklame'    => $dataOrder->id_reklame,
            'status'        => 'Sudah Dipesan'
        ];

        $dataPesan = [
            'id_pesanan'    => $id_pesanan,
            'status_order'  => 'Dibayar',
            'review'        => Request()->review,
            'star'          => Request()->star,
        ];

        $this->ModelOrder->edit($dataPesan);
        $this->ModelReklame->edit($dataReklame);
        $this->ModelKonfirmasiPembayaran->tambah($data);
        return redirect()->route('booking')->with('berhasil', "Anda Berhasil Melakukan Pembayaran Pada ID Pesanan $id_pesanan . Pemesanan Anda Akan Segera Diproses.");
    }
}
