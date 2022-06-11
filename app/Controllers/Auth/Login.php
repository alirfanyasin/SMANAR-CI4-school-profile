<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\ProfileAdminModel;

class Login extends BaseController
{
  public function __construct()
  {
    $this->ProfileAdminModel = new ProfileAdminModel();
  }
  public function index()
  {
    session();
    $data = [
      'title' => 'SMANAR - Login',
      'validation' => \Config\Services::validation()
    ];

    return view('Auth/login', $data);
  }


  public function check_auth()
  {
    // Get input user
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    // Get from database
    $email_database = $this->ProfileAdminModel->find(1);
    $password_database = $this->ProfileAdminModel->find(1);

    $email_data = $email_database['email_admin'];
    $password_data = $password_database['password_admin'];

    $validation = \Config\Services::validation();

    $valid = $this->validate([
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email address required'
        ]
      ],

      'password' => [
        'rules' => 'required|min_length[6]',
        'errors' => [
          'required' => 'Password required',
          'min_length' => 'Minimal 6 karakter'
        ]
      ]
    ]);

    if (!$valid) {

      return redirect()->to(base_url('Auth/Login'))->withInput()->with('validation', $validation);
    } else {

      // Check Email & Password
      if ($email == $email_data) {
        if ($password == $password_data) {
          session()->remove('validation_wrong');
          session()->set('login_success', 'Berhasil Login');
          return redirect()->to(base_url('Admin_smanar/dashboard'));
        } else {
          session()->set('validation_wrong', 'Email atau Password Anda Salah');
          return redirect()->to(base_url('Auth/Login'));
        }
      } else {
        session()->set('validation_wrong', 'Email atau Password Anda Salah');
        return redirect()->to(base_url('Auth/Login'));
      }
    }
  }


  public function logout()
  {
    session();
    session()->remove('login_success');

    return redirect()->to(base_url('/'));
  }
}
