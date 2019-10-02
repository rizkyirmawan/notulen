<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function undangan_admin($id)
	{
		$data['show']		=	$this->madmin->detail_acara($id);
		$this->pdf->setPaper('A4', 'landscape');
	    $this->pdf->filename = 'Undangan Rapat - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('admin/data/undangan', $data);
	}

	public function notulen_admin($kode)
	{
		$data['show']		=	$this->madmin->detail_notulen($kode);
		$data['images']		=	$this->madmin->gambar($kode);
		$data['get_acara']	=	$this->madmin->get_acara($kode);
		$data['hadir']		=	$this->madmin->hadir($kode);
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('admin/data/notulen', $data);
	}

	public function undangan_notulis($id)
	{
		$data['show']		=	$this->madmin->detail_acara($id);
		$this->pdf->setPaper('A4', 'landscape');
	    $this->pdf->filename = 'Undangan Rapat - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('notulis/data/undangan', $data);
	}

	public function notulen_notulis($kode)
	{
		$data['show']		=	$this->madmin->detail_notulen($kode);
		$data['images']		=	$this->madmin->gambar($kode);
		$data['get_acara']	=	$this->madmin->get_acara($kode);
		$data['hadir']		=	$this->madmin->hadir($kode);
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('notulis/data/notulen', $data);
	}

	//Print List Notulis
	public function print_notulis()
	{
		$data['title']		=	'Halaman Administrator » Cetak Data Notulis';
		$data['list']		=	$this->madmin->list_notulis();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Data Notulis - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('pdf/print_notulis', $data);
	}

	//Print List Peserta
	public function print_peserta()
	{
		$data['title']		=	'Halaman Administrator » Cetak Data Peserta';
		$data['list']		=	$this->madmin->list_peserta();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Data Peserta - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('pdf/print_peserta', $data);
	}

	//Print List Acara
	public function print_acara()
	{
		$data['title']		=	'Halaman Administrator » Cetak Data Acara';
		$data['list']		=	$this->madmin->list_acara();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Data Acara - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('pdf/print_acara', $data);
	}

	//Print List Notulen
	public function print_notulen()
	{
		$data['title']		=	'Halaman Administrator » Cetak Data Notulen';
		$data['list']		=	$this->madmin->notulen();
		$this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = 'Data Notulen - '.date('Y-m-d').'.pdf';
	    $this->pdf->load_view('pdf/print_notulen', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */