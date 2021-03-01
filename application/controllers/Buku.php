<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_buku_m');
        $this->load->model('data_user_m');
        $this->load->model('data_rating_m');

        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function index()
    {
        $books = $this->data_buku_m->read();
        
        for ($i = 0; $i < count($books); $i++) {
            $temp[$i]['URL_IMAGE_M'] = $books[$i]->URL_IMAGE_M;
            $temp[$i]['ISBN'] = $books[$i]->ISBN;
            $temp[$i]['AUTHOR'] = $books[$i]->AUTHOR;
            $temp[$i]['JUDUL'] = $books[$i]->JUDUL;
            $temp[$i]['RATING'] = $this->data_rating_m->readWhere(["data_rating.ISBN" => $books[$i]->ISBN, "data_rating.USER_ID" => $this->session->userdata('user')]) == NULL ? NULL : $this->data_rating_m->readWhere(["data_rating.ISBN" => $books[$i]->ISBN, "data_rating.USER_ID" => $this->session->userdata('user')])->RATING;
        }
        
        $data_header['title'] = 'Daftar Buku';
        $data_content['books'] = $temp;

        $this->load->view('templates_administrator/header', $data_header);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('data_buku/read', $data_content);
        $this->load->view('templates_administrator/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $filter = $this->input->post('filter');

        $data_header['title'] = 'Hasil Pencarian';
        $data_content['books'] = $this->data_buku_m->getSearch($keyword, $filter);

        $this->load->view('templates_administrator/header', $data_header);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('data_buku/search', $data_content);
        $this->load->view('templates_administrator/footer');
    }

    public function store()
    {
    }

    public function edit($id)
    {
    }

    public function update()
    {
    }
    
    public function destroy()
    {
    }
}
