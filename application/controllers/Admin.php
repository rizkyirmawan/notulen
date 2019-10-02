<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$data['title']			=	'Halaman Administrator » Dashboard';
		$data['list_notulis']	=	$this->madmin->list_notulis();
		$data['list_peserta']	=	$this->madmin->list_peserta();
		$data['list_acara']		=	$this->madmin->list_acara();
		$data['list_notulen']	=	$this->madmin->notulen();
		$data['content']		=	'admin/data/dashboard';
		$this->load->view('admin/layouts/app', $data, FALSE);
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Data Diri',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'admin/data/cg_data'
					);
		$this->load->view('admin/layouts/app', $data);

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
			redirect('admin','refresh');
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Password',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'admin/data/cg_password'
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'password'				=>	sha1($i->post('passconf'))
						);

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Password berhasil diupdate.');
			redirect('admin','refresh');
		}
	}

	//List Notulis
	public function list_notulis()
	{
		$data['title']		=	'Halaman Administrator » List Notulis';
		$data['list']		=	$this->madmin->list_notulis();
		$data['content']	=	'admin/data/list_notulis';
		$this->load->view('admin/layouts/app', $data, FALSE);
	}

	//Create Notulis
	public function create_notulis()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'nama','Nama','required',
							array(	'required'	=>	'Field Nama tidak valid atau belum diisi.'));
		$valid->set_rules(	'alamat','Alamat','required',
							array(	'required'	=>	'Field Alamat tidak valid atau belum diisi.'));
		$valid->set_rules(	'no_telp','Nomor Telepon','required',
							array(	'required'	=>	'Field Nomor Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'email','Email','required|is_unique[users.email]|valid_email',
							array(	'required'		=>	'Field email belum diisi.',
									'is_unique'		=>	'Email sudah terdaftar!',
									'valid_email'	=>	'Email tidak valid!'));
		$valid->set_rules(	'password','Password','required|min_length[3]',
							array(	'required'		=>	'Field Password tidak valid atau belum diisi.',
									'min_length'	=>	'Password minimal 3 karakter!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Administrator » Tambah Data Notulis',
						'content'	=>	'admin/data/create_notulis'
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
								'nama'					=>	$i->post('nama'),
								'alamat'				=>	$i->post('alamat'),
								'no_telp'				=>	'+62'.$i->post('no_telp'),
								'email'					=>	$i->post('email'),
								'password'				=>	sha1($i->post('password')),
								'role'					=>	$i->post('role'),
							);

			$this->madmin->add_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil ditambahkan.');
			redirect('admin/list_notulis','refresh');
		}
	}

	//Edit Notulis
	public function update_notulis($id)
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
		$valid->set_rules(	'password','Password','min_length[3]',
							array(	'min_length'	=>	'Password minimal 3 karakter!'));

		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Data Notulis',
						'show'		=>	$this->madmin->detail_notulis($id),
						'content'	=>	'admin/data/update_notulis'
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			if($i->post('password')==''){
				$values			=	array(	
								'id'					=>	$i->post('id'),
								'nama'					=>	$i->post('nama'),
								'alamat'				=>	$i->post('alamat'),
								'no_telp'				=>	$i->post('no_telp'),
								'email'					=>	$i->post('email'),
								'role'					=>	$i->post('role'),
							);
			} else {
				$values			=	array(	
								'id'					=>	$i->post('id'),
								'nama'					=>	$i->post('nama'),
								'alamat'				=>	$i->post('alamat'),
								'no_telp'				=>	$i->post('no_telp'),
								'email'					=>	$i->post('email'),
								'password'				=>	sha1($i->post('password')),
								'role'					=>	$i->post('role'),
							);
			}

			$this->madmin->update_notulis($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('admin/list_notulis','refresh');
		}
	}

	//Delete Notulis
	public function delete_notulis($id)
	{
		$detail = $this->madmin->detail_notulis($id);
		$data = array('id' => $id);
		$this->madmin->delete_notulis($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect('admin/list_notulis','refresh');
	}
	

	//List Peserta
	public function list_peserta()
	{
		$data['title']		=	'Halaman Administrator » List Peserta';
		$data['list']		=	$this->madmin->list_peserta();
		$data['content']	=	'admin/data/list_peserta';
		$this->load->view('admin/layouts/app', $data, FALSE);
	}

	//Create Peserta
	public function create_peserta()
	{
		//Validasi
		$valid 	= 	$this->form_validation;
		
		$valid->set_rules(	'nama','Nama','required',
							array(	'required'	=>	'Field Nama tidak valid atau belum diisi.'));
		$valid->set_rules(	'alamat','Alamat','required',
							array(	'required'	=>	'Field Alamat tidak valid atau belum diisi.'));
		$valid->set_rules(	'no_telp','Nomor Telepon','required',
							array(	'required'	=>	'Field Nomor Telepon tidak valid atau belum diisi.'));
		$valid->set_rules(	'email','Email','required|is_unique[users.email]|valid_email',
							array(	'required'		=>	'Field email belum diisi.',
									'is_unique'		=>	'Email sudah terdaftar!',
									'valid_email'	=>	'Email tidak valid!'));
		if($valid->run()==FALSE){
		//End Validasi

		$data = array(	'title' 	=> 	'Halaman Administrator » Tambah Data Peserta',
						'content'	=>	'admin/data/create_peserta'
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
								'nama'					=>	$i->post('nama'),
								'alamat'				=>	$i->post('alamat'),
								'no_telp'				=>	'+62'.$i->post('no_telp'),
								'email'					=>	$i->post('email'),
								'bagian'				=>	$i->post('bagian'),
							);

			$this->madmin->add_peserta($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil ditambahkan.');
			redirect('admin/list_peserta','refresh');
		}
	}

	//Edit Notulis
	public function update_peserta($id)
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Data Peserta',
						'show'		=>	$this->madmin->detail_peserta($id),
						'content'	=>	'admin/data/update_peserta'
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$i 				=	$this->input;
			$values			=	array(	
							'id'					=>	$i->post('id'),
							'nama'					=>	$i->post('nama'),
							'alamat'				=>	$i->post('alamat'),
							'no_telp'				=>	$i->post('no_telp'),
							'email'					=>	$i->post('email'),
							'bagian'				=>	$i->post('bagian'),
						);

			$this->madmin->update_peserta($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('admin/list_peserta','refresh');
		}
	}

	//Delete Peserta
	public function delete_peserta($id)
	{
		$detail = $this->madmin->detail_peserta($id);
		$data = array('id' => $id);
		$this->madmin->delete_peserta($data);
		$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil dihapus.');
		redirect('admin/list_peserta','refresh');
	}

	//List Acara
	public function list_acara()
	{
		$data['title']		=	'Halaman Administrator » List Acara';
		$data['list']		=	$this->madmin->list_acara();
		$data['content']	=	'admin/data/list_acara';
		$this->load->view('admin/layouts/app', $data, FALSE);
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Tambah Data Acara',
						'content'	=>	'admin/data/create_acara'
					);
		$this->load->view('admin/layouts/app', $data);

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
			redirect('admin/list_acara','refresh');
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Data Acara',
						'content'	=>	'admin/data/update_acara',
						'show'		=>	$this->madmin->detail_acara($id)
					);
		$this->load->view('admin/layouts/app', $data);

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
			redirect('admin/list_acara','refresh');
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
		redirect('admin/list_acara','refresh');
	}

	//Detail Acara
	public function detail_acara($id)
	{
		$detail = $this->madmin->detail_acara($id);
		$data = array(	'title' 	=> 	'Halaman Administrator » Detail Acara',
						'show'		=>	$detail,
						'content'	=>	'admin/data/detail_acara'
					);
		$this->load->view('admin/layouts/app', $data);
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
			$data['title']		=	'Halaman Administrator » Kirim Undangan';
			$data['content']	=	'admin/data/send_invite';
			$this->load->view('admin/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('admin/data/undangan', $data, TRUE));
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
			  'charset' 		=> 'iso-8859-1',
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
			redirect('admin/list_acara','refresh');
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
		redirect('admin/list_acara','refresh');
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Tambah Data Notulen',
						'content'	=>	'admin/data/create_notulen',
						'kodeauto'	=>	$this->madmin->kode_notulen(),
						'invited'	=>	$this->madmin->invited($id),
						'show'		=>	$this->madmin->detail_acara($id)
					);
		$this->load->view('admin/layouts/app', $data);

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
				redirect('admin/list_notulen','refresh');
			}
		}
	}

	//List Notulen
	public function list_notulen()
	{
		$data['title']		=	'Halaman Administrator » List Notulen';
		$data['list']		=	$this->madmin->notulen();
		$data['content']	=	'admin/data/list_notulen';
		$this->load->view('admin/layouts/app', $data, FALSE);
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

		$data = array(	'title' 	=> 	'Halaman Administrator » Edit Data Notulen',
						'content'	=>	'admin/data/update_notulen',
						'show'		=>	$this->madmin->detail_notulen($kode)
					);
		$this->load->view('admin/layouts/app', $data);

		//Masuk Database
		} else {
			$values	=	array(	'kode'			=>	$this->input->post('kode'),
								'isi'			=>	$this->input->post('isi')
							);
			$this->madmin->update_notulen($values);
			$this->session->set_flashdata('berhasil', '<strong>Berhasil!</strong> Data berhasil diupdate.');
			redirect('admin/list_notulen','refresh');
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
		redirect('admin/list_notulen','refresh');
	}

	//Detail Notulen
	public function detail_notulen($kode)
	{
		$data = array(	'title' 	=> 	'Halaman Administrator » Detail Notulen',
						'show'		=>	$this->madmin->detail_notulen($kode),
						'images'	=>	$this->madmin->gambar($kode),
						'kehadiran'	=>	$this->madmin->hadir($kode),
						'get_acara'	=>	$this->madmin->get_acara($kode),
						'content'	=>	'admin/data/detail_notulen'
					);
		$this->load->view('admin/layouts/app', $data);
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
			$data['title']		=	'Halaman Administrator » Kirim Notulen';
			$data['content']	=	'admin/data/send_notulen';
			$this->load->view('admin/layouts/app', $data);

			$dompdf = new Dompdf\Dompdf();
		    $dompdf->loadHtml($this->load->view('admin/data/notulen', $data, TRUE));
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
			redirect('admin/list_notulen','refresh');
		}
	}
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */