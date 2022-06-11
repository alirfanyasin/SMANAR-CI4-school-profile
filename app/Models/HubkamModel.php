<?php

namespace App\Models;

use \CodeIgniter\Model;

class HubkamModel extends Model
{
  protected $table = 'tbl_hub_kam';
  protected $primaryKey = 'id_hubkam';
  protected $allowedFields = ['email_hubkam', 'kontak1_hubkam', 'kontak2_hubkam', 'alamat_hubkam', 'dari_jam_hubkam', 'sampai_jam_hubkam', 'wa_hubkam', 'ig_hubkam', 'fb_hubkam', 'yt_hubkam', 'tw_hubkam'];
  // public function get_data_hubkam()
  // {
  //   return $this->db->table('tbl_hub_kam')->where(['id_hubkam' => 1])->get()->getRowArray();
  // }

  // public function update_data_hubkam($id = 1, $data)
  // {
  //   return $this->db->table('tbl_hub_kam')->where(['id_hubkam' => $id])->update($data);
  // }
}
