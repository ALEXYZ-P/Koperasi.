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