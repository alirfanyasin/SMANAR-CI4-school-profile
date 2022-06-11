<?php

namespace App\Models\PPDB;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
  protected $table = 'tbl_pengumuman';
  protected $primaryKey = 'id_pengumuman';
  protected $allowedFields = ['tanggal_pengumuman', 'waktu_pengumuman', 'status_pengumuman', 'created_at', 'updated_at'];
  protected $useTimestamps = true;
}
