<?php defined('BASEPATH') OR exit('No direct script access allowed');


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

    public function mv()
    {
    	$id_user = $this->session->userdata('id_user');

        $data["user"] = $this->Member_model->getAll();
        $data["pinjaman"] = $this->Pinjaman_model->getPinjamanByIdMember($id_user);
        $data["angsuran"] = $this->Angsuran_model->getALL();
        $this->load->view("angsuran/ci_member", $data);
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



	public function add() {
    $data['pinjaman'] = $this->Pinjaman_model->getAll();

    // Tangkap id_pinjaman dari input form
    $id_pinjaman = $this->input->post('id_pinjaman');
    
    
    if ($id_pinjaman) {
        // Jika id_pinjaman terpilih, ambil id_user yang terkait
        $data['id_user'] = $this->Pinjaman_model->getIdUserByPinjaman($id_pinjaman);
    } else {
        // Jika id_pinjaman belum terpilih, inisialisasi $data['id_user']
        $data['id_user'] = array();
    }

    $this->form_validation->set_rules('jumlah_angsuran', 'Jumlah Angsuran', 'required|numeric');
	$this->form_validation->set_rules('no_angsuran', 'Loan Number', 'required|is_unique[angsuran.no_angsuran]');
    $validation = $this->form_validation;

    if ($this->form_validation->run() === FALSE) {
        // Validasi gagal, tampilkan form dengan error
        $this->load->view('angsuran/tambah_angsuran', $data);
    } else {
        // Validasi berhasil, masukkan data ke tabel "angsuran"
        $angsuran_data = array(
            'id_pinjaman' => $this->input->post('id_pinjaman'),
            'id_user' => $this->input->post('id_user'),
            'no_angsuran' => $this->input->post('no_angsuran'),
            'jumlah_angsuran' => $this->input->post('jumlah_angsuran')
        );

        $this->Angsuran_model->insert_angsuran($angsuran_data);

        $this->session->set_flashdata('success', 'Installments have been added successfully.');
        redirect('Angsuran_controller/index');
    }
}

	public function get_id_user() {
    $id_pinjaman = $this->input->post('id_pinjaman');
    $id_user_options = $this->Pinjaman_model->getIdUserByPinjaman($id_pinjaman);

    // Kembalikan data ID User dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($id_user_options);
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

	public function tambah_angsuran($id_pinjaman)
{
    // Anda dapat mengambil data pinjaman berdasarkan $id_pinjaman
    $data['pinjaman'] = $this->Pinjaman_model->get_loan_details($id_pinjaman);

    // Memuat halaman "Tambah Angsuran" dengan data pinjaman
    $this->load->view('angsuran/tambah_angsuran', $data);
}


	public function proses_pembayaran() {
    // Ambil data dari formulir
    $id_pinjaman = $this->input->post('id_pinjaman');
    $no_angsuran = $this->input->post('no_angsuran');
    $jumlah_angsuran = $this->input->post('jumlah_angsuran');

    // Simpan data pembayaran ke dalam tabel angsuran
    $this->Angsuran_model->process_payment($id_pinjaman, $no_angsuran, $jumlah_angsuran);

    // Redirect ke halaman yang sesuai, misalnya halaman "Lihat Pinjaman"
    redirect('Angsuran_controller/index');
}



}