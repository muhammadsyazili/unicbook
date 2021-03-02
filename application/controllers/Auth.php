<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('is_login') == true) redirect('dashboard');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', ['USERNAME' => $username])->row_array();

            if ($user) {
                if ($username == $user['USERNAME'] && md5($password) == $user['PASSWORD']) {
                    $data = [
                        'level' => $user['LEVEL_ID'],
                        'user' => $user['USER_ID'],
                        'is_login' => true
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                    exit;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong username or password!</div>');
                    redirect('auth');
                    exit;
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account is not registered!</div>');
                redirect('auth');
                exit;
            }
        } else {
            $data_header['title'] = 'Login';
            $data_header['backgroud'] = 'assets/bg.jpg';

            $this->load->view('templates/header', $data_header);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.USERNAME]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password_confirmation]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!',
            ]);
        $this->form_validation->set_rules('password_confirmation', 'Retype Password', 'required|trim|min_length[3]|matches[password]');

        if ($this->form_validation->run()) {
            $data = [
                'USERNAME' => htmlspecialchars($this->input->post('username', true)),
                'PASSWORD' => md5($this->input->post('password')),
                'LEVEL_ID' => 2
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your account has been created. Please Login!</div>');
            redirect('auth');
        } else {
            $data_header['title'] = 'Register';
            $data_header['backgroud'] = 'assets/bg.jpg';
            $this->load->view('templates/header', $data_header);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        }
    }
}