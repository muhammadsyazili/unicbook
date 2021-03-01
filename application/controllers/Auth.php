<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_user_m');
        $this->load->library('form_validation');
        if ($this->session->userdata('is_login') == true) redirect('dashboard');
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data_header['title'] = 'Login';
            $data_header['backgroud'] = 'assets/bg.jpg';
            $this->load->view('templates_administrator/header', $data_header);
            $this->load->view('auth/login');
            $this->load->view('templates_administrator/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_user', ['USERNAME' => $name])->row_array();

        if ($user) {
            if ($name == $user['USERNAME'] && md5($password) == $user['PASSWORD']) {
                $data = [
                    'level' => $user['LEVEL'],
                    'user' => $user['USER_ID'],
                    'is_login' => true
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
                exit;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password or Username!</div>');
                redirect('auth');
                exit;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Account is not registered!</div>');
            redirect('auth');
            exit;
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[data_user.USERNAME]');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data_header['title'] = 'Registration';
            $data_header['backgroud'] = 'assets/bg.jpg';
            $this->load->view('templates_administrator/header', $data_header);
            $this->load->view('auth/registration');
            $this->load->view('templates_administrator/footer');
        } else {
            $data = [
                'LOCATION' => htmlspecialchars($this->input->post('location', true)),
                'AGE' => $this->input->post('age'),
                'USERNAME' => htmlspecialchars($this->input->post('name', true)),
                'PASSWORD' => md5($this->input->post('password1')),
                'IMAGE' => 'default.jpg',
                'LEVEL' => 2
            ];

            $this->db->insert('data_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation your account has been created. Please Login</div>');
            redirect('auth');
        }
    }
}