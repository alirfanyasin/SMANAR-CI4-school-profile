<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\ProfileAdminModel;

class Profile extends BaseController
{
  public function __construct()
  {
    $this->ProfileAdminModel = new ProfileAdminModel();
  }
  public function profile_admin()
  {
    $data = [
      'title' => 'SMANAR - Profile'
    ];

    return view('Admin/profile/v_profile', $data);
  }


  public function getDataAdmin()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'profile' => $this->ProfileAdminModel->find(1)
      ];
      $output = view('Admin/profile/data_profile', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }


  public function modal_edit_profile()
  {
    if ($this->request->isAJAX()) {
      $id_admin = $this->request->getVar('id_admin');
      $row = $this->ProfileAdminModel->find($id_admin);
      $data = [
        'id_admin' => $row['id_admin'],
        'nama_admin' => $row['nama_admin'],
        'email_admin' => $row['email_admin'],
        'password_admin' => $row['password_admin'],
      ];

      $msg = [
        'success' => view('Admin/profile/modal_edit_profile', $data)
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update_data_profile()
  {

    if ($this->request->isAJAX()) {


      // Validation
      $validation = \Config\Services::validation();

      $valid = $this->validate([
        'nama_admin' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],

        'email_admin' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Wajib di isi'
          ]
        ],

        'password_admin' => [
          'rules' => 'required|min_length[6]',
          'errors' => [
            'required' => 'Wajib di isi',
            'min_length' => 'Minimal 6 karakter'
          ]
        ]
      ]);

      if (!$valid) {
        $msg = [
          'error' => [
            'nama_admin' => $validation->getError('nama_admin'),
            'email_admin' => $validation->getError('email_admin'),
            'password_admin' => $validation->getError('password_admin')
          ]
        ];
      } else {
        $id_admin = $this->request->getVar('id_admin');

        $data_admin = [
          'nama_admin' => $this->request->getVar('nama_admin'),
          'email_admin' => $this->request->getVar('email_admin'),
          'password_admin' => $this->request->getVar('password_admin'),
        ];
        $msg = $this->ProfileAdminModel->update($id_admin, $data_admin);
        $msg = [
          'success' => 'Data Berhasil di Upadate'
        ];
      }
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function update_foto_profile()
  {
    if ($this->request->isAJAX()) {
      $imageFile = $_POST['image'];

      $image_array_1 = explode(';', $imageFile);
      $image_array_2 = explode(',', $image_array_1[1]);
      $base64 = base64_decode($image_array_2[1]);
      $namaFile = time() . '.png';

      file_put_contents('Front/assets/img/team/foto_profile/' . $namaFile, $base64);
      $fotoLama = $this->ProfileAdminModel->where(['id_admin' => 1])->first();

      $data = [
        'foto_profile' => $namaFile
      ];

      $msg = $this->ProfileAdminModel->update(1, $data);
      // }

      unlink('Front/assets/img/team/foto_profile/' .  $fotoLama['foto_profile']);



      $msg = ['success' => 'Foto Profile berhasil di update'];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
