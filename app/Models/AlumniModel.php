<?php


namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
  protected $table = 'tbl_alumni';
  protected $primaryKey = 'id_alumni';
  protected $allowedFields = ['foto_alumni', 'nama_alumni', 'jabatan_alumni', 'testimoni_alumni'];
}
