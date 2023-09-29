<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Member_model");
		$this->load->model("Tabungan_model");
		$this->load->model("Jenis_model");
    }

	public function index(){
	
		$data['st'] = $this->db->select_sum('jumlah_tabungan')->get('tabungan')->row()->jumlah_tabungan;
		$data['lt'] = $this->db->select_sum('total_peminjaman')->get('pinjaman')->row()->total_peminjaman;
		$data['cm'] = $this->db->from("user")->where('level', 'member')->get()->num_rows();
		$this->load->view("admin/dashboard", $data);
	}

	public function staff(){
	
		$this->load->view("admin/staff_dashboard");
	}

	public function member(){
		$id_user = $this->session->userdata('id_user');

        $data["user"] = $this->Member_model->getAll();
        $data["tabungan"] = $this->Tabungan_model->getTabunganByIdMember($id_user);
        $data["jenis_tabungan"] = $this->Jenis_model->getAll();

		$data['ms'] = $this->db->select_sum('jumlah_tabungan')->get('tabungan')->row()->jumlah_tabungan;
	
		$this->load->view("admin/member_dashboard");
	}
	
	public function countUser()
	{
	 $data['cm'] = $this->Member_model->count_user();
	 $this->load->view('admin/dashboard', $data);
	}
}

/* End of file Controllername.php */