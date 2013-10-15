<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->library('parser');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
    }

    public function index() {
        $name = $this->login_model->get_name_by_username();
<<<<<<< HEAD
        $bg_name = $this->boardgame_model->get_name_by_id(2);
        $reviews_user = $this->review_model->get_reviews_by_user_id(1);
        $reviews_bg = $this->review_model->get_reviews_by_bg_id(2);
=======
>>>>>>> 797f7c18ede07cacd0dd9fa4811e4c68597ae380

        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'home',
            'name' => $name,
<<<<<<< HEAD
            'bg_name' => $bg_name,
                'r_user'=>$reviews_user,
            'r_bg'=>$reviews_bg
=======
>>>>>>> 797f7c18ede07cacd0dd9fa4811e4c68597ae380
            
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('templates/menu', array(), true);
            $data['featured'] = $this->parser->parse('templates/featured', array(), true);
            $data['top5'] = $this->parser->parse('templates/top5', array(), true);
            $data['browse'] = $this->parser->parse('templates/browse', array(), true);
            $data['admin_dropdown'] = ' ';
            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }
    
    public function boardgames(){
        $bg = $this->boardgame_model->get_boardgames();
        echo json_encode($bg);
    }

}

?>
