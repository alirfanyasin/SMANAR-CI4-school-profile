<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\PPDB\SiswaBaruModel;
use DateTime;

class PPDB extends BaseController
{
  public function __construct()
  {
    $this->SiswaBaruModel = new SiswaBaruModel();
  }
  public function pendaftaran()
  {
    $data = [
      'title' => 'SMANAR - Pendaftaran'
    ];

    return view('layout_front/ppdb/pendaftaran', $data);
  }
  public function formulir_pendaftaran()
  {
    $data = [
      'title' => 'SMANAR - Formulir Pendaftaran',
    ];

    return view('layout_front/ppdb/formulir_pendaftaran', $data);
  }







  // ==================================================================================
  //                F O R M U L I R      P E N D A F T A R A N
  // ==================================================================================

  public function simpan_biodata()
  {
    if ($this->request->isAJAX()) {

      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'nama_lengkap' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'foto_siswa' => [
          'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,2048]|mime_in[foto_siswa,image/jpg,image/png,image/jpeg]',
          'errors' => [
            'uploaded' => 'Wajib upload image',
            'max_size' => 'Ukuran file tidak boleh lebih 2 Mb',
            'mime_in' => 'Pilih file jpg/png/jpeg'
          ]
        ],
        'nik' => [
          'rules' => 'required|min_length[16]|max_length[16]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 16 karakter',
            'max_length' => 'Maksimal 16 karakter'
          ]
        ],
        'tempat_lahir' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'tanggal_lahir' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Pilih tanggal'
          ]
        ],
        'jenis_kelamin' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di pilih'
          ]
        ],
        'agama' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di pilih'
          ]
        ],
        'nis' => [
          'rules' => 'required|min_length[4]|max_length[4]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 4 karakter',
            'max_length' => 'Maksimal 4 karakter',
          ]
        ],
        'nisn' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'alamat' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'asal_sekolah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'nomor_telepon' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter'
          ]
        ],
        'jurusan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di pilih'
          ]
        ],
      ]);

      if (!$valid) {
        $msg = [
          'error' => [
            'nama_lengkap' => $validation->getError('nama_lengkap'),
            'foto_siswa' => $validation->getError('foto_siswa'),
            'nik' => $validation->getError('nik'),
            'tempat_lahir' => $validation->getError('tempat_lahir'),
            'tanggal_lahir' => $validation->getError('tanggal_lahir'),
            'jenis_kelamin' => $validation->getError('jenis_kelamin'),
            'agama' => $validation->getError('agama'),
            'nis' => $validation->getError('nis'),
            'nisn' => $validation->getError('nisn'),
            'alamat' => $validation->getError('alamat'),
            'asal_sekolah' => $validation->getError('asal_sekolah'),
            'nomor_telepon' => $validation->getError('nomor_telepon'),
            'jurusan' => $validation->getError('jurusan'),
          ]
        ];
      } else {


        $file_foto = $this->request->getFile('foto_siswa');
        $nama_foto = $file_foto->getRandomName();
        $file_foto->move('Front/assets/img/siswa_baru/foto', $nama_foto);

        $biodata = [
          'nama_lengkap' => $this->request->getVar('nama_lengkap'),
          'nik' => $this->request->getVar('nik'),
          'tempat_lahir' => $this->request->getVar('tempat_lahir'),
          'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
          'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
          'agama' => $this->request->getVar('agama'),
          'nis' => $this->request->getVar('nis'),
          'nisn' => $this->request->getVar('nisn'),
          'alamat' => $this->request->getVar('alamat'),
          'asal_sekolah' => $this->request->getVar('asal_sekolah'),
          'nomor_telepon' => $this->request->getVar('nomor_telepon'),
          'jurusan' => $this->request->getVar('jurusan'),
          'foto_siswa' => $nama_foto,
        ];

        $nikInput = $this->request->getVar('nik');
        if (!$this->SiswaBaruModel->where('nik', $nikInput)->first()) {
          $msg = $this->SiswaBaruModel->insert($biodata);
          $msg = [
            'success' => 'Berhasil'
          ];
        } elseif ($this->SiswaBaruModel->where('nik', $nikInput)->first()) {
          $nikData = $this->SiswaBaruModel->where(['nik' => $nikInput])->first();
          unlink('Front/assets/img/siswa_baru/foto/' . $nikData['foto_siswa']);
          $msg = $this->SiswaBaruModel->update($nikData, $biodata);
        }

        $nama_lengkap = $this->request->getVar('nama_lengkap');


        session()->set('session_nik', $nikInput);
        session()->set('nama_lengkap', $nama_lengkap);
      }

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function simpan_data_ayah()
  {
    if ($this->request->isAJAX()) {
      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'nama_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'alamat_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'tempat_lahir_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'tanggal_lahir_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Pilih tanggal'
          ]
        ],
        'nomor_telepon_ayah' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter'
          ]
        ],
        'agama_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di pilih'
          ]
        ],
        'pekerjaan_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'penghasilan_ayah' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],

      ]);

      if (!$valid) {
        $msg = [
          'error' => [
            'nama_ayah' => $validation->getError('nama_ayah'),
            'alamat_ayah' => $validation->getError('alamat_ayah'),
            'tempat_lahir_ayah' => $validation->getError('tempat_lahir_ayah'),
            'tanggal_lahir_ayah' => $validation->getError('tanggal_lahir_ayah'),
            'nomor_telepon_ayah' => $validation->getError('nomor_telepon_ayah'),
            'agama_ayah' => $validation->getError('agama_ayah'),
            'pekerjaan_ayah' => $validation->getError('pekerjaan_ayah'),
            'penghasilan_ayah' => $validation->getError('penghasilan_ayah'),

          ]
        ];
      } else {
        $data_ayah = [
          'nama_ayah' => $this->request->getVar('nama_ayah'),
          'alamat_ayah' => $this->request->getVar('alamat_ayah'),
          'tempat_lahir_ayah' => $this->request->getVar('tempat_lahir_ayah'),
          'tanggal_lahir_ayah' => $this->request->getVar('tanggal_lahir_ayah'),
          'nomor_telepon_ayah' => $this->request->getVar('nomor_telepon_ayah'),
          'agama_ayah' => $this->request->getVar('agama_ayah'),
          'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
          'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
        ];

        $dataNIK = $this->SiswaBaruModel->where(['nik' => session()->get('session_nik')])->first();

        $msg = $this->SiswaBaruModel->update($dataNIK['id_siswa_baru'], $data_ayah);
      }
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  public function simpan_data_ibu()
  {
    if ($this->request->isAJAX()) {

      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'nama_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'alamat_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'tempat_lahir_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'tanggal_lahir_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Pilih tanggal'
          ]
        ],
        'nomor_telepon_ibu' => [
          'rules' => 'required|min_length[12]|max_length[12]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 12 karakter',
            'max_length' => 'Maksimal 12 karakter'
          ]
        ],
        'agama_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di pilih'
          ]
        ],
        'pekerjaan_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],
        'penghasilan_ibu' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],

      ]);

      if (!$valid) {
        $msg = [
          'error' => [
            'nama_ibu' => $validation->getError('nama_ibu'),
            'alamat_ibu' => $validation->getError('alamat_ibu'),
            'tempat_lahir_ibu' => $validation->getError('tempat_lahir_ibu'),
            'tanggal_lahir_ibu' => $validation->getError('tanggal_lahir_ibu'),
            'nomor_telepon_ibu' => $validation->getError('nomor_telepon_ibu'),
            'agama_ibu' => $validation->getError('agama_ibu'),
            'pekerjaan_ibu' => $validation->getError('pekerjaan_ibu'),
            'penghasilan_ibu' => $validation->getError('penghasilan_ibu'),
          ]
        ];
      } else {
        $data_ibu = [
          'nama_ibu' => $this->request->getVar('nama_ibu'),
          'alamat_ibu' => $this->request->getVar('alamat_ibu'),
          'tempat_lahir_ibu' => $this->request->getVar('tempat_lahir_ibu'),
          'tanggal_lahir_ibu' => $this->request->getVar('tanggal_lahir_ibu'),
          'nomor_telepon_ibu' => $this->request->getVar('nomor_telepon_ibu'),
          'agama_ibu' => $this->request->getVar('agama_ibu'),
          'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
          'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
        ];

        $dataNIK = $this->SiswaBaruModel->where(['nik' => session()->get('session_nik')])->first();

        $msg = $this->SiswaBaruModel->update($dataNIK['id_siswa_baru'], $data_ibu);
      }
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  public function simpan_prestasi()
  {

    $file_1 = $this->request->getFile('bukti_prestasi_1');
    if ($file_1->getError() == 4) {
      $namaFile_1 = NULL;
    } else {
      $namaFile_1 = $file_1->getRandomName();
      $file_1->move('Front/assets/img/siswa_baru/prestasi', $namaFile_1);
    }

    $file_2 = $this->request->getFile('bukti_prestasi_2');

    if ($file_2->getError() == 4) {
      $namaFile_2 = NULL;
    } else {
      $namaFile_2 = $file_2->getRandomName();
      $file_2->move('Front/assets/img/siswa_baru/prestasi', $namaFile_2);
    }



    // Kode Pendaftaran
    $dataNIK = $this->SiswaBaruModel->where(['nik' => session()->get('session_nik')])->first();
    $NL = $dataNIK['nama_lengkap'];
    $NS = $dataNIK['nik'];
    $h1 = substr($NL, 0, 1);
    $n2 = substr($NS, 0, 2);

    $kode_pendaftaran = "$h1" . "-" . "$n2" . date('dhis',);

    $data_prestasi = [
      'bukti_prestasi_1' => $namaFile_1,
      'judul_prestasi_1' => $this->request->getVar('judul_prestasi_1'),
      'tingkat_prestasi_1' => $this->request->getVar('tingkat_prestasi_1'),
      'penyelenggara_1' => $this->request->getVar('penyelenggara_1'),
      'bukti_prestasi_2' => $namaFile_2,
      'judul_prestasi_2' => $this->request->getVar('judul_prestasi_2'),
      'tingkat_prestasi_2' => $this->request->getVar('tingkat_prestasi_2'),
      'penyelenggara_2' => $this->request->getVar('penyelenggara_2'),
      'kode_pendaftaran' =>  $kode_pendaftaran,
    ];

    $this->SiswaBaruModel->update($dataNIK['id_siswa_baru'], $data_prestasi);


    session()->set('bukti_pendaftaran', 'Berhasil Mendaftar');
    return redirect()->to(base_url('ppdb/cetak_bukti_pendaftaran'));
  }


  // Bukti Pendaftaran
  public function cetak_bukti_pendaftaran()
  {

    $nik = session()->get('session_nik');
    $nama = session()->get('nama_lengkap');

    session()->set('nsession_nikisn', $nik);
    session()->set('nama_lengkap', $nama);

    $data = [
      'title' => 'SMANAR - Cetak Bukti Pendaftaran'
    ];
    return view('layout_front/ppdb/cetak_bukti_pendaftaran', $data);
  }





  public function download_bukti_pendaftaran()
  {
    $dompdf = new Dompdf();
    // $options = new Options();

    $nik = session()->get('session_nik');
    // $foto_siswa = $this->SiswaBaruModel->where(['nisn' => $nisn])->first();

    $data = [
      'bukti_pendaftaran' => $this->SiswaBaruModel->where(['nik' => $nik])->first(),
      // 'image' => 'data:image;base64,' . base64_encode(@file_get_contents("$foto_siswa['foto_siswa']"))
    ];
    $nama =  $this->SiswaBaruModel->where(['nik' => $nik])->first();
    $options = new Options();
    $options->set('defaultFont', 'DejaVuSans');
    $dompdf = new Dompdf($options);


    $html = view('layout_front/ppdb/download_bukti_pendaftaran', $data);

    // $options->set('defaultFont', 'Roboto');
    // instantiate and use the dompdf class

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');



    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($nama['nama_lengkap'] . '-' . $nama['nik'], array("Attachment" => true));
    // $dompdf->stream('bukti pendaftaran.pdf', array("Attachment" => false));



  }

  public function finish_register()
  {

    session()->remove('nisn');
    session()->remove('session_nik');
    session()->remove('nama_lengkap');
    session()->remove('bukti_pendaftaran');
    return redirect()->to(base_url('/'));
  }


  // Pengumuman
  public function pengumuman()
  {
    $data = [
      'title' => 'SMANAR - Pengumuman PPDB'
    ];

    return view('layout_front/ppdb/pengumuman', $data);
  }


  public function verifikasi_kode_pendaftaran()
  {
    $data = [
      'title' => 'SMANAR - Verifikasi Kode Pendaftaran',
    ];

    return view('layout_front/ppdb/verifikasi', $data);
  }




  // Lihat hasil pengumuman
  public function hasil_pengumuman()
  {
    if ($this->request->isAJAX()) {


      $validation = \Config\Services::validation();
      $valid = $this->validate([
        'kode_pendaftaran' => [
          'rules' => 'required|max_length[12]|min_length[12]',
          'errors' => [
            'max_length' => 'Maksimal 12 karakter',
            'min_length' => 'Minimal 12 karakter',
            'required' => 'Kode Belum Dimasukkan'
          ]
        ],
      ]);

      if (!$valid) {
        $msg = [
          'error' => [
            'kode_error' => $validation->getError('kode_pendaftaran')
          ]
        ];
      } else {
        $kode_pendaftaran = $this->request->getVar('kode_pendaftaran');

        $kode_siswa = $this->SiswaBaruModel->where(['kode_pendaftaran' => $kode_pendaftaran])->first();


        if ($kode_siswa) {
          $data = [
            'title' => 'SMANAR - Hasil_pengumuman',
            'data_pengumuman' => $kode_siswa['status'],
            'data_siswa' => $kode_siswa
          ];

          $msg = [
            'output' => view('layout_front/ppdb/hasil_pengumuman', $data)
          ];

          session()->remove('kode_salah');
        } else {
          $msg = [
            'kode_salah' => 'Kode yang anda masukkan salah'
          ];
        }
      }

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  // Test
  public function test()
  {
    return view('layout_front/ppdb/pengumuman_countdown');
  }
}
