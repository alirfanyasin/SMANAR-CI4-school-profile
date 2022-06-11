<?php 

namespace App\Models;
use CodeIgniter\Model;

class EkskulModel extends Model {
  protected $table = 'tbl_ekskul';
  protected $primaryKey = 'id_ekskul';
  protected $allowedFields = ['foto_ekskul', 'nama_ekskul', 'pembina_ekskul','pengikut_ekskul'];
}
