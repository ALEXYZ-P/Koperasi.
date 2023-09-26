<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pinjaman_model extends CI_Model
{
	
	private $_table= "pinjaman";

	public $id_pinjaman;
	public $id_user;
	public $no_pinjaman;
	public $jumlah_pinjaman;
	public $tanggal_pinjaman;
	public $lama;
	public $bunga;

	public function getALL(){
    return $this->db->get($this->_table)->result_array();
	}

	public function get_pinjaman() {
	return $this->db->get($this->_table)->result();
		}

	public function get_users() {
    // Ambil daftar pengguna dari database
    $query = $this->db->get('user');
    return $query->result();
	}

	public function insert_pinjaman($pinjaman_data) {
        // Attempt to insert data into the "tabungan" table
        $inserted = $this->db->insert('pinjaman', $pinjaman_data);

        return $inserted; // Return true if successful, false otherwise
    }

	public function getPinjamanById($id_user) {
        return $this->db->get_where('pinjaman', array('id_user' => $id_user))->result();
    }

	public function detail_simpanan_wajib($id){
		$this->db->select('*');
        $this->db->from('simpanan_wajib');
        $this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota');
        $this->db->where('anggota.id_anggota', $id);
        $query = $this->db->get();
        return $query->result();
	}

	public function total_simpanan_wajib($id){
		$this->db->select_sum('s.jumlah');
        $this->db->from('simpanan_wajib as s');
        $this->db->join('anggota as a', 's.id_anggota = a.id_anggota');
        $this->db->where('a.id_anggota', $id);
        $query = $this->db->get();
        return $query->result();
	}

	// public function detail_simpanan_pokokall(){
	// 	$this->db->select('*');
 //        $this->db->from('simpanan_wajib');
 //        $this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota');
 //        // $this->db->where('anggota.id_anggota', $id);
 //        $query = $this->db->get();
 //        return $query->result();
	// }

	// public function detail_simpanan_pokok2($id){
	// 	$this->db->select('*');
 //        $this->db->from('simpanan_wajib');
 //        $this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota');
 //        $this->db->where('simpanan_wajib.id_simpanan_pokok', $id);
 //        $query = $this->db->get();
 //        return $query->result();
	// }

	// public function detail_pasangan($id){
	// 	$this->db->select('*');
 //        $this->db->from('pasangan');
 //        $this->db->join('anggota', 'pasangan.id_anggota = anggota.id_anggota');
 //        $this->db->where('anggota.id_anggota', $id);
 //        $query = $this->db->get();
 //        return $query->result();
	// }

	public function getById($id){
		return $this->db->get_where($this->_table, ["id_pinjaman" => $id])->row();
	}
	
	public function update($id){
		$data = array(
			"id_anggota" => $this->input->post('id_anggota'),
			"no_pinjaman" => $this->input->post('no_pinjaman'),
			"jumlah_pinjaman" => $this->input->post('jumlah_pinjaman'),
			"tanggal_peminjaman" => $this->tanggal_dibayar = date('y-m-d'),
			"lama" => $this->input->post('lama'),
			"bunga" => $this->input->post('bunga'),
		);

		$this->db->where('id_pinjaman', $id);
	    $this->db->update('pinjaman', $data); // Untuk mengeksekusi perintah update data
	}

	// Pinjaman_model.php

	// Add this method to fetch loan details
	public function get_loan_details($id_pinjaman) {
	    $this->db->where('id_pinjaman', $id_pinjaman);
	    return $this->db->get('pinjaman')->row();
	}

	// Add this method to process the payment (deduct from total_peminjaman)
	
	


	// public function hide($id){
	// 	$this->db->where('id_anggota', $id);
	// 	$this->_table->update('set_aktif == False');

	// }

	// Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
	public function delete($id){
		$this->db->where('id_pinjaman', $id);
	    $this->db->delete('pinjaman'); // Untuk mengeksekusi perintah delete data
	}
}


?>
