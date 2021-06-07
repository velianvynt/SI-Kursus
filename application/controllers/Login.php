<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function getLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['password'] == $password) {
                $sess = [
                    'username'  => $user['username'],
                    'role_id'   => $user['role_id'],
                    'code'      => $user['code']
                ];
                $this->session->set_userdata($sess);

                if ($user['role_id'] == 1) {
                    redirect('staff');
                } else if ($user['role_id'] == 2) {
                    redirect('teacher/listClass');
                } else if ($user['role_id'] == 3) {
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">You have successfully logged out</div>');
        redirect('login');
    }
}
