<?php

namespace App\Models\PPDB;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
  protected $table = 'tbl_pendaftaran';
  protected $primaryKey = 'id_pendaftaran';
  protected $allowedFields = ['tahun_ajaran_pendaftaran', 'status_pendaftaran'];
}
