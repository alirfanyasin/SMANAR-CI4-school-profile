<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
  protected $table = 'tbl_feedback';
  protected $primaryKey = 'id_feedback';
  protected $allowedFields = ['nama_feedback', 'email_feedback', 'subjek_feedback', 'pesan_feedback'];
}
