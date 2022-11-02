<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function get_by_username($username) {
       return $this->db->get_where('users', ['username' => $username])->row();
	}

}
