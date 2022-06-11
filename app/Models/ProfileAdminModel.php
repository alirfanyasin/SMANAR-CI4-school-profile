<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileAdminModel extends Model
{
  protected $table = 'tbl_admin';
  protected $primaryKey = 'id_admin';
  protected $allowedFields = ['nama_admin', 'email_admin', 'password_admin', 'foto_profile'];
}
