<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Base_Controller {
	public function index() {
		$this->nav_data['current'] = 'home';
                $this->con_data['nb_questions_answered'] = $this->answer_model->count(array('user_id' => $this->con_data['user']->id));
                $this->con_data['nb_questions_evaluated'] = $this->answer_model->count_evaluated($this->con_data['user']->id);
                $this->con_data['first_test_id'] = $this->test_model->first_test();
                //Calling views
		$this->load->view('common/header');
		$this->load->view('common/nav', $this->nav_data);
                if($this->answer_model->is_a_newbie($this->con_data['user']->id)) {
                    $this->load->view('home/help', $this->con_data);
                }
                else {
                    $this->load->view('home/stats_user', $this->con_data);
                }
		$this->load->view('common/footer');
	}
}