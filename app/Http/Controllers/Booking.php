<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelUser;
use App\Models\ModelOrder;
use PDF;

class Booking extends Controller
{

    private $ModelReklame;
    private $ModelUser;
    private $ModelOrder;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Data Booking',
            'jumlahOrder'   => $this->ModelOrder->jumlahOrderMember(Session()->get('id_member')),
            'booking'       => $this->ModelOrder->dataBooking(Session()->get('id_member'), 'Dibooking')
        ];

        return view('user.booking.dataBooking', $data);
    }

    public function prosesBooking($id_reklame)
    {
        Request()->validate([
            'cekin_pasang'      => 'required',
            'cekout_pasang'     => 'required',
        ], [
            'cekin_pasang.required'     => 'Checkin Pasang harus diisi!',
            'cekout_pasang.required'    => 'Checkout Pasang harus diisi!',
        ]);

        $dataReklame = $this->ModelReklame->detail($id_reklame);

        if ($dataReklame->status !== 'Sudah Dibooking') {
            $id_pesanan = 'PO-' . date('Ymdhs');

            if (Request()->tambah_cetak) {
                $tambahCetak = 'Ya';
            } else {
                $tambahCetak = 'Tidak';
            }

            $time_sekarang = time();
            date_default_timezone_set('Asia/Jakarta');
            $jamHarga = date("H:i:s", strtotime("+120 minutes", $time_sekarang));

            $data = [
                'id_pesanan'    => $id_pesanan,
                'id_member'     => Session()->get('id_member'),
                'id_reklame'    => $id_reklame,
                'cekin_pasang'  => Request()->cekin_pasang,
                'cekout_pasang' => Request()->cekout_pasang,
                'tambah_cetak'  => $tambahCetak,
                'tanggal'       => date('Y-m-d'),
                'harga'         => null,
                'jam_harga'     => $jamHarga,
                'status_order'  => 'Dibooking'
            ];

            $dataReklame = [
                'id_reklame'    => $id_reklame,
                'status'        => 'Sudah Dibooking'
            ];

            $this->ModelReklame->edit($dataReklame);
            $this->ModelOrder->tambah($data);
            return redirect()->route('booking')->with('berhasil', 'Anda Berhasil Menambahkan Booking Reklame Billboard !');
        } else {
            return redirect()->route('reklame-booking')->with('gagal', 'Reklame Billboard Sudah Dibooking, Anda Tidak Bisa Booking. Silahkan Pilih Reklame Billboard Belum Dibooking Yang Ada Dihalaman ini!');
        }
    }

    public function detailBooking($id_pesanan)
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Detail Booking',
            'jumlahOrder'   => $this->ModelOrder->jumlahOrderMember(Session()->get('id_member')),
            'booking'       => $this->ModelOrder->detail($id_pesanan)
        ];

        return view('user.booking.detail', $data);
    }

    public function batalBooking($id_pesanan)
    {
        $dataOrder = $this->ModelOrder->detail($id_pesanan);

        $data = [
            'id_pesanan'    => $id_pesanan,
            'status_order'        => "Batal"
        ];

        $dataReklame = [
            'id_reklame'    => $dataOrder->id_reklame,
            'status'        => 'Belum Dipesan'
        ];

        $this->ModelReklame->edit($dataReklame);
        $this->ModelOrder->edit($data);
        return redirect()->route('booking')->with('berhasil', 'Anda Berhasil Membatalkan Booking Reklame Billboard Yang Berlokasi di ' . $dataOrder->lokasi);
    }

    public function riwayatBooking()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'         => 'Riwayat Booking',
            'jumlahOrder'   => $this->ModelOrder->jumlahOrderMember(Session()->get('id_member')),
            'booking'       => $this->ModelOrder->dataBookingByMember(Session()->get('id_member'))
        ];

        return view('user.booking.riwayatBooking', $data);
    }

    public function downloadInvoice($id_pesanan)
    {
        $noInvoice = 'IN-' . date('Ymdhs');
        $tanggalDibuat = date('Y-m-d');
        $tanggalJatuhTempo = date('Y-m-d', strtotime('+7 days', strtotime($tanggalDibuat)));

        $dataOrder = [
            'id_pesanan'        => $id_pesanan,
            'status_invoice'    => 'Sudah'
        ];

        $dataInvoice = [
            'id_pesanan'        => $id_pesanan,
            'no_invoice'        => $noInvoice,
            'tanggal_dibuat'    => $tanggalDibuat,
            'tanggal_tempo'     => $tanggalJatuhTempo
        ];


        $invoice = $this->ModelOrder->detailInvoice($id_pesanan);
        if (!$invoice) {
            $this->ModelOrder->tambahInvoice($dataInvoice);
        }

        $invoice2 = $this->ModelOrder->detailInvoice($id_pesanan);

        $this->ModelOrder->edit($dataOrder);

        $data = [
            'title'     => 'Invoice ' . $id_pesanan,
            'order'     => $this->ModelOrder->detail($id_pesanan),
            'invoice'   => $invoice2
        ];

        $pdf = PDF::loadview('user/booking/cetak_invoice', $data);
        return $pdf->download('invoice-' . $id_pesanan . '.pdf');
    }
}
