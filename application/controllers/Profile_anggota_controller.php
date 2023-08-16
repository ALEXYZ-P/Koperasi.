<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_anggota_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation'); 
        // Load the necessary libraries here
        $this->load->library('session');
        $this->load->helper('url'); 
    }

    public function index() {
        $data['user'] = $this->Anggota_model->getAll();
        $this->load->view("dasgota/profile_anggota", $data);
    }

    public function detail($id) {
        $data['anggota'] = $this->Anggota_model->getById($id);
        $this->load->view("dasgota/profile_anggota", $data);
    }

    public function add() {
        $data['nama'] = $this->input->post('nama');
        $data['nia'] = $this->input->post('nia');
        // Add other data assignment here
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run()) {
            // Check for duplicate username and email
            $result1 = $this->Register_model->checkData(['username' => $data['username']]);
            $result2 = $this->Register_model->checkData(['email' => $data['email']]);
            
            if ($result1 > 0 && $result2 > 0) {
                $this->session->set_flashdata('error', 'Oops! Username & Email have been registered.');
            } elseif ($result1 > 0) {
                $this->session->set_flashdata('error', 'Oops! Username has been registered.');
            } elseif ($result2 > 0) {
                $this->session->set_flashdata('error', 'Oops! Email has been registered.');
            } else {
                // Proceed with user registration
                $data['password'] = md5($data['password']);
                $this->Register_model->daftar($data);
                $this->session->set_flashdata('message', 'Registration successful');
            }
        }
        
        $this->load->view('anggota/tambah_anggota');
    }

    // Add other functions (edit, hide, delete) here

}
