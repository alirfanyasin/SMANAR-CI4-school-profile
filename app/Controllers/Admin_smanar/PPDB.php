<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\PPDB\PendaftaranModel;
use App\Models\PPDB\SiswaBaruModel;
use App\Models\PPDB\PengumumanModel;

class PPDB extends BaseController
{
  public function __construct()
  {
    $pm = $this->PendaftaranModel = new PendaftaranModel();
    $sbm = $this->SiswaBaruModel = new SiswaBaruModel();
    $pgm = $this->PengumumanModel = new PengumumanModel();

    $dataModel = [$pm, $sbm, $pgm];
    return $dataModel;
  }
  public function pendaftaran()
  {
    $data = [
      'title' => 'SMANAR - Pendaftaran'
    ];

    return view('Admin/PPDB/pendaftaran', $data);
  }

  // Pendaftaran
  public function get_data_pendaftaran()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'data_pendaftaran' => $this->PendaftaranModel->findAll()
      ];

      $output = view('Admin/PPDB/data_pendaftaran', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Update data
  public function update_pendaftaran()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'tahun_ajaran_pendaftaran' => $this->request->getVar('tahun_ajaran_pendaftaran'),
        'status_pendaftaran' => $this->request->getVar('status_pendaftaran')
      ];

      $msg = $this->PendaftaranModel->update(1, $data);
      $msg = [
        'success' => 'Berhasil di Update'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Menambahkan 






  //======================================================================================
  //                        D A T A         S I S W A
  //======================================================================================

  public function data_siswa()
  {
    $data = [
      'title' => 'SMANAR - Data Siswa'
    ];
    return view('Admin/ppdb/data_siswa', $data);
  }

  // Get data siswa with AJAX
  public function get_data_siswa_baru()
  {
    if ($this->request->isAJAX()) {

      $data  = [
        'data_siswa' => $this->SiswaBaruModel->get_data_siswa_baru_model()
      ];

      $output = view('Admin/PPDB/data_siswa_baru', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }



  // Get biodata siswa with AJAX
  public function get_biodata_siswa()
  {
    if ($this->request->isAJAX()) {

      $id_siswa_baru = $this->request->getVar('id_siswa_baru');
      $row = $this->SiswaBaruModel->where(['id_siswa_baru' => $id_siswa_baru])->first();
      $data  = [
        'id_siswa_baru' => $row['id_siswa_baru'],
        'nama_lengkap' => $row['nama_lengkap'],
        'nik' => $row['nik'],
        'tempat_lahir' => $row['tempat_lahir'],
        'tanggal_lahir' => $row['tanggal_lahir'],
        'jenis_kelamin' => $row['jenis_kelamin'],
        'agama' => $row['agama'],
        'nis' => $row['nis'],
        'nisn' => $row['nisn'],
        'alamat' => $row['alamat'],
        'asal_sekolah' => $row['asal_sekolah'],
        'nomor_telepon' => $row['nomor_telepon'],
        'jurusan' => $row['jurusan'],
        'kode_pendaftaran' => $row['kode_pendaftaran'],
        'foto_siswa' => $row['foto_siswa'],
        'status' => $row['status'],

        // data ayah
        'nama_ayah' => $row['nama_ayah'],
        'alamat_ayah' => $row['alamat_ayah'],
        'tempat_lahir_ayah' => $row['tempat_lahir_ayah'],
        'tanggal_lahir_ayah' => $row['tanggal_lahir_ayah'],
        'nomor_telepon_ayah' => $row['nomor_telepon_ayah'],
        'agama_ayah' => $row['agama_ayah'],
        'pekerjaan_ayah' => $row['pekerjaan_ayah'],
        'penghasilan_ayah' => $row['penghasilan_ayah'],
        'nama_ibu' => $row['nama_ibu'],
        'alamat_ibu' => $row['alamat_ibu'],
        'tempat_lahir_ibu' => $row['tempat_lahir_ibu'],
        'tanggal_lahir_ibu' => $row['tanggal_lahir_ibu'],
        'nomor_telepon_ibu' => $row['nomor_telepon_ibu'],
        'agama_ibu' => $row['agama_ibu'],
        'pekerjaan_ibu' => $row['pekerjaan_ibu'],
        'penghasilan_ibu' => $row['penghasilan_ibu'],

        // Prestasi
        'bukti_prestasi_1' => $row['bukti_prestasi_1'],
        'judul_prestasi_1' => $row['judul_prestasi_1'],
        'tingkat_prestasi_1' => $row['tingkat_prestasi_1'],
        'penyelenggara_1' => $row['penyelenggara_1'],
        'bukti_prestasi_2' => $row['bukti_prestasi_2'],
        'judul_prestasi_2' => $row['judul_prestasi_2'],
        'tingkat_prestasi_2' => $row['tingkat_prestasi_2'],
        'penyelenggara_2' => $row['penyelenggara_2'],

      ];

      $msg = [
        'success' => view('Admin/PPDB/modal_biodata_siswa', $data)
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function action_siswa_baru_terima()
  {
    if ($this->request->isAJAX()) {
      $id_siswa_baru = $this->request->getVar('id_siswa_baru');


      $data = [
        'status' => 1,
      ];



      $msg = $this->SiswaBaruModel->update($id_siswa_baru, $data);
      $msg = [
        'success' => 'Data berhasil di update'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function action_siswa_baru_tolak()
  {
    if ($this->request->isAJAX()) {
      $id_siswa_baru = $this->request->getVar('id_siswa_baru');


      $data = [
        'status' => 2,
      ];



      $msg = $this->SiswaBaruModel->update($id_siswa_baru, $data);
      $msg = [
        'success' => 'Data berhasil di update'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function delete_biodata()
  {
    if ($this->request->isAJAX()) {
      $id_siswa_baru = $this->request->getVar('id_siswa_baru');
      $file_foto = $this->SiswaBaruModel->where(['id_siswa_baru' => $id_siswa_baru])->first();

      $nama_foto = $file_foto['foto_siswa'];
      unlink('Front/assets/img/siswa_baru/foto/' . $nama_foto);

      $msg = $this->SiswaBaruModel->delete($id_siswa_baru);
      $msg = [
        'success' => 'Data berhasil di hapus'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }




  // Pengumuman PPDB
  public function pengumuman()
  {
    $data = [
      'title' => 'SMANAR - Pengumuman'
    ];
    return view('Admin/PPDB/pengumuman', $data);
  }

  public function get_atur_pengumuman()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'atur' => $this->PengumumanModel->find(1)
      ];
      $output = view('Admin/PPDB/data_atur_pengumuman', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update_pengumuman()
  {
    if ($this->request->isAJAX()) {

      $data = [
        'tanggal_pengumuman' => $this->request->getVar('tanggal_pengumuman'),
        'waktu_pengumuman' => $this->request->getVar('waktu_pengumuman'),
        'status_pengumuman' => $this->request->getVar('status_pengumuman'),
      ];

      $msg = $this->PengumumanModel->update(1, $data);
      $msg = [
        'success' => 'Pengumuman Berhasil di Updatae'
      ];

      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
