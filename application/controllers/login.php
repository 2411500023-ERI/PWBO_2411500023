<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();      // load DB
        $this->load->library('session'); // load session
    }

    // Halaman Login
    public function index()
    {
        $this->load->view('login');
    }

    //  Login
    public function process()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

       
        $user = $this->db->get_where('users', [
            'username' => $username
        ])->row();

       
        if ($user && password_verify($password, $user->password)) {

           
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'user_id'   => $user->id,
                'username'  => $user->username
            ]);

            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('login');
        }
    }

    //  Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
