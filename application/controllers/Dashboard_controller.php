<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_controller extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

}

/* End of file Controllername.php */
