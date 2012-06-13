<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Base_Controller {
	public function index() {
                $user = $this->session->userdata['user'];
                
		$this->load->view('common/header');
		$this->load->view('common/footer');
	}
}