<?php
class Login extends CI_Controller 
{
	
	public function index()
	{    
     	$username = $this->session->userdata('username');
     	if ($username === false) {
     		$login_data = array();
     		$login_data['alert'] = $this->session->flashdata('alert');
			$nav_data = array();
			$nav_data['username'] = '';
			$nav_data['current'] = '';
			$nav_data['admin'] = 0;
			
     		$this->load->view('common/header');
			$this->load->view('common/nav',$nav_data);
			$this->load->view('common/login',$login_data);
			$this->load->view('common/footer');
     	}	
     	else {
     		redirect('home', 'refresh');
     	}		
	}
	
	//Called from login form
	public function connect() {
		
		$this->load->model('user_model');
		
		$username = $this->session->userdata('username');
		if ($username === false) {
			$post_username = $this->input->post('username');
			$post_password = $this->input->post('password');			
			
			$user = $this->user_model->get_user($post_username);
			$this->session->set_flashdata('alert', 'User not registered!');
				$this->session->flashdata('alert');
				if ($user->password == $post_password) {
					$this->session->set_userdata('username',$post_username);
					$this->session->set_userdata('admin',$this->user_model->is_admin($post_username));
				}
				else{
					$this->session->set_flashdata('alert', 'Incorrect password!');
				}			
		}
		redirect('login', 'refresh');
	}
	
	//Called from disconnexion link
	public function disconnect() {
		$this->session->unset_userdata('username');
		redirect('login', 'refresh');
	}
		
}