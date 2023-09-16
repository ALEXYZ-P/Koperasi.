<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author inogalwargan
*/

class Pinjaman_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Member_model");
        $this->load->model("Pinjaman_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["user"] = $this->Member_model->getAll();
        $data["pinjaman"] = $this->Pinjaman_model->getALL();
        $this->load->view("pinjaman/lihat_pinjaman", $data);
    }

    public function detail($id){
        // $data['anggota'] = $this->SimpananWajib_model->detail_simpanan_pokokall();
        $data['simpanan_wajib'] = $this->SimpananWajib_model->detail_simpanan_wajib($id);
        $data['tot'] = $this->SimpananWajib_model->total_simpanan_wajib($id);
        $this->load->view("simpanan_wajib/detail_simpanan_wajib", $data);
    }

    public function add() {  
        $data['users'] = $this->Member_model->get_users();
    
        $this->form_validation->set_rules('jumlah_pinjaman', 'jumlah_pinjaman', 'required|numeric');
        $validation = $this->form_validation;
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, show the form again with errors
            $this->load->view('pinjaman/tambah_pinjaman', $data); // Pass $data to the view
        } else {
            
            // Validation passed, insert data into the "pinjaman" table
            $pinjaman_data = array( // Use a different variable name
                'id_user' => $this->input->post('id_user'),
                'no_pinjaman' => $this->input->post('no_pinjaman'),
                'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
                'lama' => $this->input->post('lama'),
                'bunga' => $this->input->post('bunga')
            );

            $cicilan = ($pinjaman_data['jumlah_pinjaman'] / $pinjaman_data['lama']) + (($pinjaman_data['jumlah_pinjaman'] * $pinjaman_data['bunga'] / 100) / $pinjaman_data['lama']);
            $pinjaman_data['cicilan'] = $cicilan;

            $total_pinjaman = $pinjaman_data['cicilan'] * $pinjaman_data['lama'];
            $pinjaman_data['total_peminjaman'] = $total_pinjaman;
    
            $this->Pinjaman_model->insert_pinjaman($pinjaman_data); 
            
            $this->session->set_flashdata('success', 'Pinjaman added successfully');
            redirect('pinjaman_controller/index');
        }
    }

    public function edit($id){
        $anggota = $this->Member_model; //object model
    	$pinjaman = $this->Pinjaman_model; //object model
        $validation = $this->form_validation; //object validasi
        $validation->set_rules($pinjaman->rules()); //terapkan rules di Member_model.php

        if ($validation->run()) { //lakukan validasi form
            $pinjaman->update($id); // update data
            $this->session->set_flashdata('success', 'Data Pinjaman Sebesar Rp. '.$pinjaman->getById($id)->jumlah_pinjaman.' Berhasil Diubah');
            redirect($_SERVER ['HTTP_REFERER']);

        }
         // $data['anggota'] = $this->Member_model->getById($id);
     
        $data['pinjaman'] = $this->Pinjaman_model->getById($id);
        $this->load->view('pinjaman/edit_pinjaman', $data);
    }

    // public function hide($id){
    // 	$this->Member_model->update($id);
    // 	$this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
    // 	redirect('Anggota_controller/index');
    // }

            // Pinjaman_controller.php

// Add this method to display the "Tambah Angsuran" page
    public function tambah_angsuran($id_pinjaman) {
        // Load the Pinjaman_model to fetch loan details
        $this->load->model('Pinjaman_model');
        $loan_data = $this->Pinjaman_model->get_loan_details($id_pinjaman);

        // Load a view for adding angsuran (payment)
        $data['loan_data'] = $loan_data;
        $this->load->view('angsuran/tambah_angsuran', $data);
    }

    // Add this method to process the payment data
    public function proses_angsuran() {
        $this->load->model('Pinjaman_model');

        // Get input data from the form
        $id_pinjaman = $this->input->post('id_pinjaman');
        $no_angsuran = $this->input->post('no_angsuran');
        $jumlah_angsuran = $this->input->post('jumlah_angsuran');

        // Process the payment (deduct from total_peminjaman)
        $this->Pinjaman_model->process_payment($id_pinjaman, $jumlah_angsuran);

        // You can add a success message to the session here if needed
        
        // Redirect to the page with the list of loans
        redirect('Angsuran_controller/index'); // Change this to the appropriate URL
    }


    public function delete($id){
	    $this->Pinjaman_model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
	    $this->session->set_flashdata('success', 'Data Pinjaman Berhasil Dihapus');
	    redirect($_SERVER['HTTP_REFERER']);
	}
}
