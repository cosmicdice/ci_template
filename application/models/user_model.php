<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $table = 'user';
	
	//rajouter USER_EMAIL
	public function add_user($username,$password,$admin)
	{
		$verif = array();
		$verif = $this->get_user($login);
		
		if( !is_string($firstname) OR !is_string($password) OR !is_string($login) OR count($verif)>0){
		return false;
		}
		else {
			return $this->db->set('username',$username)
				->set('password', $password)
				->set('admin', $admin)
				->insert($this->table);
		}
	}
	
	public function count()
	{
		return $this->db->count_all($this->table);
	}
	
	public function remove_user()
	{
		
	}
	
	public function edit_user()
	{
		
	}
	
	public function is_admin($username) {
		$users = $this->db->select('admin')
				->from($this->table)
				->where('username', $username)
				->limit(1)
				->get()
				->result();
		foreach ($users as $user) {
			return $user->admin;
		}
	}
	
	public function list_users($nb = 10, $debut = 0)
	{
		return $this->db->select('*')
				->from($this->table)
				->limit($nb, $debut)
				->order_by('username')
				->get()
				->result();
	}
	
	public function get_user($username)
	{
		$users = $this->db->select('*')
				->from($this->table)
				->where('username', $username)
				->limit(1)
				->get()
				->result();
                return $users[0];
	}
}