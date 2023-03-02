<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelUser extends Model
{
    use HasFactory;

    public function dataUser()
    {
        return DB::table('user')->orderBy('id_member', 'DESC')->get();
    }

    public function detail($id_member)
    {
        return DB::table('user')->where('id_member', $id_member)->first();
    }

    public function detailByEmail($email)
    {
        return DB::table('user')->where('email', $email)->first();
    }

    public function tambah($data)
    {
        DB::table('user')->insert($data);
    }

    public function edit($data)
    {
        DB::table('user')->where('id_member', $data['id_member'])->update($data);
    }

    public function hapus($id_member)
    {
        DB::table('user')->where('id_member', $id_member)->delete();
    }

    public function jumlahUser()
    {
        return DB::table('user')->count();
    }
}
