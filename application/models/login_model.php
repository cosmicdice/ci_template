<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model
{   
    public function login($username, $password)
    {
        $user = $this->db->select('*')
                ->from('user')
                ->where(array('username' => $username, 'password' => MD5($password)))
                ->limit(1)
                ->get()->result();
        if (empty($user)) {
            return false;
        }
        else
            return $user[0];
    }
    
    public function user_exist($username){
        $user = $this->db->select('*')
                ->from('user')
                ->where(array('username' => $username))
                ->limit(1)
                ->get()->result();
        if (empty($user)) {
            return false;
        }
        else
            return true;
    }
    
    public function create_user($username, $password, $email = '', $admin = 0) {
        if ($this->user_exist($username))
            return false;
        else {
            $user = array('username' => $username, 'password' => MD5($password), 'email' => $email, 'admin' => $admin);
            return (bool) $this->db->set($user)->insert('user');
        }
    }
}