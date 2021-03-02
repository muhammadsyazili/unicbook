<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('bookModel');
        $this->load->model('ratingModel');

        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function index()
    {
        $books = $this->bookModel->read();
        
        for ($i = 0; $i < count($books); $i++) {
            $temp[$i]['URL_IMAGE_M'] = $books[$i]->URL_IMAGE_M;
            $temp[$i]['BOOK_ID'] = $books[$i]->BOOK_ID;
            $temp[$i]['AUTHOR'] = $books[$i]->AUTHOR;
            $temp[$i]['TITLE'] = $books[$i]->TITLE;
            $temp[$i]['RATE'] = $this->ratingModel->readWhere(["rates.BOOK_ID" => $books[$i]->BOOK_ID, "rates.USER_ID" => $this->session->userdata('user')]) == NULL ? NULL : $this->ratingModel->readWhere(["rates.BOOK_ID" => $books[$i]->BOOK_ID, "rates.USER_ID" => $this->session->userdata('user')])->RATE;
        }
        
        $data_header['title'] = 'Daftar Buku';
        $data_content['books'] = $temp;

        $this->load->view('templates/header', $data_header);
        $this->load->view('templates/sidebar');
        $this->load->view('book/read', $data_content);
        $this->load->view('templates/footer');
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

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $filter = $this->input->post('filter');

        $data_header['title'] = 'Hasil Pencarian Buku';
        $data_content['books'] = $filter == 'title' ? $this->db->like('TITLE', $keyword, 'both')->get("books")->result() : $this->db->like('AUTHOR', $keyword, 'both')->get("books")->result();

        $this->load->view('templates/header', $data_header);
        $this->load->view('templates/sidebar');
        $this->load->view('book-search', $data_content);
        $this->load->view('templates/footer');
    }
}
