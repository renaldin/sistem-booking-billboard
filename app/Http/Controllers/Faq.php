<?php

namespace App\Http\Controllers;

use App\Models\ModelFaq;

class Faq extends Controller
{

    private $ModelFaq;

    public function __construct()
    {
        $this->ModelFaq = new ModelFaq();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data FAQ',
            'subTitle'  => 'Kelola FAQ',
            'faq'       => $this->ModelFaq->dataFaq()
        ];

        return view('admin.faq.dataFaq', $data);
    }

    public function tambah()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data FAQ',
            'subTitle'  => 'Tambah FAQ',
            'form'      => 'Tambah'
        ];

        return view('admin.faq.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama'          => 'required',
            'email'         => 'required',
            'pertanyaan'    => 'required',
            'jawaban'       => 'required',
            'tampil'        => 'required',
        ], [
            'nama.required'         => 'Nama harus diisi!',
            'email.required'        => 'Email harus diisi!',
            'pertanyaan.required'   => 'Pertanyaan harus diisi!',
            'jawaban.required'      => 'Jawaban harus diisi!',
            'tampil.required'       => 'Tampil harus diisi!',
        ]);

        $data = [
            'nama'          => Request()->nama,
            'email'         => Request()->email,
            'pertanyaan'    => Request()->pertanyaan,
            'jawaban'       => Request()->jawaban,
            'tampil'        => Request()->tampil,
        ];

        $this->ModelFaq->tambah($data);
        return redirect()->route('kelola-faq')->with('berhasil', 'Data Berhasil Ditambahkan !');
    }

    public function edit($id_faq)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data FAQ',
            'subTitle'  => 'Edit FAQ',
            'form'      => 'Edit',
            'faq'       => $this->ModelFaq->detail($id_faq)
        ];

        return view('admin.faq.form', $data);
    }

    public function prosesEdit($id_faq)
    {
        Request()->validate([
            'nama'          => 'required',
            'email'         => 'required',
            'pertanyaan'    => 'required',
            'tampil'       => 'required',
        ], [
            'nama.required'         => 'Nama harus diisi!',
            'email.required'        => 'Email harus diisi!',
            'pertanyaan.required'   => 'Pertanyaan harus diisi!',
            'tampil.required'       => 'Tampil harus diisi!',
        ]);

        $data = [
            'id_faq'        => $id_faq,
            'nama'          => Request()->nama,
            'email'         => Request()->email,
            'pertanyaan'    => Request()->pertanyaan,
            'jawaban'       => Request()->jawaban,
            'tampil'        => Request()->tampil,
        ];

        $this->ModelFaq->edit($data);
        return redirect()->route('kelola-faq')->with('berhasil', 'Data Berhasil Diedit !');
    }

    public function detail($id_faq)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data FAQ',
            'subTitle'  => 'Detail FAQ',
            'form'      => 'Detail',
            'faq'       => $this->ModelFaq->detail($id_faq)
        ];

        return view('admin.faq.form', $data);
    }

    public function hapus($id_faq)
    {
        $this->ModelFaq->hapus($id_faq);
        return redirect()->route('kelola-faq')->with('berhasil', 'Data Berhasil Dihapus !');
    }

    public function tambahFaqUser()
    {
        Request()->validate([
            'nama'          => 'required',
            'email'         => 'required|email',
            'pertanyaan'    => 'required',
        ], [
            'nama.required'         => 'Nama harus diisi!',
            'email.required'        => 'Email harus diisi!',
            'pertanyaan.required'   => 'Pertanyaan harus diisi!',
        ]);

        $data = [
            'nama'          => Request()->nama,
            'email'         => Request()->email,
            'pertanyaan'    => Request()->pertanyaan,
        ];

        $this->ModelFaq->tambah($data);
        return redirect()->route('home')->with('berhasil', 'Anda Berhasil Mengirim Pertanyaan !');
    }

    public function faqUser()
    {

        $data = [
            'title'     => 'FAQ',
            'faq'       => $this->ModelFaq->dataFaqUser()
        ];

        return view('user.faq.dataFaq', $data);
    }
}
