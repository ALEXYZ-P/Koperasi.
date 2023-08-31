<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pegawai_model extends CI_Model
{
	//Dapaag
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
	public $pekerjaan;
	public $tanggal;
	public $level;


	public function insert_user($data) {
        $this->db->insert('user', $data);
    }



	/** 
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
	*/

	public function getstaff(){
		$this->db->where('level', 'staff'); // Tambahkan kondisi untuk level
		$query = $this->db->get('user');
		return $query->result();

	}

	/*public function move($data) {
        $this->db->insert('trash', $data);
    }*/

    public function delete($id) {
        $this->db->delete('user', array('id_user' => $id));
    }

    public function getById($id) {
        return $this->db->get_where('user', array('id_user' => $id))->row();
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
				'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
        		'username' => $this->input->post('username'),
        		'password' => md5($this->input->post('password')), 
				'nia' => $this->input->post('nia'),
        		'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
        		'tempat_lahir' => $this->input->post('tempat_lahir'),
        		'birthday' => $this->input->post('birthday')
		);

		$this->db->where('id_user', $id);
	    $this->db->update('staff', $data); // Untuk mengeksekusi perintah update data
	}

	// Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
	public function delete_user($id) {
		$this->db->where('id_user', $id);
		$this->db->delete('user');
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
