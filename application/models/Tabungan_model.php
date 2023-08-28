<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Tabungan_model extends CI_Model
{
	
	private $_table= "tabungan";
	public $id_user;
	public $id_tabungan;
	public $jumlah_tabungan;
	public $tanggal_tabung;
	public $id_jenis_tabungan;
	
	public function getALL(){
		
		return $this->db->get($this->_table)->result();
	}

	public function get_users() {
		$this->db->where('level', 'member');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_jenis_tabungan() { 
        $query = $this->db->get('jenis_tabungan');
        return $query->result_array(); 'Alex Gay'
    }

    public function insert_tabungan($data) {
        $this->db->insert('tabungan', $data);
    }

	public function getTabunganByIdMember($id_user){
		$this->db->where('id_user', $id_user);
        $query = $this->db->get('tabungan');
        return $query->result();
}

public function getListJenis(){
		$this->db->select('*');
		$this->db->from('jenis_tabungan');
		$this->db->join('tabugan', 'jenis_tabungan.id_jenis_tabungan = tabungan.id_jenis_tabungan');
		$query = $this->db->get();
		return $query->result();
	}
}

?>