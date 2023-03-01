<?php

namespace App\Http\Controllers;

use App\Models\ModelPartner;
use App\Models\ModelBiodataWeb;

class Partner extends Controller
{

    private $ModelPartner;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelPartner = new ModelPartner();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Partner',
            'subTitle'  => 'Kelola Partner',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'partner'   => $this->ModelPartner->dataPartner()
        ];

        return view('admin.partner.dataPartner', $data);
    }

    public function tambah()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Partner',
            'subTitle'  => 'Tambah Partner',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'form'      => 'Tambah'
        ];

        return view('admin.partner.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama_partner'          => 'required',
            'gambar'                => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_partner.required' => 'Nama Partner harus diisi!',
            'gambar.required'       => 'Gambar harus diisi!',
            'gambar.mimes'          => 'Format Gambar harus jpg/jpeg/png/bmp!',
            'gambar.max'            => 'Ukuran Gambar maksimal 2 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . Request()->nama_partner . '.' . $file->extension();
        $file->move(public_path('foto_partner'), $fileName);

        $data = [
            'nama_partner'          => Request()->nama_partner,
            'gambar'                => $fileName,
        ];

        $this->ModelPartner->tambah($data);
        return redirect()->route('kelola-partner')->with('berhasil', 'Data Berhasil Ditambahkan !');
    }

    public function edit($id_partner)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Partner',
            'subTitle'  => 'Edit Partner',
            'form'      => 'Edit',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'partner'   => $this->ModelPartner->detail($id_partner)
        ];

        return view('admin.partner.form', $data);
    }

    public function prosesEdit($id_partner)
    {
        Request()->validate([
            'nama_partner'          => 'required',
            'gambar'                => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_partner.required'       => 'Lokasi harus diisi!',
            'gambar.mimes'                => 'Format Gambar harus jpg/jpeg/png/bmp!',
            'gambar.max'                  => 'Ukuran Gambar maksimal 5 mb',
        ]);

        if (Request()->gambar <> "") {
            $partner = $this->ModelPartner->detail($id_partner);
            if ($partner->gambar <> "") {
                unlink(public_path('foto_partner') . '/' . $partner->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . Request()->nama_partner . '.' . $file->extension();
            $file->move(public_path('foto_partner'), $fileName);

            $data = [
                'id_partner'            => $id_partner,
                'gambar'                => $fileName,
            ];
        } else {
            $data = [
                'id_partner'            => $id_partner,
            ];
        }

        $this->ModelPartner->edit($data);
        return redirect()->route('kelola-partner')->with('berhasil', 'Data Berhasil Diedit !');
    }

    public function detail($id_partner)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Partner',
            'subTitle'  => 'Detail Partner',
            'form'      => 'Detail',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'partner'   => $this->ModelPartner->detail($id_partner)
        ];

        return view('admin.partner.form', $data);
    }

    public function hapus($id_partner)
    {
        $partner = $this->ModelPartner->detail($id_partner);
        if ($partner->gambar <> "") {
            unlink(public_path('foto_partner') . '/' . $partner->gambar);
        }
        $this->ModelPartner->hapus($id_partner);
        return redirect()->route('kelola-partner')->with('berhasil', 'Data Berhasil Dihapus !');
    }
}
