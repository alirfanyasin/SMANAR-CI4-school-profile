<?php

namespace App\Controllers;

use App\Models\KepsekModel;
use App\Models\WakasekModel;
use App\Models\JumpengModel;
use App\Models\AlumniModel;
use App\Models\EkskulModel;
use App\Models\GalleryModel;
use App\Models\HubkamModel;
use App\Models\FeedbackModel;
use App\Models\BlogModel;

class Home extends BaseController
{
    public function __construct()
    {
        $kepsek = $this->KepsekModel = new KepsekModel();
        $wakasek = $this->WakasekModel = new WakasekModel();
        $jumpeng = $this->JumpengModel = new JumpengModel();
        $alumni = $this->AlumniModel = new AlumniModel();
        $Ekskul = $this->EkskulModel = new EkskulModel();
        $Gallery = $this->GalleryModel = new GalleryModel();
        $Hubkam = $this->HubkamModel = new HubkamModel();
        $feedback = $this->FeedbackModel = new FeedbackModel();
        $blog = $this->BlogModel = new BlogModel();

        $data = [$kepsek, $wakasek, $jumpeng, $alumni, $Ekskul, $Gallery, $Hubkam, $feedback, $blog];
        return $data;
    }
    public function index()
    {
        $data = [
            'title' => 'SMANAR - Maju Bersama Hebat Semua',
            'data' => $this->AlumniModel->findAll(),
            'data_ekskul' => $this->EkskulModel->findAll()

        ];
        return view('v_home', $data);
    }

    public function get_kepsek()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->KepsekModel->findAll()
            ];
            $output = view('layout_front/view_data_kepsek', $data);
            echo json_encode($output);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function get_wakasek()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->WakasekModel->findAll()
            ];
            $output = view('layout_front/view_data_wakasek', $data);
            echo json_encode($output);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function get_jml_penghuni()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->JumpengModel->findAll()
            ];
            $output = view('layout_front/view_data_jumpeng', $data);
            echo json_encode($output);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function get_gallery()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->GalleryModel->get_gallery_model()
            ];
            $output = view('layout_front/view_data_gallery', $data);
            echo json_encode($output);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function get_blog()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'data' => $this->BlogModel->get_data_blog()
            ];
            $output = view('layout_front/view_data_blog', $data);
            echo json_encode($output);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    // =======================================
    // Blog
    // =======================================



    public function detail_blog($slug)
    {
        $data = [
            'title' => 'SMANAR - Blog',
            'detail_blog' => $this->BlogModel->where(['slug_blog' => $slug])->first(),
        ];

        return view('v_blog', $data);
    }



    // Kategori
    public function all()
    {

        $data = [
            'title' => 'SMANAR - Semua bloh',
            'data_edukasi' => $this->BlogModel->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_edukasi()
    {

        $data = [
            'title' => 'SMANAR - Blog Edukasi',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Edukasi'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_prestasi()
    {
        $data = [
            'title' => 'SMANAR - Blog Prestasi',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Prestasi'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_ekstrakulikuler()
    {
        $data = [
            'title' => 'SMANAR - Blog Ekstrakulikuler',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Ekstrakulikuler'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_kunjungan()
    {
        $data = [
            'title' => 'SMANAR - Blog Kunjungan',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Kunjungan'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_kegiatan()
    {
        $data = [
            'title' => 'SMANAR - Blog Kegiatan',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Kegiatan'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }
    public function categori_other()
    {
        $data = [
            'title' => 'SMANAR - Blog Kegiatan',
            'data_edukasi' => $this->BlogModel->where(['kategori_blog' => 'Lainnya'])->findAll()
        ];

        return  view('layout_front/data_kategori_blog/view_blog_categori', $data);
    }






    // =======================================
    // Feedback
    // =======================================

    public function kirim_feedback()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'nama_feedback' => $this->request->getVar('nama_feedback'),
                'email_feedback' => $this->request->getVar('email_feedback'),
                'subjek_feedback' => $this->request->getVar('subjek_feedback'),
                'pesan_feedback' => $this->request->getVar('pesan_feedback'),
            ];
            $msg = $this->FeedbackModel->insert($data);
            $msg = [
                'success' => 'Pesan Anda berhasil Terikirm'
            ];

            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
