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
    return $this->session->userdata('level') === 'admin';
	}

    private function is_staff() {
        return $this->session->userdata('level') === 'staff'; 
        }

	private function is_member() {
	return $this->session->userdata('level') === 'member'; 
			}


	public function index()
	
	{   
		
    if($this->session->userdata('authenticated')) {
        if($this->is_admin()) {
            redirect('Dashboard_controller');
        } else if($this->is_staff()) {  
            redirect('Dashboard_controller/staff');
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
    $staff = $this->User_model->get_by_username_and_role($username, 'staff');
    $member = $this->User_model->get_by_username_and_role($username, 'member');

    if(!empty($admin) && $password == $admin->password) {
        $session = array(
            'authenticated' => true,
            'username' => $admin->username,
            'nama' => $admin->nama,
            'id_user' => $admin->id_user,
            'nia' => $admin->nia,
            'jenis_kelamin' => $admin->jenis_kelamin,
            'alamat' => $admin->alamat,
            'tanggal' => $admin->tanggal,
            'birthday' => $admin->birthday,
            'tempat_lahir' => $admin->tempat_lahir,
            'email' => $admin->email,
            'nohp' => $admin->nohp,
            'level' => 'admin'
        );
        $this->session->set_userdata($session);
        redirect('Dashboard_controller', $admin);

    } elseif(!empty($staff) && $password == $staff->password) {
        $session = array(
            'authenticated' => true,
            'username' => $staff->username,
            'nama' => $staff->nama,
            'id_user' => $staff->id_user,
            'nia' => $staff->nia,
            'jenis_kelamin' => $staff->jenis_kelamin,
            'alamat' => $staff->alamat,
            'tanggal' => $staff->tanggal,
            'birthday' => $staff->birthday,
            'tempat_lahir' => $staff->tempat_lahir,
            'email' => $staff->email,
            'nohp' => $staff->nohp,
            'level' => 'staff'
        );
        $this->session->set_userdata($session);
        redirect('Dashboard_controller/staff', $staff);

    }elseif(!empty($member) && $password == $member->password) {
        $session = array(
            'authenticated' => true,
            'username' => $member->username,
            'nama' => $member->nama,
            'id_user' => $member->id_user,
            'nia' => $member->nia,
            'jenis_kelamin' => $member->jenis_kelamin,
            'alamat' => $member->alamat,
            'tanggal' => $member->tanggal,
            'birthday' => $member->birthday,
            'tempat_lahir' => $member->tempat_lahir,
            'email' => $member->email,
            'nohp' => $member->nohp,
            'level' => 'member'
        );
        $this->session->set_userdata($session);
        redirect('Dashboard_controller/member', $member);

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