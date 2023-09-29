<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Angsuran_model extends CI_Model
{

	private $_table = "angsuran";

	public $id_pinjaman;
	public $no_angsuran;
	public $jumlah_angsuran;
	public $tanggal;

	public function getALL() {
    $this->db->select('angsuran.*, pinjaman.no_pinjaman, pinjaman.jumlah_pinjaman, pinjaman.tanggal_pinjaman, pinjaman.lama, pinjaman.bunga, user.nama');
    $this->db->from('angsuran');
    $this->db->join('pinjaman', 'angsuran.id_pinjaman = pinjaman.id_pinjaman');
    $this->db->join('user', 'pinjaman.id_user = user.id_user'); // Gabungkan tabel pinjaman dengan tabel user
    $query = $this->db->get();
    return $query->result();
}

	public function getAngsuranByIdPinjam($id_pinjaman){
		$this->db->where('id_pinjaman', $id_pinjaman);
        $query = $this->db->get('angsuran');
        return $query->result();
    }

	 public function get_data_angsuran() {
        return $this->db->get('angsuran')->result_array();
    }

    public function insert_angsuran($data) {
        // Attempt to insert data into the "tabungan" table
        $inserted = $this->db->insert('angsuran', $data);

        return $inserted; // Return true if successful, false otherwise
    }


	/**
	 * @return mixed
	 */
	public function getListAngsuran()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pinjaman', 'user.id_user = pinjaman.id_user');
		$this->db->join('angsuran', 'angsuran.id_pinjaman = pinjaman.id_pinjaman');
		$query = $this->db->get();
		return $query->result();
	}

	public function listPinjamanAnggota()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->join('pinjaman', 'anggota.id_anggota = pinjaman.id_anggota');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_simpanan_wajib($id)
	{
		$this->db->select('*');
		$this->db->from('simpanan_wajib');
		$this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota');
		$this->db->where('anggota.id_anggota', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function total_simpanan_wajib($id)
	{
		$this->db->select_sum('s.jumlah');
		$this->db->from('simpanan_wajib as s');
		$this->db->join('anggota as a', 's.id_anggota = a.id_anggota');
		$this->db->where('a.id_anggota', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_angsuran($id)
	{
		$this->db->select('a.*, p.*, SUM(ag.jumlah_angsuran) as total');
		$this->db->from('anggota as a');
		$this->db->join('pinjaman as p', 'a.id_anggota = p.id_anggota');
		$this->db->join('angsuran as ag', 'p.id_pinjaman = ag.id_pinjaman');
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

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_angsuran" => $id])->row();
	}

	public function update($id)
	{
		$data = array(
			"id_pinjaman" => $this->input->post('id_pinjaman'),
			"no_angsuran" => $this->input->post('no_angsuran'),
			"jumlah_angsuran" => $this->input->post('jumlah_angsuran'),
			"jumlah_angsuran" => $this->input->post('jumlah_angsuran'),
			"tanggal" => $this->tanggal = date('y-m-d'),
		);

		$this->db->where('id_angsuran', $id);
		$this->db->update('angsuran', $data); // Untuk mengeksekusi perintah update data
	}

	public function process_payment($id_pinjaman, $no_angsuran, $jumlah_angsuran) {
    // Insert the payment data into the angsuran table
    $payment_data = array(
        'id_pinjaman' => $id_pinjaman,
        'no_angsuran' => $no_angsuran,
        'jumlah_angsuran' => $jumlah_angsuran,
        // Tambahkan detail pembayaran lainnya jika diperlukan
    );
    $this->db->insert('angsuran', $payment_data);
    // Anda dapat menambahkan pesan sukses ke sesi di sini jika diperlukan

    // Redirect ke halaman dengan daftar pinjaman atau halaman yang sesuai
    redirect('Angsuran_controller/index'); // Ganti ini dengan URL yang sesuai
}


	// public function hide($id){
	// 	$this->db->where('id_anggota', $id);
	// 	$this->_table->update('set_aktif == False');

	// }

	// Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
	public function delete($id)
	{
		$this->db->where('id_angsuran', $id);
		$this->db->delete('angsuran'); // Untuk mengeksekusi perintah delete data
	}

	public function proses_pembayaran($id_pinjaman,$no_angsuran, $jumlah_angsuran) {
    // Insert the payment data into the angsuran table
    $angsuran_data = array(
        'id_pinjaman' => $id_pinjaman,
        'no_angsuran' => $no_angsuran,
        'jumlah_angsuran' => $jumlah_angsuran,
        // Add other payment details as needed
    );
    $this->db->insert('angsuran', $angsuran_data);

    // Lakukan perhitungan atau pembaruan yang diperlukan, seperti mengurangi sisa pinjaman

    // Anda mungkin ingin menambahkan pesan sukses atau pesan kesalahan di sini
}

}


?>
