<?php

namespace App\Models\PPDB;

use CodeIgniter\Model;

class SiswaBaruModel extends Model
{
  protected $table = 'tbl_siswa_baru';
  protected $primaryKey = 'id_siswa_baru';
  protected $allowedFields = ['nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'nis', 'nisn', 'alamat', 'asal_sekolah', 'nomor_telepon', 'jurusan', 'foto_siswa', 'nama_ayah', 'alamat_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'nomor_telepon_ayah', 'agama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'nama_ibu', 'alamat_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'nomor_telepon_ibu', 'agama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'bukti_prestasi_1', 'judul_prestasi_1', 'tingkat_prestasi_1', 'penyelenggara_1', 'bukti_prestasi_2', 'judul_prestasi_2', 'tingkat_prestasi_2', 'penyelenggara_2', 'kode_pendaftaran', 'status', 'created_at', 'updated_at'];
  protected $useTimestamps = true;

  public function get_data_siswa_baru_model()
  {
    return $this->db->table('tbl_siswa_baru')->orderBy('id_siswa_baru', 'DESC')->get()->getResultArray();
  }
}
