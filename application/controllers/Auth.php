<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function process()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Auth_model->cek_login($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'user_id'  => $user->id,
                'username' => $user->username,
                'logged_in' => TRUE
            ]);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
