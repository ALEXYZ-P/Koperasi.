<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Member_model");
    }

	public function index(){
	
		$data['cm'] = $this->db->from("user")->where('level', 'member')->get()->num_rows();
		$this->load->view("admin/dashboard", $data);
	}

	public function staff(){
	
		$this->load->view("admin/staff_dashboard");
	}

	public function member(){
	
		$this->load->view("admin/member_dashboard");
	}
	
	public function countUser()
	{
	 $data['cm'] = $this->Member_model->count_user();
	 $this->load->view('admin/dashboard', $data);
	}
}

/* End of file Controllername.php */