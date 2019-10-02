<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulis extends CI_Controller {

	public function index()
	{
		$data['title']			=	'Halaman Notulis » Dashboard';
		$data['list_acara']		=	$this->madmin->list_acara();
		$data['list_notulen']	=	$this->madmin->notulen();
		$data['content']		=	'notulis/data/dashboard';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Change Data Diri
	public function cg_data($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'nama','Nama','required',
							array(	'required'	=>	'Field Nama tidak valid atau belum diisi.'));
		$valid->set_rules(	'alamat','Alamat','required',
							array(	'required'	=>	'Field Alamat tidak valid atau belum diisi.'));
		$valid->set_rules(	'no_telp','Nomor Telepon','required',
							array(	'required'	=>	'Field Nomor Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'email','Email','required|valid_email',
							array(	'required'		=>	'Field email belum diisi.',
									'valid_email'	=>	'Email tidak valid!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Diri',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'notulis/data/cg_data'
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'nama'					=>	$i->post('nama'),
							'alamat'				=>	$i->post('alamat'),
							'no_telp'				=>	$i->post('no_telp'),
							'email'					=>	$i->post('email'),
						);

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('notulis','refresh');
		}
	}

	//Change Password
	public function cg_password($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'password','Password Baru','required|min_length[3]',
							array(	'required'		=>	'Field Password Baru tidak valid atau belum diisi.',
									'min_length'	=>	'Password minimal 3 karakter!'));
		$valid->set_rules(	'passconf','Konfirmasi Password','required|min_length[3]|matches[password]',
							array(	'required'		=>	'Mohon konfirmasi password baru anda.',
									'min_length'	=>	'Password minimal 3 karakter!',
									'matches'		=>	'Konfirmasi password tidak cocok!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Password',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'notulis/data/cg_password'
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'password'				=>	sha1($i->post('passconf'))
						);

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Password berhasil diupdate.');
			redirect('notulis','refresh');
		}
	}

	//List Acara
	public function list_acara()
	{
		$data['title']		=	'Halaman Notulis » List Acara';
		$data['list']		=	$this->madmin->list_acara();
		$data['content']	=	'notulis/data/list_acara';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Create Acara
	public function create_acara()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju tidak valid atau belum diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat tidak valid atau belum diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Tambah Data Acara',
						'content'	=>	'notulis/data/create_acara'
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
								'pengaju'		=>	$i->post('pengaju'),
								'tempat'		=>	$i->post('tempat'),
								'tanggal'		=>	$i->post('tanggal'),
								'pukul'			=>	$i->post('pukul'),
								'acara'			=>	$i->post('acara'),
							);

			$this->madmin->add_acara($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil ditambahkan.');
			redirect('notulis/list_acara','refresh');
		}
	}

	//Update Acara
	public function update_acara($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'pengaju','Pengaju','required',
							array(	'required'	=>	'Field Pengaju tidak valid atau belum diisi.'));
		$valid->set_rules(	'tempat','Tempat','required',
							array(	'required'	=>	'Field Tempat tidak valid atau belum diisi.'));
		$valid->set_rules(	'pukul','Pukul','required',
							array(	'required'	=>	'Field Pukul Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'acara','Acara','required',
							array(	'required'		=>	'Field Acara belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Acara',
						'content'	=>	'notulis/data/update_acara',
						'show'		=>	$this->madmin->detail_acara($id)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
								'id'			=>	$i->post('id'),
								'pengaju'		=>	$i->post('pengaju'),
								'tempat'		=>	$i->post('tempat'),
								'tanggal'		=>	$i->post('tanggal'),
								'pukul'			=>	$i->post('pukul'),
								'acara'			=>	$i->post('acara'),
								'status'		=> 	''
							);
			$data = array('id_acara' => $id);
			$this->madmin->update_acara($values);
			$this->madmin->delete_undangan($data);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate. <strong>Catatan:</strong> Silahkan undang kembali peserta, dikarenakan data acara telah diubah.');
			redirect('notulis/list_acara','refresh');
		}
	}

	//Delete Acara
	public function delete_acara($id)
	{
		$data 	= array('id' 			=> 	$id);
		$values	= array('id_acara'		=>	$id);
		$this->madmin->delete_acara($data);
		$this->madmin->delete_undangan($values);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect('notulis/list_acara','refresh');
	}

	//Detail Acara
	public function detail_acara($id)
	{
		$detail = $this->madmin->detail_acara($id);
		$data = array(	'title' 	=> 	'Halaman Notulis » Detail Acara',
						'show'		=>	$detail,
						'content'	=>	'notulis/data/detail_acara'
					);
		$this->load->view('notulis/layouts/app', $data);
	}

	//Kirim Undangan
	public function send_invite($id)
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'undangan[]','Undangan','required',
							array(	'required'	=>	'Field Undangan tidak valid atau belum diisi.'));

		if($valid->run()==FALSE){

			$data['show']		=	$this->madmin->detail_acara($id);
			$data['umum']		=	$this->madmin->peserta_umum();
			$data['akademik']	=	$this->madmin->peserta_akademik();
			$data['dosen']		=	$this->madmin->peserta_dosen();
			$data['bem']		=	$this->madmin->peserta_bem();
			$data['title']		=	'Halaman Notulis » Kirim Undangan';
			$data['content']	=	'notulis/data/send_invite';
			$this->load->view('notulis/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('notulis/data/undangan', $data, TRUE));
		    $dompdf->setPaper('A4', 'landscape');
		    $dompdf->render();
		    $output = $dompdf->output();
		    file_put_contents('assets/files/Undangan Rapat '.date('d-m-Y').'.pdf', $output);

		} else {

			$data 	= 	array();
			$count 	=	count($this->input->get_post('undangan'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'id_acara'		=>	$this->input->post('id'),
								'email_peserta'	=>	$this->input->post('undangan')[$i],
								'status'		=>	'Diundang'
							);	

			$config = Array(
			  'protocol' 	=> 'smtp',
			  'smtp_host' 	=> 'ssl://smtp.googlemail.com',
			  'smtp_port' 	=> 465,
			  'smtp_user' 	=> 'rzkyirmwn@gmail.com',
			  'smtp_pass' 	=> 'kancho1234',
			  'mailtype' 	=> 'html',
			  'charset' 	=> 'iso-8859-1',
			  'wordwrap' 	=> TRUE
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from($this->session->userdata('email'), $this->session->userdata('nama'));
			$this->email->to($data[$i]['email_peserta']);
			$this->email->subject('Undangan Rapat');
			$this->email->message('Berikut terlampir undangan rapat.');
			$this->email->attach('./assets/files/Undangan Rapat '.date('d-m-Y').'.pdf');
			$this->email->send();
			
			}

			unlink ('./assets/files/Undangan Rapat '.date('d-m-Y').'.pdf');
			$values	=	array(	
								'id'		=>	$this->input->post('id'),
								'status'	=>	'Undangan Terkirim'	
							);

			$this->db->insert_batch('undangan', $data);
			$this->madmin->update_acara($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Undangan berhasil dikirim.');
			redirect('notulis/list_acara','refresh');
		}
	}

	//Rollback Undangan
	public function rollback_invite($id)
	{	
		$values['id']		= $id;
		$values['status']	= '';
		$data 				= array('id_acara' 	=> 	$id);
		$this->madmin->update_acara($values);
		$this->madmin->delete_undangan($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dirollback.');
		redirect('notulis/list_acara','refresh');
	}

	//List Notulen
	public function list_notulen()
	{
		$data['title']		=	'Halaman Notulis » List Notulen';
		$data['list']		=	$this->madmin->notulen();
		$data['content']	=	'notulis/data/list_notulen';
		$this->load->view('notulis/layouts/app', $data, FALSE);
	}

	//Create Notulen
	public function create_notulen($id)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'isi','Isi','required',
							array(	'required'	=>	'Field Isi Notulen tidak valid atau belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Tambah Data Notulen',
						'content'	=>	'notulis/data/create_notulen',
						'kodeauto'	=>	$this->madmin->kode_notulen(),
						'invited'	=>	$this->madmin->invited($id),
						'show'		=>	$this->madmin->detail_acara($id)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {

			//Multiple Gambar
			if(!empty($_FILES['gambar']['name'])){
				$filesNumber	=	sizeof($_FILES['gambar']['tmp_name']);
				$files 			=	$_FILES['gambar'];
				$config['upload_path']          = './assets/img/dokumentasi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['encrypt_name']			= true;

				for ($i = 0; $i < $filesNumber ; $i++) {
					$_FILES['gambar']['name']		=	$files['name'][$i];
					$_FILES['gambar']['type']		=	$files['type'][$i];
					$_FILES['gambar']['tmp_name']	=	$files['tmp_name'][$i];
					$_FILES['gambar']['error']		=	$files['error'][$i];
					$_FILES['gambar']['size']		=	$files['size'][$i];

					$this->upload->initialize($config);
					if($this->upload->do_upload('gambar')){
						$data = $this->upload->data();

						$insert[$i]['gambar']		= $data['file_name'];
						$insert[$i]['kode_notulen']	= $this->input->post('kode');
					}
				}

			//Insert Kehadiran
			$data 	= 	array();
			$count 	=	count($this->input->get_post('kehadiran'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array(	'kode_notulen'	=>	$this->input->post('kode'),
								'email_peserta'	=>	$this->input->post('kehadiran')[$i],
								'status'		=>	'Hadir'
							);
			}

			//Insert Notulen
			$values	=	array(	'kode'			=>	$this->input->post('kode'),
								'id_notulis'	=>	$this->input->post('id_notulis'),
								'id_acara'		=>	$this->input->post('id_acara'),
								'isi'			=>	$this->input->post('isi'),
								'status'		=>	'Dibuat'
							);
				$value['id']		= $id;
				$value['status']	= 'Notulen Dibuat';
				$this->db->insert('notulen', $values);
				$this->db->insert_batch('kehadiran', $data);
				$this->db->insert_batch('gambar', $insert);
				$this->madmin->update_acara($value);
				$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Notulen berhasil dibuat.');
				redirect('notulis/list_notulen','refresh');
			}
		}
	}

	//Update Notulen
	public function update_notulen($kode)
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'isi','Isi','required',
							array(	'required'	=>	'Field Isi Notulen tidak valid atau belum diisi.'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Notulis » Edit Data Notulen',
						'content'	=>	'notulis/data/update_notulen',
						'show'		=>	$this->madmin->detail_notulen($kode)
					);
		$this->load->view('notulis/layouts/app', $data);

		//Masuk Database
		} else {
			$values	=	array(	'kode'			=>	$this->input->post('kode'),
								'isi'			=>	$this->input->post('isi')
							);
			$this->madmin->update_notulen($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('notulis/list_notulen','refresh');
		}
	}

	//Delete Notulen
	public function delete_notulen($kode)
	{
		$data 	= array('kode' 			=> 	$kode);
		$values	= array('kode_notulen'	=>	$kode);
		$images	= array('kode_notulen'	=>	$kode);
		$this->madmin->delete_notulen($data);
		$this->madmin->delete_gambar($images);
		$this->madmin->delete_kehadiran($values);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect('notulis/list_notulen','refresh');
	}

	//Detail Notulen
	public function detail_notulen($kode)
	{
		$data = array(	'title' 	=> 	'Halaman Notulis » Detail Notulen',
						'show'		=>	$this->madmin->detail_notulen($kode),
						'images'	=>	$this->madmin->gambar($kode),
						'kehadiran'	=>	$this->madmin->hadir($kode),
						'get_acara'	=>	$this->madmin->get_acara($kode),
						'content'	=>	'notulis/data/detail_notulen'
					);
		$this->load->view('notulis/layouts/app', $data);
	}

	//Send Notulen
	public function send_notulen($kode)
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'kehadiran[]','Kehadiran','required',
							array(	'required'	=>	'Field Kirimkan Ke tidak valid atau belum diisi.'));

		if($valid->run()==FALSE){

			$data['show']		=	$this->madmin->detail_notulen($kode);
			$data['images']		=	$this->madmin->gambar($kode);
			$data['get_acara']	=	$this->madmin->get_acara($kode);
			$data['hadir']		=	$this->madmin->hadir($kode);
			$data['title']		=	'Halaman Notulis » Kirim Notulen';
			$data['content']	=	'notulis/data/send_notulen';
			$this->load->view('notulis/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('notulis/data/notulen', $data, TRUE));
		    $dompdf->setPaper('A4', 'portrait');
		    $dompdf->render();
		    $output = $dompdf->output();
		    file_put_contents('assets/files/Hasil Rapat '.date('d-m-Y').'.pdf', $output);

		} else {

			$data 	= 	array();
			$count 	=	count($this->input->get_post('kehadiran'));
			for ($i = 0; $i < $count; $i++) {
			$data[]	=	array('email_peserta'	=>	$this->input->post('kehadiran')[$i]);	

			$config = Array(
			  'protocol' 	=> 'smtp',
			  'smtp_host' 	=> 'ssl://smtp.googlemail.com',
			  'smtp_port' 	=> 465,
			  'smtp_user' 	=> 'rzkyirmwn@gmail.com',
			  'smtp_pass' 	=> 'kancho1234',
			  'mailtype' 	=> 'html',
			  'charset' 		=> 'iso-8859-1',
			  'wordwrap' 	=> TRUE
			);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from($this->session->userdata('email'), $this->session->userdata('nama'));
			$this->email->to($data[$i]['email_peserta']);
			$this->email->subject('Notulen Rapat');
			$this->email->message('Berikut terlampir notulen rapat.');
			$this->email->attach('./assets/files/Hasil Rapat '.date('d-m-Y').'.pdf');
			$this->email->send();
			
			}

			unlink('./assets/files/Hasil Rapat '.date('d-m-Y').'.pdf');
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Hasil rapat berhasil dikirim.');
			redirect('notulis/list_notulen','refresh');
		}
	}

}

/* End of file Notulis.php */
/* Location: ./application/controllers/Notulis.php */