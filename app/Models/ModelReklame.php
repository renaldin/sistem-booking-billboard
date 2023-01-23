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
}
