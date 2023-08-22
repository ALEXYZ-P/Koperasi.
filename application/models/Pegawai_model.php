<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pegawai_model extends CI_Model
{
	
	private $_table= "user";

	public $id_user;
	public $email;
	public $nohp;
	public $username;
	public $password;
	public $nia;
	public $nama;
	public $jenis_kelamin;
	public $agama;
	public $tempat_lahir;
	public $birthday;
	public $alamat;
	public $pekkerjaan;
	public $tanggal;
	public $level;

	public function rules()
	{
		return [
			['field' => 'email',
			'label' => 'email',
			'rules' => 'required'],

			['field' => 'nohp',
			'label' => 'nohp',
			'rules' => 'required'],

			['field' => 'username',
			'label' => 'username',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'password',
			'rules' => 'required'],

			['field' => 'nia',
			'label' => 'nia',
			'rules' => 'required'],

			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required'],

			['field' => 'jenis_kelamin',
			'label' => 'jenis_kelamin',
			'rules' => 'required'],

			['field' => 'agama',
			'label' => 'agama',
			'rules' => 'required'],

			['field' => 'tempat_lahir',
			'label' => 'tempat_lahir',
			'rules' => 'required'],

			['field' => 'birthday',
			'label' => 'birthday',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'alamat',
			'rules' => 'required'],

			['field' => 'pekerjaan',
			'label' => 'pekerjaan',
			'rules' => 'required'],
		];
	}

	public function getAll(){
		$this->db->where('level', 'staff'); // Tambahkan kondisi untuk level
		return $this->db->get($this->_table)->result();
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id_user" => $id])->row();
	}

	public function save($user_data) {
		$this->email = $user_data['email'];
		$this->nohp = $user_data['nohp'];
		$this->username = $user_data['username'];
		$this->password = $user_data['password'];
		$this->nia = $user_data['nia'];
		$this->nama = $user_data['nama'];
		$this->jenis_kelamin = $user_data['jenis_kelamin'];
		$this->agama = $user_data['agama'];
		$this->tempat_lahir = $user_data['tempat_lahir'];
		$this->birthday = $user_data['birthday'];
		$this->alamat = $user_data['alamat'];
		$this->pekerjaan = $user_data['pekerjaan'];
		$this->level = $user_data['level'];
	
		
		$this->db->insert('_table', $this);
	}
	
	
	public function update($id){
		$data = array(
			"nik" => $this->input->post('nia'),
			"nama" => $this->input->post('nama'),
			"alamat" => $this->input->post('alamat'),
			"nohp" => $this->input->post('nohp')
		);

		$this->db->where('id_user', $id);
	    $this->db->update('staff', $data); // Untuk mengeksekusi perintah update data
	}

	// Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
	public function delete($id){
		$this->db->where('id_user', $id);
    $this->db->delete('user'); // Untuk mengeksekusi perintah delete data
	}

	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
		$this->db->insert_batch('pegawai', $data);
	}
}
?>
