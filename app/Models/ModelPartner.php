<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelPartner extends Model
{
    use HasFactory;

    public function dataPartner()
    {
        return DB::table('partner')->orderBy('id_partner', 'DESC')->get();
    }

    public function detail($id_partner)
    {
        return DB::table('partner')->where('id_partner', $id_partner)->first();
    }

    public function tambah($data)
    {
        DB::table('partner')->insert($data);
    }

    public function edit($data)
    {
        DB::table('partner')->where('id_partner', $data['id_partner'])->update($data);
    }

    public function hapus($id_partner)
    {
        DB::table('partner')->where('id_partner', $id_partner)->delete();
    }

    public function jumlahPartner()
    {
        return DB::table('partner')->count();
    }
}
