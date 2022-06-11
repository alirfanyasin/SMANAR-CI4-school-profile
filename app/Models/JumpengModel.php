<?php

namespace App\Models;

use CodeIgniter\Model;

class JumpengModel extends Model
{
  protected $table = 'tbl_jumpeng';
  protected $primaryKey = 'id_jumpeng';
  protected $allowedFields = ['penghuni', 'jumlah'];
}
