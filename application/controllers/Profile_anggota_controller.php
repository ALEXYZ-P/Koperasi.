<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* author inogalwargan
*/

class Profile_anggota_controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation'); 
        $this->load->helper('url','form');
    }

    public function index()
    {
        $data['anggota'] = $this->Anggota_model->getAll();
        $this->load->view("dasgota/profile_anggota", $data);
    }

    public function detail($id){

        $anggota = $this->Anggota_model; 
        $data['anggota'] = $this->Anggota_model->getById($id);

        $this->load->view("dasgota/profile_anggota", $data);
    }

    public function add()
    {
        $this->load->library('session');
        $this->load->helper('url'); 
        $this->form_validation->set_rules('nama', 'NAMA','required');
        $data = array(
            'username' => $this->input->post('username'), 
            'email' => $this->input->post('email')  
        );
       $data1 = array('username' => $this->input->post('username') );
       $data2 = array('email' => $this->input->post('email') );
       $this->form_validation->set_rules('password','PASSWORD','required');
      

       $result1 = $this->Register_model->checkData($data1);
       $result2 = $this->Register_model->checkData($data2);

       
       

       if ($result1 > 0 and $result2 > 0) {
            $this->session->set_flashdata('error', '  Oops! Username & Email have been registered.');
        redirect(base_url("login_c/reg"));
        } elseif ($result1 > 0) {
            $this->session->set_flashdata('error', '  Oops! Username have been registered.');
        redirect(base_url("login_c/reg"));
         
        } elseif ($result2 > 0) {
            $this->session->set_flashdata('error', '  Oops! Email have been registered.');
        redirect(base_url("login_c/reg"));

        

        

        }else{

       if($this->form_validation->run() == FALSE) {
           $this->load->view('anggota/tambah_anggotas');
       }else{

        $data['email'] =    $this->input->post('email');

        $data['nohp'] =    $this->input->post('nohp');

        $data['username'] =    $this->input->post('username');

        $data['password'] =    md5($this->input->post('password'));

           $this->Register_model->daftar($data);

        $data['nama'] =    $this->input->post('nama');

        $data['nia'] =    $this->input->post('nia');
           
        $data['tempat_lahir'] =    $this->input->post('tempat_lahir');
           
        $data['birthdays'] =    $this->input->post('birthdays');

        $data['alamat'] =    $this->input->post('alamat');

        $data['jenis_kelamin'] =    $this->input->post('jenis_kelamin');

        $pesan['message'] =    "Pendaftaran berhasil";

           $this->load->view('Profile_anggota_controller/index',$pesan);
          }
        }
      }
        
        
        
        
        
        
        
        
        
        
        
        
        $anggota = $this->Anggota_model;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->save();
            $this->session->set_flashdata('success', 'Tambah Anggota '.$users->nama.' Berhasil Disimpan');
            redirect('Profile_anggota_controller/index');
        }

        $this->load->view("anggota/tambah_anggota");
    }

    public function edit($id){

    	$anggota = $this->Anggota_model; //object model
        $validation = $this->form_validation; //object validasi
        $validation->set_rules($anggota->rules()); //terapkan rules di Anggota_model.php

        if ($validation->run()) { //lakukan validasi form
            $anggota->update($id); // update data
            $this->session->set_flashdata('success', 'Data Anggota '.$anggota->getById($id)->nama.' Berhasil Diubah');
            redirect('Anggota_controller/index');

        }
        $data['anggota'] = $this->Anggota_model->getById($id);
        $this->load->view('anggota/edit_anggota', $data);
    }

    public function hide($id){
    	$this->Anggota_model->update($id);
    	$this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
    	redirect('Anggota_controller/index');
    }

    public function delete($id){
	    $this->Anggota_model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
	    $this->session->set_flashdata('success', 'Data Pegawai Berhasil Dihapus');
	    redirect('Anggota_controller/index');
	}

	
}