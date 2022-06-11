<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class Feedback extends BaseController
{
  public function __construct()
  {
    $this->FeedbackModel = new FeedbackModel();
  }

  public function index()
  {
    $data = [

      'title' => 'SMANAR - Feedback',
    ];

    return view('Admin/v_feedback', $data);
  }

  public function get_feedback()
  {
    if ($this->request->isAJAX()) {
      $data = [
        'data' => $this->FeedbackModel->findAll()
      ];
      $output = view('Admin/Feedback/data_feedback', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }

  public function delete_feedback()
  {
    if ($this->request->isAJAX()) {
      $id = $this->request->getVar('id_feedback');
      $feedback = $this->FeedbackModel->delete($id);
      $feedback = [
        'success' => 'Data berhasil di hapus'
      ];
      echo json_encode($feedback);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
