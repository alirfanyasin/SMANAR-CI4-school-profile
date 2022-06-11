<?php

namespace App\Models;

use CodeIgniter\Model;

class KepsekModel extends Model
{
  protected $table = 'tbl_kepsek';
  protected $primaryKey = 'id_kepsek';
  // protected $useSoftDeletes = true;
  protected $allowedFields = ['foto_kepsek', 'nama_kepsek', 'alamat_kepsek', 'nip_kepsek', 'email_kepsek', 'sambutan_kepsek'];
  protected $useTimestamps = true;

  // public function get_kepsek($id = false)
  // {
  //   if ($id == false) {
  //     return $this->findAll();
  //   }
  //   return $this->where(['id_kepsek' => $id])->first();
  // }

}
