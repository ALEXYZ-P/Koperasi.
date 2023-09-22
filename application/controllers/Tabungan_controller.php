<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author inogalwargan
*/

class Tabungan_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Tabungan_model");
        $this->load->model("Member_model");
        $this->load->model("Jenis_model");
        
        
    }

    public function index()
    {
        $data["tabungan"] = $this->Member_model->getAll();
        $data["user"] = $this->Member_model->getAll();
        $data["tabungan"] = $this->Tabungan_model->getAll();
        $data["jenis_tabungan"] = $this->Jenis_model->getAll();
        $this->load->view("tabungan/lt_admin", $data);
    }

    public function mv()
    {
        $id_user = $this->session->userdata('id_user');

        $data["user"] = $this->Member_model->getAll();
        $data["tabungan"] = $this->Tabungan_model->getTabunganByIdMember($id_user);
        $data["jenis_tabungan"] = $this->Jenis_model->getAll();
        $this->load->view("tabungan/lihat_tabungan", $data);
    }

    public function detail($id){
        // $data['anggota'] = $this->SimpananPokok_model->detail_simpanan_pokokall();
        $data['tot'] = $this->Tabungan_model->total_tabungan($id);
        $data['tabungan'] = $this->Tabungan_model->detail_tabungan($id);
        $this->load->view("tabungan/detail_tabungan", $data);
    }

    /**public function insertTabungan() {
        $this->load->view('tabungan/tambah_tabungan');
        $id_user = $this->input->post('id_user');
        $jumlah_tabungan = $this->input->post('jumlah_tabungan');
        $id_jenis_tabungan = $this->input->post('id_jenis_tabungan');

        $nama_user = $this->Member_model->getUserNameById($id_user);
        $jenis_tabungan = $this->Tabungan_model->getJenisTabunganNameById($id_jenis_tabungan);

        if ($nama_user && $jenis_tabungan) {
            $data = array(
                'id_user' => $id_user,
                'jumlah_tabungan' => $jumlah_tabungan,
                'id_jenis_tabungan' => $id_jenis_tabungan
            );

            if ($this->Tabungan_model->insertTabungan($data)) {
                echo "Data tabungan berhasil disimpan.";
                redirect('Tabungan_controller/index');
            } else {
                echo "Gagal menyimpan data tabungan.";
            }
        } else {
            echo "ID user atau ID jenis tabungan tidak valid.";
        }
        $this->load->view('tabungan/tambah_tabungan');
    }
    */

    

    

    public function add() {  
        $data['users'] = $this->Member_model->get_users();
        $data['jenis_tabungan'] = $this->Tabungan_model->get_jenis_tabungan();
    
        $this->form_validation->set_rules('jumlah_tabungan', 'Jumlah Tabungan', 'required|numeric');
        $validation = $this->form_validation;
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, show the form again with errors
            $this->load->view('tabungan/tambah_tabungan', $data); // Pass $data to the view
        } else {
            
            // Validation passed, insert data into the "tabungan" table
            $tabungan_data = array( // Use a different variable name
                'id_user' => $this->input->post('id_user'),
                'jumlah_tabungan' => $this->input->post('jumlah_tabungan'),
                'id_jenis_tabungan' => $this->input->post('id_jenis_tabungan')
            );
    
            $this->Tabungan_model->insert_tabungan($tabungan_data); 
            
            $this->session->set_flashdata('success', 'Savings have been added successfully.');
            redirect('tabungan_controller/index');
        }
    }
    
    

    /**public function add()
    {
        $data['users'] = $this->Member_model->get_users();
        $data['jenis_tabungan'] = $this->Tabungan_model->get_jenis_tabungan();

        if ($this->input->post('submit')) {
            $validation = $this->form_validation;

            if ($this->form_validation->run()) {
                $insert_data = array(
                    'id_user' => $this->input->post('id_user'),
                    'jumlah_tabungan' => $this->input->post('jumlah_tabungan'),
                    'id_jenis_tabungan' => $this->input->post('id_jenis_tabungan')
                );

                $this->Tabungan_model->insert_tabungan($insert_data);
                $this->session->set_flashdata('success', 'Data tabungan berhasil ditambahkan');
                redirect('Tabungan_controller/index');
            }
        }

        $this->load->view('tabungan/tambah_tabungan', $data);
    }*/

    public function edit($id){
        $anggota = $this->Member_model; //object model
    	$tabungan = $this->Tabungan_model; //object model
        $validation = $this->form_validation; //object validasi
        $validation->set_rules($simpanan_pokok->rules()); //terapkan rules di Member_model.php

        if ($validation->run()) { //lakukan validasi form
            $simpanan_pokok->update($id); // update data
            $this->session->set_flashdata('success', 'Data Simpanan Pokok Sebesar Rp. '.$tabungan->getById($id)->jumlah.' Berhasil Diubah');
            redirect($_SERVER ['HTTP_REFERER']);

        }
        $data['tabungan_pokok'] = $this->Tabungan_model->getById($id);
        $this->load->view('tabungan/edit_tabungan', $data);
    }

    public function hide($id){
    	$this->Member_model->update_saving($id);
    	$this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
    	redirect('Anggota_controller/index');
    }

    public function delete($id){
	    $this->Tabungan_model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
	    $this->session->set_flashdata('success', 'Data Simpanan Pokok Berhasil Dihapus');
	    redirect($_SERVER['HTTP_REFERER']);
	}
}