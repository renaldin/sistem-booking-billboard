<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelFaq extends Model
{
    use HasFactory;

    public function dataFaq()
    {
        return DB::table('faq')->orderBy('id_faq', 'DESC')->get();
    }

    public function dataFaqLimit($limit)
    {
        return DB::table('faq')->orderBy('id_faq', 'ASC')->limit($limit)->get();
    }

    public function detail($id_faq)
    {
        return DB::table('faq')->where('id_faq', $id_faq)->first();
    }

    public function tambah($data)
    {
        DB::table('faq')->insert($data);
    }

    public function edit($data)
    {
        DB::table('faq')->where('id_faq', $data['id_faq'])->update($data);
    }

    public function hapus($id_faq)
    {
        DB::table('faq')->where('id_faq', $id_faq)->delete();
    }

    public function jumlahfaq()
    {
        return DB::table('faq')->count();
    }
}
