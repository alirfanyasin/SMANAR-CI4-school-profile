<?php

namespace App\Controllers\Admin_smanar;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use App\Models\FeedbackModel;
use App\Models\BlogModel;
// use App\Models\EkskulModel;
use App\Models\AlumniModel;

class Dashboard extends BaseController
{
  public function __construct()
  {
    $gallery = $this->GalleryModel = new GalleryModel();
    $feedback = $this->FeedbackModel = new FeedbackModel();
    // $ekskul = $this->EkskulModel = new EkskulModel();
    $alumni = $this->AlumniModel = new AlumniModel();
    $blog = $this->BlogModel = new BlogModel();

    $data = [$gallery, $feedback, $blog, $alumni];
    return $data;
  }

  public function index()
  {
    $data = [
      'title' => 'SMANAR - Maju Bersam Hebat Semua'
    ];
    return view('Admin/v_dashboard', $data);
  }

  public function counting_data()
  {
    if ($this->request->isAJAX()) {
      $data = [

        'gallery' => $this->GalleryModel->findAll(),
        'feedback' => $this->FeedbackModel->findAll(),
        'blog' => $this->BlogModel->findAll(),
        'alumni' => $this->AlumniModel->findAll()
      ];

      $output = view('Admin/data/data_dashboard', $data);
      echo json_encode($output);
    } else {
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
  }
}
