<?php 
class Users_model extends CI_Model
{
	public function insert_new_user($insert_data)
	{
		return $this->db->insert('user', $insert_data);
	}
	public function get_email($email)
	{
		return $this->db->where('email', $email)
						->get('user')
						->row_array();
	}
}


?>