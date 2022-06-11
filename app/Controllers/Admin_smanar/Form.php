<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\FormModel;

class Form extends BaseController
{
  public function __construct()
  {
    $this->FormModel = new FormModel();
  }
  public function index()
  {
    $data = [
      'title' => 'SMANAR - Form Setting'
    ];

    return view('Admin/PPDB/formulir.php', $data);
  }


  public function get_data_input()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'data_input' => $this->FormModel->findAll()
      ];
      $output = view('Admin/PPDB/data_input', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Modal
  public function modal_tambah_input_form()
  {
    if ($this->request->isAJAX()) {
      $msg = [
        'open_modal' => view('Admin/PPDB/modal_tambah_input')
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  // Simpan data
  public function simpan_input()
  {
    if ($this->request->isAJAX()) {

      // $nama_row_input = $this->request->getVar('nama_input');



      $data = [
        'type_input' => $this->request->getVar('type_input'),
        'label_input' => $this->request->getVar('label_input'),
        'nama_input' => $this->request->getVar('nama_input'),
        'required_input' => $this->request->getVar('required_input'),
        'autocomplete_input' => $this->request->getVar('autocomplete_input'),
      ];

      $msg = $this->FormModel->insert($data);
      $msg = [
        'success' => 'Berhasil'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function detele_input()
  {
    if ($this->request->isAJAX()) {
      $id_input = $this->request->getVar('id_input');
      $msg = $this->FormModel->delete($id_input);
      $msg = [
        'success' => 'Input berhasil di hapus'
      ];
      echo json_encode($msg);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
