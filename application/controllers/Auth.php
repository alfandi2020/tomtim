<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_alamat');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //cek jika user blm login maka redirect ke halaman login
        /*if ($this->session->userdata('email', 'nama') != TRUE) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }*/
    }


    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('index');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password =  $this->input->post('password');
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
        if ($user['username'] == $username) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'username' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Login Berhasil !</div>');
                redirect('Administrator');
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">username salah !</div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $array_unset = array('username', 'nama');
        $this->session->unset_userdata($array_unset);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}
