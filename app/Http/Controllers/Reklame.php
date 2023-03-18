<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelOrder;
use App\Models\ModelUser;
use App\Models\ModelBiodataWeb;
use GuzzleHttp\Psr7\Request;

class Reklame extends Controller
{

    private $ModelReklame;
    private $ModelOrder;
    private $ModelUser;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelOrder = new ModelOrder();
        $this->ModelUser = new ModelUser();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Reklame',
            'subTitle'  => 'Kelola Reklame',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'form'      => 'Tambah'
        ];

        return view('admin.reklame.form', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'lokasi'                => 'required',
            'ukuran'                => 'required',
            'alamat'                => 'required',
            'orientation_page'      => 'required',
            'penerangan'            => 'required',
            'jarak_pandang'         => 'required',
            'jumlah_sisi'           => 'required',
            'situasi_lalulintas'    => 'required',
            'situasi_sekitar'       => 'required',
            'target_audiens'        => 'required',
            'google_maps'           => 'required',
            'gambar'                => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_reklame'        => 'required',
            'gambar_reklame.*'      => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'lokasi.required'             => 'Lokasi harus diisi!',
            'ukuran.required'             => 'Ukuran harus diisi!',
            'alamat.required'             => 'Alamat Lengkap harus diisi!',
            'orientation_page.required'   => 'Orientation Page harus diisi!',
            'penerangan.required'         => 'Penerangan harus diisi!',
            'jarak_pandang.required'      => 'Jarak Pandang harus diisi!',
            'jumlah_sisi.required'        => 'Jumlah Sisi harus diisi!',
            'situasi_lalulintas.required' => 'Situasi Lalu Lintas harus diisi!',
            'situasi_sekitar.required'    => 'Situasi Sekitar harus diisi!',
            'target_audiens.required'     => 'Target Audiens harus diisi!',
            'google_maps.required'        => 'Google Maps harus diisi!',
            'gambar.required'             => 'Thumbnail harus diisi!',
            'gambar.mimes'                => 'Format Thumbnail harus jpg/jpeg/png/bmp!',
            'gambar.max'                  => 'Ukuran Thumbnail maksimal 5 mb',
            'gambar_reklame.required'       => 'Slide Gambar harus diisi!',
            'gambar_reklame.mimes'          => 'Format Slide Gambar harus jpg/jpeg/png/bmp!',
            'gambar_reklame.max'            => 'Ukuran Slide Gambar maksimal 5 mb',
        ]);

        if (Request()->hasfile('gambar_reklame')) {

            $reklame = $this->ModelReklame->idReklame();
            $i = 0;
            foreach (Request()->gambar_reklame as $item) {
                $file2  = $item;
                $filename2 = date('mdYHis') . Request()->lokasi . $i . '.' . $file2->extension();
                $file2->move(public_path('foto_gambar_reklame'), $filename2);
                $dataGambar = [
                    'id_reklame'        => $reklame->id_reklame + 1,
                    'gambar_reklame'    => $filename2,
                ];
                $this->ModelReklame->tambahGambar($dataGambar);
                $i = $i + 1;
            }

            $file = Request()->gambar;
            $fileName = date('mdYHis') . Request()->lokasi . '.' . $file->extension();
            $file->move(public_path('foto_reklame'), $fileName);

            $data = [
                'lokasi'                => Request()->lokasi,
                'ukuran'                => Request()->ukuran,
                'alamat'                => Request()->alamat,
                'mulai_harga'           => Request()->mulai_harga,
                'sampai_harga'          => Request()->sampai_harga,
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
        } else {
            return back()->with('gagal', 'Input Silde Gambar terjadi kesalahan!');
        }
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'reklame'   => $this->ModelReklame->detail($id_reklame)
        ];

        return view('admin.reklame.form', $data);
    }

    public function prosesEdit($id_reklame)
    {
        Request()->validate([
            'lokasi'                => 'required',
            'ukuran'                => 'required',
            'alamat'                => 'required',
            'orientation_page'      => 'required',
            'penerangan'            => 'required',
            'jarak_pandang'         => 'required',
            'jumlah_sisi'           => 'required',
            'situasi_lalulintas'    => 'required',
            'situasi_sekitar'       => 'required',
            'target_audiens'        => 'required',
            'google_maps'           => 'required',
            'gambar'                => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_reklame.*'      => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'lokasi.required'             => 'Lokasi harus diisi!',
            'ukuran.required'             => 'Ukuran harus diisi!',
            'alamat.required'             => 'Alamat Lengkap harus diisi!',
            'orientation_page.required'   => 'Orientation Page harus diisi!',
            'penerangan.required'         => 'Penerangan harus diisi!',
            'jarak_pandang.required'      => 'Jarak Pandang harus diisi!',
            'jumlah_sisi.required'        => 'Jumlah Sisi harus diisi!',
            'situasi_lalulintas.required' => 'Situasi Lalu Lintas harus diisi!',
            'situasi_sekitar.required'    => 'Situasi Sekitar harus diisi!',
            'target_audiens.required'     => 'Target Audiens harus diisi!',
            'google_maps.required'        => 'Google Maps harus diisi!',
            'gambar.mimes'                => 'Format Thumbnail harus jpg/jpeg/png/bmp!',
            'gambar.max'                  => 'Ukuran Thumbnail maksimal 5 mb',
            'gambar_reklame.mimes'        => 'Format Slide Gambar harus jpg/jpeg/png/bmp!',
            'gambar_reklame.max'          => 'Ukuran Slide Gambar maksimal 5 mb',
        ]);

        if (Request()->gambar_reklame <> "") {

            $gambarReklame = $this->ModelReklame->detailGambar($id_reklame);
            foreach ($gambarReklame as $item) {
                unlink(public_path('foto_gambar_reklame') . '/' . $item->gambar_reklame);
            }

            $this->ModelReklame->hapusGambar($id_reklame);

            $i = 0;
            foreach (Request()->gambar_reklame as $item) {
                $file2  = $item;
                $filename2 = date('mdYHis') . Request()->lokasi . $i . '.' . $file2->extension();
                $file2->move(public_path('foto_gambar_reklame'), $filename2);
                $dataGambar = [
                    'id_reklame'        => $id_reklame,
                    'gambar_reklame'    => $filename2,
                ];
                $this->ModelReklame->tambahGambar($dataGambar);
                $i = $i + 1;
            }

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
                    'alamat'                => Request()->alamat,
                    'mulai_harga'           => Request()->mulai_harga,
                    'sampai_harga'          => Request()->sampai_harga,
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
                    'alamat'                => Request()->alamat,
                    'mulai_harga'           => Request()->mulai_harga,
                    'sampai_harga'          => Request()->sampai_harga,
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
        } else {
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
                    'alamat'                => Request()->alamat,
                    'mulai_harga'           => Request()->mulai_harga,
                    'sampai_harga'          => Request()->sampai_harga,
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
                    'alamat'                => Request()->alamat,
                    'mulai_harga'           => Request()->mulai_harga,
                    'sampai_harga'          => Request()->sampai_harga,
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'reklame'   => $this->ModelReklame->detail($id_reklame),
            'gambarReklame' => $this->ModelReklame->detailGambar($id_reklame),
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


    // User
    public function reklameUser()
    {
        if (Request()->keyword) {
            $data = [
                'title'         => 'Daftar Reklame',
                'jumlahReklame' => $this->ModelReklame->totalReklame('Belum Dipesan', 'Sudah Dibooking'),
                'keyword'       => Request()->keyword,
                'biodata'       => $this->ModelBiodataWeb->detail(1),
                'reklame'       => $this->ModelReklame->cariReklame(Request()->keyword)
            ];
        } else {
            $data = [
                'title'         => 'Daftar Reklame',
                'jumlahReklame' => $this->ModelReklame->totalReklame('Belum Dipesan', 'Sudah Dibooking'),
                'keyword'       => NULL,
                'biodata'       => $this->ModelBiodataWeb->detail(1),
                'reklame'       => $this->ModelReklame->dataReklameDuaStatus('Belum Dipesan', 'Sudah Dibooking')
            ];
        }

        return view('user.reklame.dataReklame', $data);
    }

    public function reklameBookingUser()
    {
        $data = [
            'title'     => 'Daftar Reklame',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
            'reklame'   => $this->ModelReklame->dataReklameStatus('Belum Dipesan')
        ];

        return view('user.reklame.dataBookingReklame', $data);
    }

    public function detailReklameUser($id_reklame)
    {
        $jumlahOrderReklame = $this->ModelOrder->jumlahOrderReklame($id_reklame);
        if ($jumlahOrderReklame !== 0) {
            $totalStar = $this->ModelOrder->totalStar($id_reklame);
            $star = number_format($totalStar / $jumlahOrderReklame, 1);
        } else {
            $star = 0;
        }


        $data = [
            'title'         => 'Detail Reklame',
            'star'          => $star,
            'jumlahOrder'   => $jumlahOrderReklame,
            'biodata'       => $this->ModelBiodataWeb->detail(1),
            'order'         => $this->ModelOrder->detailReklame($id_reklame, 3),
            'reklame'       => $this->ModelReklame->detail($id_reklame),
            'gambarReklame' => $this->ModelReklame->detailGambar($id_reklame),
        ];

        return view('user.reklame.detail', $data);
    }

    public function review($id_reklame)
    {
        $jumlahOrderReklame = $this->ModelOrder->jumlahOrderReklame($id_reklame);
        if ($jumlahOrderReklame !== 0) {
            $totalStar = $this->ModelOrder->totalStar($id_reklame);
            $star = number_format($totalStar / $jumlahOrderReklame, 1);
        } else {
            $star = 0;
        }


        $data = [
            'title'         => 'Review Reklame',
            'star'          => $star,
            'jumlahOrder'   => $jumlahOrderReklame,
            'order'         => $this->ModelOrder->detailReklame($id_reklame),
            'biodata'       => $this->ModelBiodataWeb->detail(1),
            'reklame'       => $this->ModelReklame->detail($id_reklame),
        ];

        return view('user.reklame.review', $data);
    }
}
