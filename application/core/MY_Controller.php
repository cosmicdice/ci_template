<?php

class Base_Controller extends CI_Controller {
	protected $nav_data;
	protected $con_data;
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('username') === false) {
            redirect('login', 'refresh');
        }
		else {
                        $this->load->model('test_model');
			$this->load->model('question_model');
			$this->load->model('scheme_model');
                        $this->load->model('mark_model');
			$this->load->model('answer_model');
			$this->load->model('user_model');
                        $this->load->model('global_model');
                        $this->load->model('passed_model');
                        
			$this->nav_data = array();
			$this->nav_data['username'] = $this->session->userdata('username');
			$this->nav_data['admin'] = $this->session->userdata('admin');
			$this->nav_data['current'] = '';
			$this->con_data = array();
			$this->con_data['username'] = $this->session->userdata('username');
			$this->con_data['admin'] = $this->session->userdata('admin');
                        $this->con_data['user'] = $this->user_model->get_user($this->con_data['username']);
		}
    }
}
class Admin_Controller extends CI_Controller {
	protected $nav_data;
	protected $con_data;
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('username') === false) {
            redirect('login', 'refresh');
        }
		else {
			if ($this->session->userdata('admin') == 1) {
				$this->load->model('test_model');
				$this->load->model('question_model');
				$this->load->model('scheme_model');
				
				$this->nav_data = array();
				$this->nav_data['username'] = $this->session->userdata('username');
				$this->nav_data['admin'] = $this->session->userdata('admin');
				$this->nav_data['current'] = 'admin';
				$this->con_data = array();
				$this->con_data['username'] = $this->session->userdata('username');
				$this->con_data['admin'] = $this->session->userdata('admin');
			}
			else {
				redirect('home', 'refresh');
			}
		}
    }
}