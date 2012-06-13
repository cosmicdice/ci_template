<?php

class Base_Controller extends CI_Controller {
	protected $user;
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user') === false) {
            redirect('login', 'refresh');
        }
        else {//user is logged in
            $this->user = $this->session->userdata['user'];
        }
    }
}
