<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dasgota_controller extends MY_Controller {

	public function index()
	{
		$this->load->view("dasgota/dashboard_anggota");
	}

}