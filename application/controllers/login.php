<?php
class Login extends CI_Controller 
{
	public function index()
	{    
            $user = $this->session->userdata('user');
            if ($user === false) {
                $this->load->view('common/header');
		$this->load->view('common/login');
		$this->load->view('common/footer');
            }	
            else {
     		redirect('home', 'refresh');
            }		
	}
	//Called from login form
	public function connect() {
		$this->load->model('login_model');
		if ($this->session->userdata('user') === false) {//user array does not exist in the session
			$post_username = $this->input->post('username');
			$post_password = $this->input->post('password');			
			$user = $this->login_model->login($post_username,$post_password);
                        if($user === false) { //User/password not found
                            //Alert
                        }
                        else { //User exist data fetched in $user
                            $this->session->set_userdata('user', $user);
                        }
		}
		redirect('login', 'refresh');
	}
	//Called from disconnexion link
	public function disconnect() {
		$this->session->unset_userdata('user');
		redirect('login', 'refresh');
	}
        
        public function install($username,$password) {
                $this->load->model('login_model');
                $this->login_model->create_user($username,$password,'admin@template.com',1);
        }
}