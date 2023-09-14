<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_controller extends MY_Controller
{
	private $filename = "import_data";
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model("Pegawai_model");
    }

    public function index()
    {
        $data["user"] = $this->Pegawai_model->getstaff();
        $this->load->view("pegawai/lihat_pegawai", $data);
    }

	public function add() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $validation = $this->form_validation;
        //$validation->set_rules($user->rules());
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pegawai/tambah_pegawai');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
        		'username' => $this->input->post('username'),
        		'password' => md5($this->input->post('password')),
				'nia' => $this->input->post('nia'),
        		'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
        		'tempat_lahir' => $this->input->post('tempat_lahir'),
        		'birthday' => $this->input->post('birthday'),
                'level' => 'staff' // Set level as 'member'
            );
            
            $this->Pegawai_model->insert_user($data); // Insert data into the database
            $this->session->set_flashdata('success', 'Staff berhasil di hapus');
			redirect('Pegawai_controller/index');
            // You can redirect to a success page or display a success message here
        }
    }
	function edit_data()
	{
		$id_user = $this->uri->segment(3);
		$result = $this->Pegawai_model->get_staff_id($id_user);
		if ($result->num_rows() > 0) {
		$i = $result->row_array();
			$data = array(
				'id_user'		=> $i['id_user'],
				'email'  		=> $i['email'],
				'nohp'     		=> $i['nohp'],
				'username' 		=> $i['username'],
				'password'  	=> $i['password'],
				'nia'     		=> $i['nia'],
				'nama'     		=> $i['nama'],
				'jenis_kelamin' => $i['jenis_kelamin'],
				'alamat'     	=> $i['alamat'],
				'tempat_lahir'  => $i['tempat_lahir'],
				'birthday'    	=> $i['birthday'],
			);
		$this->load->view('pegawai/edit_pegawai', $data);
		} else {
			echo "Data Was Not Found";
		}
	}

	function update()
	{
		$id_user 		= $this->input->post('id_user'); 
		$email 			= $this->input->post('email');
   		$nohp 			= $this->input->post('nohp');
   		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
   		$nia 			= $this->input->post('nia');
   		$nama 			= $this->input->post('nama');
   		$jenis_kelamin 	= $this->input->post('jenis_kelamin');
  		$alamat 		= $this->input->post('alamat');
   		$tempat_lahir 	= $this->input->post('tempat_lahir');
   		$birthday 		= $this->input->post('birthday');
					
		$this->Pegawai_model->update($id_user, $email, $nohp, $username, $password, $nia, $nama, $jenis_kelamin, $alamat, $tempat_lahir, $birthday);
		$this->session->set_flashdata('success', 'Staff berhasil di hapus');
		redirect('Pegawai_controller/index');
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();
			
		if ($this->Pegawai_model->delete($id)) {
			$this->session->set_flashdata('success', 'Staff berhasil di hapus');
			redirect(site_url('Pegawai_controller/index'));
		}
	}

	public function detail($id_user) {
		$id_user = $this->uri->segment(3);
		$result = $this->Pegawai_model->get_staff_id($id_user);

		if ($result->num_rows() > 0) {
			$i = $result->row_array();
			$data = array(
				'id_user'		=> $i['id_user'],
				'email'  		=> $i['email'],
				'nohp'     		=> $i['nohp'],
				'username' 		=> $i['username'],
				'password'  	=> $i['password'],
				'nia'     		=> $i['nia'],
				'nama'     		=> $i['nama'],
				'jenis_kelamin' => $i['jenis_kelamin'],
				'alamat'     	=> $i['alamat'],
				'tempat_lahir'  => $i['tempat_lahir'],
				'birthday'    	=> $i['birthday'],
				'tanggal'		=> $i['tanggal'],
				'level'			=> $i['level']
			);
            $this->load->view("pegawai/detail_pegawai", $data);
        } else {
            echo "staff tidak ditemukan";
        }
        
    }

	


 	/**public function add()
    {s
        $user = $this->Pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pegawai/tambah_pegawai");
    }
*/
    

	/**public function edit($id)
	{
		//mengambil data dari model berdasarkan ID
		$data['user'] = $this->model->get_data($this->table, ['id_user' => $id])->row();
	
		//mengirimkan data user tersebut ke view
		$this->load->view('pegawai/edit_pegawai', $data);
	}

public function update()
{
	if(isset($_POST['edit']))
	{
		//mengambil data email, password, nama, dan id dari client side
		$id_user = $this->input->post('id_user');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nia = $this->input->post('nia');
		$nama = $this->input->post('nama');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$birthday = $this->input->post('birthday');
		
		


		//untuk cek apakah email, password, dan nama sudah terisi
		if($email && $nohp && $username && $password && $nia && $nama && $jenis_kelamin && $alamat && $tempat_lahir && $birthday )
        {
            if(strlen($password) > 3)
            {
                $data = [(
                                    'email'=>$email,
                                    'nohp'=>$nohp,
                                    'username'=>$username,
                                    'password'=>$password,
                                    'nia'=>$nia,
                                    'nama'=>$nama,
                                    'jenis_kelamin'=>$jenis_kelamin,
                                    'alamat'=>$alamat,
                                    'tempat_lahir'=>$tempat_lahir,
                                    'birthday'=>$birthday
                                ];
                
                
                
                				//memanggil function update_data pada model
                				$this->model->update_data($this->table, $data, ['id_user' => $id_user]);
                			}
                		}
                		redirect('Pegawai_controller/index');
                	}
                }
                */
                
                
				
				

	/**public function update($id = null)
    {
        if (!isset($id)) redirect('Pegawai_controller/index');
       
        $user = $this->Pegawai_model;
        $validation = $this->form_validation;
        //$validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("pegawai/edit_pegawai", $data);
    }
	*/

    /**public function update($id){
		$this->load->view('pegawai/edit_pegawai', $data);
    	$user = $this->Pegawai_model; //object model
        $validation = $this->form_validation; //object validasi
        

        if ($validation->run()) { //lakukan validasi form
            $user->update($id); // update data
            $this->session->set_flashdata('success', 'Data Pegawai '.$user->getById($id)->nama.' Berhasil Diubah');
            redirect('Pegawai_controller/index');
        }

        $data['user'] = $this->Pegawai_model->getById($id);
        
    }
	*/

	

	/**public function delete($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    
    if ($this->db->affected_rows() > 0) {
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
    } else {
        // Jika gagal menghapus
        $this->session->set_flashdata('error', 'Gagal menghapus data.');
    }

	
    
    redirect('Pegawai_controller/index');
    }
	*/

	public function form(){
		$data = array(); // Buat variabel $data sebagai array

		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->Pegawai_model->upload_file($this->filename);

			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet;
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->view('pegawai/validasi_import', $data);
	}

	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'id_pegawai'=> uniqid(),
					'nik'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'alamat'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'nohp'=>$row['D'], // Insert data alamat dari kolom D di excel
				));
			}

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->Pegawai_model->insert_multiple($data);

		redirect("Pegawai_controller"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Ino Galwargan')
			->setLastModifiedBy('Ino Galwargan')
			->setTitle("Data Pegawai")
			->setSubject("Pegawai")
			->setDescription("Laporan Semua Data Pegawai")
			->setKeywords("Data Pegawai");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$pegawai = $this->Pegawai_model->getAll();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($pegawai as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nik);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nohp);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Pegawai");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Pegawai.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}
