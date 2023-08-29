<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author inogalwargan
*/

class Tabungan_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Tabungan_model");
        $this->load->model("Anggota_model");
        $this->load->model("Jenis_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["tabungan"] = $this->Anggota_model->getAll();
        $data["user"] = $this->Anggota_model->getAll();
        $data["tabungan"] = $this->Tabungan_model->getAll();
        $data["jenis_tabungan"] = $this->Jenis_model->getAll();
        $this->load->view("tabungan/lt_admin", $data);
    }

    public function detail($id){
        // $data['anggota'] = $this->SimpananPokok_model->detail_simpanan_pokokall();
        $data['tot'] = $this->Tabungan_model->total_tabungan($id);
        $data['tabungan'] = $this->Tabungan_model->detail_tabungan($id);
        $this->load->view("tabungan/detail_tabungan", $data);
    }

    public function add(){ 
        $data['users'] = $this->Tabungan_model->get_users();
        $data['jenis_tabungan'] = $this->Tabungan_model->get_jenis_tabungan();

        if ($this->input->post('submit')) {
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'jumlah_tabungan' => $this->input->post('jumlah_tabungan'),
                'id_jenis_tabungan' => $this->input->post('id_jenis_tabungan')
            );

            $this->tabungan_model->insert_tabungan($data);
        }

        $this->load->view('tabungan/tambah_tabungan', $data);
    }

    public function edit($id){
        $anggota = $this->Anggota_model; //object model
    	$tabungan = $this->Tabungan_model; //object model
        $validation = $this->form_validation; //object validasi
        $validation->set_rules($simpanan_pokok->rules()); //terapkan rules di Anggota_model.php

        if ($validation->run()) { //lakukan validasi form
            $simpanan_pokok->update($id); // update data
            $this->session->set_flashdata('success', 'Data Simpanan Pokok Sebesar Rp. '.$tabungan->getById($id)->jumlah.' Berhasil Diubah');
            redirect($_SERVER ['HTTP_REFERER']);

        }
        $data['tabungan_pokok'] = $this->Tabungan_model->getById($id);
        $this->load->view('tabungan/edit_tabungan', $data);
    }

    public function hide($id){
    	$this->Anggota_model->update($id);
    	$this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
    	redirect('Anggota_controller/index');
    }

    public function delete($id){
	    $this->Tabungan_model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
	    $this->session->set_flashdata('success', 'Data Simpanan Pokok Berhasil Dihapus');
	    redirect($_SERVER['HTTP_REFERER']);
	}
}
