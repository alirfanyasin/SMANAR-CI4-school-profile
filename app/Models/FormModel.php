<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
  protected $table = 'tbl_input';
  protected $primaryKey = 'id_input';
  protected $allowedFields = ['type_input', 'label_input', 'nama_input', 'required_input'];
}
