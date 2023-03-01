<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelBiodataWeb extends Model
{
    use HasFactory;

    public function data()
    {
        return DB::table('biodata_web')->orderBy('id_biodata_web', 'DESC')->get();
    }

    public function detail($id_biodata_web)
    {
        return DB::table('biodata_web')->where('id_biodata_web', $id_biodata_web)->first();
    }

    public function edit($data)
    {
        DB::table('biodata_web')->where('id_biodata_web', $data['id_biodata_web'])->update($data);
    }
}
