<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Anggota_model extends CI_Model
{
	
	private $_table= "user";

	public $id_user;
	public $username;
	public $nia;
	public $nama;
	public $jenis_kelamin;
	public $alamat;
	public $tanggal;
	public $birthday;
	public $email;
	public $nohp;
	public $tempat_lahir;

	public function insert_user($data) {
        $this->db->insert('user', $data);
    }

	/** 
	public function get($username){
		$this->db->where('username', $username);
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		$result = $this->db->get('user')->row();
		return $result;
	}
	*/

	/** 
	public function rules()
	{
		return [
			['field' => 'nia',
			'label' => 'nia',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required'],

			['field' => 'jenis_kelamin',
			'label' => 'jenis_kelamin',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'alamat',
			'rules' => 'required'],

			['field' => 'tanggal',
			'label' => 'tanggal',
			'rules' => 'required'],

			['field' => 'birthday',
			'label' => 'birthday',
			'rules' => 'required'],

			['field' => 'email',
			'label' => 'email',
			'rules' => 'required'],

			['field' => 'nohp',
			'label' => 'nohp',
			'rules' => 'required']
		];
	}
	*/

	public function getAll(){
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		return $this->db->get($this->_table)->result();
	}
	
	public function get_users() {
			$this->db->where('level', 'member');
			$query = $this->db->get('user');
			return $query->result_array();
		}
	/**public function get_users() {
        $this->db->select('id_user, nama'); // Select only id_user and nama columns
        $query = $this->db->get('user'); // Replace 'user' with your actual table name
        return $query->result();
    }*/

	public function add(){
		$this->db->insert('user', $data);
		
	}
	public function delete($id)
    {
        // Ganti "data_anggota" dengan nama tabel Anda
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

	

	/**public function getUserNameById($id_user) {
        $this->db->select('nama');
        $this->db->where('level', 'member');
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->row()->nama;
        }
        return false;
    }
	*/

}


?>