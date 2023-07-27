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
	

	

	public function rules()
	{
		return [
			['field' => 'id_user',
			'label' => 'id_user',
			'rules' => 'required'],

			['field' => 'id_tabungan',
			'label' => 'id_tabungan',
			'rules' => 'required'],

			['field' => 'jumlah_tabungan',
			'label' => 'jumlah_tabungan',
			'rules' => 'required'],

			['field' => 'tanggal_tabung',
			'label' => 'tanggal_tabung',
			'rules' => 'required'],

			['field' => 'id_jenis_tabungan',
			'label' => 'id_jenis_tabungan',
			'rules' => 'required']
		];
	}

	public function getALL(){
		
		return $this->db->get($this->_table)->result();
	}

	// Bagian kode lainnya...
}

?>
