<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKonfirmasiPembayaran extends Model
{
    use HasFactory;

    public function dataKonfirmasiPembayaran()
    {
        return DB::table('konfirmasi_pembayaran')
            ->join('order', 'order.id_pesanan', '=', 'konfirmasi_pembayaran.id_pesanan', 'left')
            ->join('user', 'user.id_member', '=', 'konfirmasi_pembayaran.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'konfirmasi_pembayaran.id_reklame', 'left')
            ->orderBy('id_konfirmasi_pembayaran', 'DESC')
            ->get();
    }

    public function detail($id_konfirmasi_pembayaran)
    {
        return DB::table('konfirmasi_pembayaran')->where('id_konfirmasi_pembayaran', $id_konfirmasi_pembayaran)->first();
    }

    public function tambah($data)
    {
        DB::table('konfirmasi_pembayaran')->insert($data);
    }

    public function edit($data)
    {
        DB::table('konfirmasi_pembayaran')->where('id_konfirmasi_pembayaran', $data['id_konfirmasi_pembayaran'])->update($data);
    }

    public function hapus($id_konfirmasi_pembayaran)
    {
        DB::table('konfirmasi_pembayaran')->where('id_konfirmasi_pembayaran', $id_konfirmasi_pembayaran)->delete();
    }

    public function jumlahKonfirmasiPembayaran()
    {
        return DB::table('konfirmasi_pembayaran')->count();
    }
}
