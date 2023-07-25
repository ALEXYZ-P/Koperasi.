<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends MY_Controller {

	public function index()
	{
		$this->load->view("admin/dashboard");
	}

	public function anggota()
	{
		$this->load->view("dasgota/dashboard_anggota");
	}

}

/* End of file Controllername.php */