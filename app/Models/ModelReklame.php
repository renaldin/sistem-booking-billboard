<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelReklame extends Model
{
    use HasFactory;

    public function dataReklame()
    {
        return DB::table('reklame')->orderBy('id_reklame', 'DESC')->get();
    }

    public function dataReklameStatus($status)
    {
        return DB::table('reklame')->where('status', $status)->orderBy('id_reklame', 'DESC')->get();
    }

    public function dataReklameDuaStatus($statusSatu, $statusDua)
    {
        return DB::table('reklame')
            ->where('status', $statusSatu)
            ->orWhere('status', $statusDua)
            ->orderBy('id_reklame', 'DESC')
            ->get();
    }

    public function cariReklame($keyword)
    {
        return DB::table('reklame')
            ->orWhere('lokasi', 'like', "%" . $keyword . "%")
            ->orWhere('ukuran', 'like', "%" . $keyword . "%")
            ->orWhere('alamat', 'like', "%" . $keyword . "%")
            ->get();
    }

    public function detail($id_reklame)
    {
        return DB::table('reklame')->where('id_reklame', $id_reklame)->first();
    }

    public function tambah($data)
    {
        DB::table('reklame')->insert($data);
    }

    public function edit($data)
    {
        DB::table('reklame')->where('id_reklame', $data['id_reklame'])->update($data);
    }

    public function hapus($id_reklame)
    {
        DB::table('reklame')->where('id_reklame', $id_reklame)->delete();
    }

    public function jumlahReklame()
    {
        return DB::table('reklame')->count();
    }

    public function totalReklame($statusSatu, $statusDua)
    {
        return DB::table('reklame')->where('status', $statusSatu)->orWhere('status', $statusDua)->count();
    }

    public function dataReklameLimit($limit, $status, $orderBy = 'ASC')
    {
        return DB::table('reklame')->where('status', $status)->orderBy('id_reklame', $orderBy)->limit($limit)->get();
    }

    public function reklameLimit($limit, $orderBy = 'ASC')
    {
        return DB::table('reklame')->orderBy('id_reklame', $orderBy)->limit($limit)->get();
    }

    // gambar
    public function tambahGambar($data)
    {
        DB::table('gambar_reklame')->insert($data);
    }

    public function editGambar($data)
    {
        DB::table('gambar_reklame')->where('id_reklame', $data['id_reklame'])->update($data);
    }

    public function hapusGambar($id_reklame)
    {
        DB::table('gambar_reklame')->where('id_reklame', $id_reklame)->delete();
    }

    public function detailGambar($id_reklame)
    {
        return DB::table('gambar_reklame')->where('id_reklame', $id_reklame)->get();
    }

    public function idReklame()
    {
        return DB::table('reklame')->orderBy('id_reklame', 'DESC')->limit(1)->first();
    }
}
