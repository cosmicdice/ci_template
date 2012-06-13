<?php

class Base_Controller extends CI_Controller {
	protected $nav_data;
	protected $con_data;
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user') === false) {
            redirect('login', 'refresh');
        }
        else {
            //user is logged in
        }
    }
}
