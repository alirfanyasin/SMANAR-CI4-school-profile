<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
  protected $table = 'tbl_gallery';
  protected $primaryKey = 'id_gallery';
  protected $allowedFields = ['thumb_gallery', 'judul_gallery', 'kategori_gallery'];

  public function get_gallery_model()
  {
    return $this->db->table('tbl_gallery')->orderBy('id_gallery', 'DESC')->get(8)->getResultArray();
  }
}
