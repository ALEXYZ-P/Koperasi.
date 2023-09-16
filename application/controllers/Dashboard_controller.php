<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends MY_Controller {

	public function index()
	{
		$this->load->view("admin/dashboard");
	}

	public function staff()
	{
		$this->load->view("admin/staff_dashboard");
	}

	public function member()
	{
		$this->load->view("admin/member_dashboard");
	}

}

/* End of file Controllername.php */