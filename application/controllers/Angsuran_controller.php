<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author inogalwargan
 */
class Angsuran_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Member_model");
		$this->load->model("Pinjaman_model");
		$this->load->model("Angsuran_model");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["angsuran"] = $this->Angsuran_model->getALL();
		// var_dump($data);
		$this->load->view("angsuran/lihat_angsuran", $data);
    }

	public function detail($id)
	{
		// $data['anggota'] = $this->SimpananWajib_model->detail_simpanan_pokokall();
		$data['simpanan_wajib'] = $this->SimpananWajib_model->detail_simpanan_wajib($id);
		$data['tot'] = $this->SimpananWajib_model->total_simpanan_wajib($id);
		$this->load->view("simpanan_wajib/detail_simpanan_wajib", $data);
	}

	public function list_anggota()
	{
		$data['anggota'] = $this->Member_model->getAll();
		$this->load->view("angsuran/angsuran_anggota", $data);
	}

	public function listPinjamanAnggota()
	{
		$data["angsuran_anggota"] = $this->Angsuran_model->listPinjamanAnggota();
		$this->load->view("angsuran/list_angsuran_anggota", $data);
	}

	public function add()
	{
		$data['users'] = $this->Member_model->get_users();
    
        $this->form_validation->set_rules('jumlah_angsuran', 'jumlah_angsuran', 'required|numeric');
        $validation = $this->form_validation;
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, show the form again with errors
            $this->load->view('angsuran/tambah_angsuran', $data); // Pass $data to the view
        } else {
            
            // Validation passed, insert data into the "angsuran" table
            $angsuran_data = array( // Use a different variable name
                'id_pinjaman' => $this->input->post('id_pinjaman'),
                'no_angsuran' => $this->input->post('no_angsuran'),
                'jumlah_angsuran' => $this->input->post('jumlah_angsuran')
            );

            $this->Angsuran_model->insert_angsuran($angsuran_data); 
            
            $this->session->set_flashdata('success', 'Pinjaman added successfully');
            redirect('angsuran_controller/index');
        }
		
	}

	public function edit($id)
	{
		$anggota = $this->Member_model; //object model
		$angsuran = $this->Angsuran_model; //object model
		$validation = $this->form_validation; //object validasi
		$validation->set_rules($angsuran->rules()); //terapkan rules di Member_model.php

		if ($validation->run()) { //lakukan validasi form
			$angsuran->update($id); // update data
			$this->session->set_flashdata('success', 'Data Pinjaman Sebesar Rp. ' . $angsuran->getById($id)->jumlah_angsuran . ' Berhasil Diubah');
			redirect($_SERVER ['HTTP_REFERER']);

		}
		// $data['anggota'] = $this->Member_model->getById($id);

		$data['angsuran'] = $this->Angsuran_model->getById($id);
		$this->load->view('angsuran/edit_angsuran', $data);
	}

	// public function hide($id){
	// 	$this->Member_model->update($id);
	// 	$this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
	// 	redirect('Anggota_controller/index');
	// }

	/**
	 * this function for lhat total angsuran yang telah dibayarkan masing2 anggota
	 */

	public function detailAngsuran($id)
	{
		$data["angsuran_detail"] = $this->Angsuran_model->detail_angsuran($id);
		$this->load->view('angsuran/detail_angsuran', $data);
	}

	public function delete($id)
	{
		$this->Angsuran_model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
		$this->session->set_flashdata('success', 'Data Angsuran Berhasil Dihapus');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
