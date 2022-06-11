<?php

namespace App\Models;

use CodeIgniter\Model;

class WakasekModel extends Model
{
  protected $table = 'tbl_wakasek';
  protected $primaryKey = 'id_wakasek';
  protected $allowedFields = ['foto_wakasek', 'nama_wakasek', 'jabatan_wakasek', 'wa_wakasek', 'fb_wakasek', 'ig_wakasek'];
  protected $useTimestamps = true;
}
