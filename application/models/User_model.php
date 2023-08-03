<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function get($username){
		$this->db->where('username', $username);
		$result = $this->db->get('user')->row();
	
		// Debugging: print the last executed query
		echo $this->db->last_query();
	
		return $result;
	}

	public function save($data)
    {
        $this->db->insert('nama_tabel_anggota', $data);
        return $this->db->insert_id();
    }

	public function get_by_username_and_role($username, $level) {
    	$this->db->where('username', $username);
    	$this->db->where('level', $level);
    	return $this->db->get('user')->row();
}

}

/* End of file .php */
