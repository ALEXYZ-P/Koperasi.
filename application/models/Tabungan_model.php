<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Tabungan_model extends CI_Model
{
	
	private $_table= "user";

	public $id_user;
	public $nia;
	public $nama;
	public $jenis_kelamin;
	public $alamat;
	public $nohp;

	public function get($username){
		$this->db->where('username', $username);
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		$result = $this->db->get('anggota')->row();
		return $result;
	}

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
			'rules' => 'required']
		];
	}

	public function getALL(){
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		return $this->db->get($this->_table)->result();
	}

	// Bagian kode lainnya...
}

?>
