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
            ->orderBy('id_pesanan', 'DESC')
            ->get();
    }

    public function dataOrderTerakhir()
    {
        return DB::table('order')->orderBy('id_pesanan', 'DESC')->limit(1)->first();
    }

    public function detail($id_pesanan)
    {
        return DB::table('order')->where('id_pesanan', $id_pesanan)->first();
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
}
