<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author inogalwargan
*/

class Tabungan_anggota_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Member_model");
        $this->load->model("Tabungan_model");
        $this->load->model("Jenis_model");
        $this->load->library('form_validation');
    }
    public function index()
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
    public function add($id)
    {   
        $anggota = $this->Member_model;
        $tabungan = $this->Tabungan_model;
        $validation = $this->form_validation;
        $validation->set_rules($tabungan->rules());
        if ($validation->run()) {
            $simpanan_pokok->save();
            $this->session->set_flashdata('success', 'Tambah Simpanan Sebesar Rp. '.$tabungan->jumlah.' Berhasil Disimpan');
            redirect('Tabungan_controller/index');
        }
        $data['anggota'] = $this->Member_model->getById($id);
        $this->load->view("tabungan/tambah_tabungan", $data);
    }
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
}
?>
