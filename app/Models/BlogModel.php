<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
  protected $table = 'tbl_blog';
  protected $primaryKey = 'id_blog';
  protected $useTimestamps = true;
  protected $allowedFields = ['thumbnail_blog', 'slug_blog', 'judul_blog', 'kategori_blog', 'content_blog', 'created_at', 'updated_at'];

  public function get_data_blog_admin()
  {
    return $this->db->table('tbl_blog')->orderBy('id_blog', 'DESC')->get()->getResultArray();
  }


  public function get_data_blog()
  {
    return $this->db->table('tbl_blog')->orderBy('id_blog', 'DESC')->get(3)->getResultArray();
  }




  // public function getMultiTabel($id)
  // {
  //   return $this->db->table('tbl_tiket')
  //     ->join('tb_tiket', 'tbl_tiket.id_penumpang = tb_tiket.id_penumpang', 'inner')
  //     ->select('*')->where('tb_tiket.id_penumpang', $id)->get()->getResultArray();
  // }
}
