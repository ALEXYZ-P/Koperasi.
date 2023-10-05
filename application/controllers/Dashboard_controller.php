<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library(array('form_validation','session'));
       	$this->load->helper(array('url','form'));
        $this->load->model("Member_model");
		$this->load->model("Tabungan_model");
		$this->load->model("Jenis_model");
		$this->load->model("pinjaman_model");
    }

	public function index(){
	
		$data['st'] = $this->db->select_sum('jumlah_tabungan')->get('tabungan')->row()->jumlah_tabungan;
		$data['lt'] = $this->db->select_sum('total_peminjaman')->get('pinjaman')->row()->total_peminjaman;
		$data['cm'] = $this->db->from("user")->where('level', 'member')->get()->num_rows();
		$this->load->view("admin/dashboard", $data);
	}

	public function staff(){
		$data['st'] = $this->db->select_sum('jumlah_tabungan')->get('tabungan')->row()->jumlah_tabungan;
		$data['lt'] = $this->db->select_sum('total_peminjaman')->get('pinjaman')->row()->total_peminjaman;
		$data['cm'] = $this->db->from("user")->where('level', 'member')->get()->num_rows();
	
		$this->load->view("admin/staff_dashboard", $data);
	}

	public function member(){
		$id_user = $this->session->userdata('id_user');

		$data['total_savings'] = $this->db->select_sum('jumlah_tabungan')->where('id_user', $id_user)->get('tabungan')->row()->jumlah_tabungan;
		$data['total_debt'] = $this->db->select_sum('total_peminjaman')->where('id_user', $id_user)->get('pinjaman')->row()->total_peminjaman;
		$data['ci'] = $this->db->from("angsuran")->where('id_user', $id_user)->where('id_angsuran')->get()->num_rows();
		$data['cm'] = $this->db->from("user")->where('level', 'member')->get()->num_rows();
		// $total_debt = $this->Pinjaman_model->getTotalDebt($id_user);
		// $data['total_debt'] = $total_debt;

		$this->load->view("admin/member_dashboard", $data);
	}
	
	
}