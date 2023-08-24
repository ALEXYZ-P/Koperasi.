<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pegawai_model extends CI_Model
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

	 public function getstaff() {
        $this->db->where('level', 'staff');
        $query = $this->db->get('user');
        return $query->result();
    }

     public function update_user($id_user, $data) {
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }

    public function get_user_by_id($user_id) {
        return $this->db->get_where('user', array('id_user' => $id_user))->row();
    }

	public function add(){
		$this->db->insert('user', $data);
		
	}
	public function delete_user($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

	// Bagian kode lainnya...
}


?>