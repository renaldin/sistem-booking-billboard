<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelReklame;
use Illuminate\Contracts\Session\Session;

class Reklame extends Controller
{

    private $ModelReklame;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Reklame',
            'subTitle'  => 'Kelola Reklame',
            'reklame'   => $this->ModelReklame->dataReklame()
        ];

        return view('admin.reklame.dataReklame', $data);
    }

    public function tambah()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Reklame',
            'subTitle'  => 'Tambah Reklame',
            'form'      => 'Tambah'
        ];

        return view('admin.reklame.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'lokasi'                => 'required',
            'ukuran'                => 'required',
            'orientation_page'      => 'required',
            'penerangan'            => 'required',
            'jarak_pandang'         => 'required',
            'jumlah_sisi'           => 'required',
            'situasi_lalulintas'    => 'required',
            'situasi_sekitar'       => 'required',
            'target_audiens'        => 'required',
            'google_maps'           => 'required',
            'gambar'                => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'lokasi.required'             => 'Lokasi harus diisi!',
            'ukuran.required'             => 'Ukuran harus diisi!',
            'orientation_page.required'   => 'Orientation Page harus diisi!',
            'penerangan.required'         => 'Penerangan harus diisi!',
            'jarak_pandang.required'      => 'Jarak Pandang harus diisi!',
            'jumlah_sisi.required'        => 'Jumlah Sisi harus diisi!',
            'situasi_lalulintas.required' => 'Situasi Lalu Lintas harus diisi!',
            'situasi_sekitar.required'    => 'Situasi Sekitar harus diisi!',
            'target_audiens.required'     => 'Target Audiens harus diisi!',
            'google_maps.required'        => 'Google Maps harus diisi!',
            'gambar.required'             => 'Gambar harus diisi!',
            'gambar.mimes'                => 'Format Gambar harus jpg/jpeg/png/bmp!',
            'gambar.max'                  => 'Ukuran Gambar maksimal 5 mb',
        ]);

        $file = Request()->gambar;
        $fileName = date('mdYHis') . Request()->lokasi . '.' . $file->extension();
        $file->move(public_path('foto_reklame'), $fileName);

        $data = [
            'lokasi'                => Request()->lokasi,
            'ukuran'                => Request()->ukuran,
            'orientation_page'      => Request()->orientation_page,
            'penerangan'            => Request()->penerangan,
            'jarak_pandang'         => Request()->jarak_pandang,
            'jumlah_sisi'           => Request()->jumlah_sisi,
            'situasi_lalulintas'    => Request()->situasi_lalulintas,
            'situasi_sekitar'       => Request()->situasi_sekitar,
            'target_audiens'        => Request()->target_audiens,
            'google_maps'           => Request()->google_maps,
            'gambar'                => $fileName,
        ];

        $this->ModelReklame->tambah($data);
        return redirect()->route('kelola-reklame')->with('berhasil', 'Data Berhasil Ditambahkan !');
    }

    public function edit($id_reklame)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Reklame',
            'subTitle'  => 'Edit Reklame',
            'form'      => 'Edit',
            'reklame'   => $this->ModelReklame->detail($id_reklame)
        ];

        return view('admin.reklame.form', $data);
    }

    public function prosesEdit($id_reklame)
    {
        Request()->validate([
            'lokasi'                => 'required',
            'ukuran'                => 'required',
            'orientation_page'      => 'required',
            'penerangan'            => 'required',
            'jarak_pandang'         => 'required',
            'jumlah_sisi'           => 'required',
            'situasi_lalulintas'    => 'required',
            'situasi_sekitar'       => 'required',
            'target_audiens'        => 'required',
            'google_maps'           => 'required',
            'gambar'                => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'lokasi.required'             => 'Lokasi harus diisi!',
            'ukuran.required'             => 'Ukuran harus diisi!',
            'orientation_page.required'   => 'Orientation Page harus diisi!',
            'penerangan.required'         => 'Penerangan harus diisi!',
            'jarak_pandang.required'      => 'Jarak Pandang harus diisi!',
            'jumlah_sisi.required'        => 'Jumlah Sisi harus diisi!',
            'situasi_lalulintas.required' => 'Situasi Lalu Lintas harus diisi!',
            'situasi_sekitar.required'    => 'Situasi Sekitar harus diisi!',
            'target_audiens.required'     => 'Target Audiens harus diisi!',
            'google_maps.required'        => 'Google Maps harus diisi!',
            'gambar.mimes'                => 'Format Gambar harus jpg/jpeg/png/bmp!',
            'gambar.max'                  => 'Ukuran Gambar maksimal 5 mb',
        ]);

        if (Request()->gambar <> "") {
            $reklame = $this->ModelReklame->detail($id_reklame);
            if ($reklame->gambar <> "") {
                unlink(public_path('foto_reklame') . '/' . $reklame->gambar);
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . Request()->lokasi . '.' . $file->extension();
            $file->move(public_path('foto_reklame'), $fileName);

            $data = [
                'id_reklame'            => $id_reklame,
                'lokasi'                => Request()->lokasi,
                'ukuran'                => Request()->ukuran,
                'orientation_page'      => Request()->orientation_page,
                'penerangan'            => Request()->penerangan,
                'jarak_pandang'         => Request()->jarak_pandang,
                'jumlah_sisi'           => Request()->jumlah_sisi,
                'situasi_lalulintas'    => Request()->situasi_lalulintas,
                'situasi_sekitar'       => Request()->situasi_sekitar,
                'target_audiens'        => Request()->target_audiens,
                'google_maps'           => Request()->google_maps,
                'gambar'                => $fileName,
            ];
        } else {
            $data = [
                'id_reklame'            => $id_reklame,
                'lokasi'                => Request()->lokasi,
                'ukuran'                => Request()->ukuran,
                'orientation_page'      => Request()->orientation_page,
                'penerangan'            => Request()->penerangan,
                'jarak_pandang'         => Request()->jarak_pandang,
                'jumlah_sisi'           => Request()->jumlah_sisi,
                'situasi_lalulintas'    => Request()->situasi_lalulintas,
                'situasi_sekitar'       => Request()->situasi_sekitar,
                'target_audiens'        => Request()->target_audiens,
                'google_maps'           => Request()->google_maps,
            ];
        }

        $this->ModelReklame->edit($data);
        return redirect()->route('kelola-reklame')->with('berhasil', 'Data Berhasil Diedit !');
    }

    public function detail($id_reklame)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Reklame',
            'subTitle'  => 'Detail Reklame',
            'form'      => 'Detail',
            'reklame'   => $this->ModelReklame->detail($id_reklame)
        ];

        return view('admin.reklame.form', $data);
    }

    public function hapus($id_reklame)
    {
        $reklame = $this->ModelReklame->detail($id_reklame);
        if ($reklame->gambar <> "") {
            unlink(public_path('foto_reklame') . '/' . $reklame->gambar);
        }
        $this->ModelReklame->hapus($id_reklame);
        return redirect()->route('kelola-reklame')->with('berhasil', 'Data Berhasil Dihapus !');
    }
}
