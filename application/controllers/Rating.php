<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_buku_m');
        $this->load->model('data_rating_m');
        $this->load->model('data_user_m');

        $this->load->library('form_validation');
        if ($this->session->userdata('is_login') == false) redirect('auth');
    }

    public function deleteRatingNotRelation()
    {
        $rating = $this->data_rating_m->read();
        for ($i = 0; $i < count($rating); $i++) {
            if ($this->data_buku_m->count(["data_buku.ISBN" => $rating[$i]->ISBN]) == 0) {
                $this->data_rating_m->delete(["data_rating.ID_RATING" => $rating[$i]->ID_RATING]);
            }
        }
    }

    public function deleteUserUnder50()
    {
        $users = $this->data_user_m->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->data_rating_m->count(["data_rating.USER_ID" => $users[$i]->USER_ID]) <= 50) {
                $this->data_user_m->delete(["data_user.USER_ID" => $users[$i]->USER_ID]);
            }
        }
    }

    public function deleteUserNeverRating()
    {
        $users = $this->data_user_m->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->data_rating_m->count(["data_rating.USER_ID" => $users[$i]->USER_ID]) == 0) {
                $this->data_user_m->delete(["data_user.USER_ID" => $users[$i]->USER_ID]);
            }
        }
    }

    public function createOtomaticRating()
    {
        $users = $this->data_user_m->read();
        for ($i = 0; $i < count($users); $i++) {
            $books = $this->data_buku_m->read();
            for ($j=0; $j < count($books); $j++) { 
                if ($this->data_rating_m->count(["data_rating.USER_ID" => $users[$i]->USER_ID, 'data_rating.ISBN' => $books[$j]->ISBN]) == 0) {
                    $this->data_rating_m->create(["data_rating.USER_ID" => $users[$i]->USER_ID, 'data_rating.ISBN' => $books[$j]->ISBN, 'data_rating.RATING' => rand(8, 10)]);
                }
            }
        }
    }

    public function createOtomaticRatingNewBook()
    {
        $books = $this->data_buku_m->read();
        for ($i=0; $i < count($books); $i++) {
            if ($this->data_rating_m->count(['data_rating.ISBN' => $books[$i]->ISBN]) == 0) {
                $users = $this->data_user_m->read();
                for ($j=0; $j < count($users); $j++) { 
                    $this->data_rating_m->create(["data_rating.USER_ID" => $users[$j]->USER_ID, 'data_rating.ISBN' => $books[$i]->ISBN, 'data_rating.RATING' => rand(1, 10)]);
                }
            } 
        }
    }

    public function createOtomaticRatingNewUser()
    {
        $users = $this->data_user_m->read();
        for ($i = 0; $i < count($users); $i++) {
            if ($this->data_rating_m->count(["data_rating.USER_ID" => $users[$i]->USER_ID]) == 0) {
                $books = $this->data_buku_m->read();
                for ($j=0; $j < count($books); $j++) { 
                    $this->data_rating_m->create(["data_rating.USER_ID" => $users[$i]->USER_ID, 'data_rating.ISBN' => $books[$j]->ISBN, 'data_rating.RATING' => rand(1, 10)]);
                }
            }
        }
    }

    public function multiple_create()
    {
        if (count($this->input->post("id")) == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You should rate first !</div>');
            redirect('buku');
        } else {
            for ($i = 0; $i < count($this->input->post("id")); $i++) {
                $rating_name = sprintf("rating_value_%s", $this->input->post("id")[$i]);

                if ($this->input->post($rating_name) != null) {

                    $result = $this->data_rating_m->readWhere(["data_rating.ISBN" => $this->input->post("id")[$i], "data_rating.USER_ID" => $this->session->userdata("user")]);
    
                    if ($result == NULL) {
                        $this->data_rating_m->create([
                            "USER_ID" => $this->session->userdata("user"),
                            "ISBN" => $this->input->post("id")[$i],
                            "RATING" => $this->input->post($rating_name)
                        ]);
                    } else {
                        $this->data_rating_m->update(
                            [
                                "USER_ID" => $this->session->userdata("user"),
                                "ISBN" => $this->input->post("id")[$i],
                                "RATING" => $this->input->post($rating_name)
                            ],
                            [
                                "ID_RATING" => $result->ID_RATING
                            ]
                        );
                    }
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation your rating have been saved</div>');
            redirect('buku');
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
