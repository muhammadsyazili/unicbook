<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bookModel');
        $this->load->model('userModel');
        $this->load->model('ratingModel');

        $this->load->library('form_validation');
        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function deleteRatingNotRelation()
    {
        $rating = $this->ratingModel->read();
        for ($i = 0; $i < count($rating); $i++) {
            if ($this->bookModel->count(["books.BOOK_ID" => $rating[$i]->BOOK_ID]) == 0) {
                $this->ratingModel->delete(["rates.RATE_ID" => $rating[$i]->RATE_ID]);
            }
        }
    }

    public function deleteUserUnder50()
    {
        $users = $this->userModel->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->ratingModel->count(["rates.USER_ID" => $users[$i]->USER_ID]) <= 50) {
                $this->userModel->delete(["users.USER_ID" => $users[$i]->USER_ID]);
            }
        }
    }

    public function deleteUserNeverRating()
    {
        $users = $this->userModel->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->ratingModel->count(["rates.USER_ID" => $users[$i]->USER_ID]) == 0) {
                $this->userModel->delete(["users.USER_ID" => $users[$i]->USER_ID]);
            }
        }
    }

    public function createOtomaticRating()
    {
        $users = $this->userModel->read();
        for ($i = 0; $i < count($users); $i++) {
            $books = $this->bookModel->read();
            for ($j=0; $j < count($books); $j++) { 
                if ($this->ratingModel->count(["rates.USER_ID" => $users[$i]->USER_ID, 'rates.BOOK_ID' => $books[$j]->BOOK_ID]) == 0) {
                    $this->ratingModel->create(["rates.USER_ID" => $users[$i]->USER_ID, 'rates.BOOK_ID' => $books[$j]->BOOK_ID, 'rates.RATE' => rand(8, 10)]);
                }
            }
        }
    }

    public function createOtomaticRatingNewBook()
    {
        $books = $this->bookModel->read();
        for ($i=0; $i < count($books); $i++) {
            if ($this->ratingModel->count(['rates.BOOK_ID' => $books[$i]->BOOK_ID]) == 0) {
                $users = $this->userModel->read();
                for ($j=0; $j < count($users); $j++) { 
                    $this->ratingModel->create(["rates.USER_ID" => $users[$j]->USER_ID, 'rates.BOOK_ID' => $books[$i]->BOOK_ID, 'rates.RATE' => rand(1, 10)]);
                }
            } 
        }
    }

    public function createOtomaticRatingNewUser()
    {
        $users = $this->userModel->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->ratingModel->count(["rates.USER_ID" => $users[$i]->USER_ID]) == 0) {
                $books = $this->bookModel->read();
                for ($j=0; $j < count($books); $j++) { 
                    $this->ratingModel->create(["rates.USER_ID" => $users[$i]->USER_ID, 'rates.BOOK_ID' => $books[$j]->BOOK_ID, 'rates.RATE' => rand(1, 10)]);
                }
            }
        }
    }

    public function multiple_create()
    {
        if (count($this->input->post("id")) == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You should rate first !</div>');
            redirect('book');
        } else {
            for ($i = 0; $i < count($this->input->post("id")); $i++) {
                $rating_name = sprintf("rating_value_%s", $this->input->post("id")[$i]);

                if ($this->input->post($rating_name) != null) {

                    $result = $this->ratingModel->readWhere(["rates.BOOK_ID" => $this->input->post("id")[$i], "rates.USER_ID" => $this->session->userdata("user")]);
    
                    if ($result == NULL) {
                        $this->ratingModel->create([
                            "USER_ID" => $this->session->userdata("user"),
                            "BOOK_ID" => $this->input->post("id")[$i],
                            "RATE" => $this->input->post($rating_name)
                        ]);
                    } else {
                        $this->ratingModel->update(
                            [
                                "USER_ID" => $this->session->userdata("user"),
                                "BOOK_ID" => $this->input->post("id")[$i],
                                "RATE" => $this->input->post($rating_name)
                            ],
                            [
                                "RATE_ID" => $result->RATE_ID
                            ]
                        );
                    }
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your rates have been saved</div>');
            redirect('book');
        }
    }

    public function index()
    {
    }

    public function show()
    {
    }

    public function create()
    {
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
