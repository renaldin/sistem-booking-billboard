<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelOrder extends Model
{
    use HasFactory;

    public function dataOrder()
    {
        return DB::table('order')
            ->join('user', 'user.id_member', '=', 'order.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'order.id_reklame', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get();
    }

    public function dataOrderReklame($id_reklame)
    {
        return DB::table('order')
            ->join('user', 'user.id_member', '=', 'order.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'order.id_reklame', 'left')
            ->where('id_reklame', $id_reklame)
            ->orderBy('id_pesanan', 'DESC')
            ->get();
    }

    public function dataOrderTerakhir()
    {
        return DB::table('order')->orderBy('id_pesanan', 'DESC')->limit(1)->first();
    }

    public function detail($id_pesanan)
    {
        return DB::table('order')
            ->where('id_pesanan', $id_pesanan)
            ->join('user', 'user.id_member', '=', 'order.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'order.id_reklame', 'left')
            ->first();
    }

    public function tambah($data)
    {
        DB::table('order')->insert($data);
    }

    public function edit($data)
    {
        DB::table('order')->where('id_pesanan', $data['id_pesanan'])->update($data);
    }

    public function hapus($id_pesanan)
    {
        DB::table('order')->where('id_pesanan', $id_pesanan)->delete();
    }

    public function jumlahOrder()
    {
        return DB::table('order')->count();
    }
    public function jumlahTungguHarga()
    {
        return DB::table('order')->where('harga', NULL)->count();
    }

    public function jumlahOrderMember($id_member)
    {
        return DB::table('order')->where('id_member', $id_member)->count();
    }

    public function dataBooking($id_member, $status_order = 'Dibooking')
    {
        return DB::table('order')
            ->join('user', 'user.id_member', '=', 'order.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'order.id_reklame', 'left')
            ->orderBy('id_pesanan', 'DESC')
            ->where('order.id_member', $id_member)
            ->Where('order.status_order', $status_order)
            ->get();
    }

    public function dataBookingByMember($id_member)
    {
        return DB::table('order')
            ->join('user', 'user.id_member', '=', 'order.id_member', 'left')
            ->join('reklame', 'reklame.id_reklame', '=', 'order.id_reklame', 'left')
            ->orderBy('id_pesanan', 'DESC')
            ->where('order.id_member', $id_member)
            ->get();
    }
}
