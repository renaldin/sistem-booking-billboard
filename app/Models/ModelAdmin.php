<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelAdmin extends Model
{
    use HasFactory;

    public function dataAdmin()
    {
        return DB::table('admin')->orderBy('id_admin', 'DESC')->get();
    }

    public function detail($id_admin)
    {
        return DB::table('admin')->where('id_admin', $id_admin)->first();
    }

    public function detailByEmail($email)
    {
        return DB::table('admin')->where('email', $email)->first();
    }

    public function tambah($data)
    {
        DB::table('admin')->insert($data);
    }

    public function edit($data)
    {
        DB::table('admin')->where('id_admin', $data['id_admin'])->update($data);
    }

    public function hapus($id_admin)
    {
        DB::table('admin')->where('id_admin', $id_admin)->delete();
    }

    public function jumlahAdmin()
    {
        return DB::table('admin')->count();
    }
}
