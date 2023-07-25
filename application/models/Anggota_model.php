<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Anggota_model extends CI_Model
{
	
	private $_table= "user";

	public $id_user;
	public $nia;
	public $nama;
	public $jenis_kelamin;
	public $alamat;
	public $tanggal;
	public $birthday;
	public $email;
	public $nohp;

	public function get($username){
		$this->db->where('username', $username);
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		$result = $this->db->get('user')->row();
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

	public function getALL(){
		$this->db->where('level', 'member'); // Tambahkan kondisi untuk level
		return $this->db->get($this->_table)->result();
	}
	public function delete($id)
    {
        // Ganti "data_anggota" dengan nama tabel Anda
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

	// Bagian kode lainnya...
}


?>
