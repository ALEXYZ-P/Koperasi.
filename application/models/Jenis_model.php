<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Jenis_model extends CI_Model
{
	
	private $_table= "jenis_tabungan";

	public $id_jenis_tabungan;
	public $nama_jenis_tabungan;
	
	

	

	public function rules()
	{
		return [
			['field' => 'id_jenis_tabungan',
			'label' => 'id_jenis_tabungan',
			'rules' => 'required'],

			['field' => 'nama_jenis_tabungan',
			'label' => 'nama_jenis_tabungan',
			'rules' => 'required']

		];
	}

	public function getALL(){
		
		return $this->db->get($this->_table)->result();
	}  

	// Bagian kode lainnya...
}

?>
