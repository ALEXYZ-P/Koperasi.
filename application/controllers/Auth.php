<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Register_model');
		$this->load->library('form_validation');
	}
	private function is_admin() {
    return $this->session->userdata('level') === 'admin'; // Ganti 'admin' dengan peran (role) yang sesuai untuk pengguna admin
	}

	private function is_member() {
	return $this->session->userdata('level') === 'member'; 
			}


	public function index()
	
	{   
		
    if($this->session->userdata('authenticated')) {
        if($this->is_admin()) {
            redirect('Dashboard_controller');
        } else if($this->is_member()) {
            redirect('Dashboard_controller/anggota');
        }
    } else {
        $this->load->view("admin/login");
    }
}

	

	public function login() {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password')); // Mengenkripsi kata sandi menggunakan MD5

    $admin = $this->User_model->get_by_username_and_role($username, 'admin');
    $member = $this->User_model->get_by_username_and_role($username, 'member');

    if(!empty($admin) && $password == $admin->password) {
        $session = array(
            'authenticated' => true,
            'username' => $admin->username,
            'nama' => $admin->nama,
            'id_user' => $admin->id_user,
            'alamat' => $admin->alamat,
            'tanggal' => $admin->tanggal,
            'email' => $admin->email,
            'nohp' => $admin->nohp,
            'level' => 'admin'
        );
        $this->session->set_userdata($session);
        redirect('Dashboard_controller', $admin);
    } elseif(!empty($member) && $password == $member->password) {
        $session = array(
            'authenticated' => true,
            'username' => $member->username,
            'nama' => $member->nama,
            'id_user' => $member->id_user,
            'alamat' => $member->alamat,
            'tanggal' => $member->tanggal,
            'email' => $member->email,
            'nohp' => $member->nohp,
            'level' => 'member'
        );
        $this->session->set_userdata($session);
        redirect('Dashboard_controller/anggota', $member);
    } else {
        $this->session->set_flashdata('message', 'Username atau password salah');
        redirect('Auth');
    }
}




	public  function  logout(){
		$this->session->sess_destroy();
		redirect('Auth');
	}

}


/* End of file Controllername.php */