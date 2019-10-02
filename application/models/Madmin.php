<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	//Listing Notulis
	public function list_notulis()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('role !=', 'Admin');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Notulis
	public function detail_notulis($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row();
	}

	//Add Notulis
	public function add_notulis($data)
	{
		$this->db->insert('users', $data);
	}

	//Update Notulis
	public function update_notulis($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);
	}

	//Delete Notulis
	public function delete_notulis($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('users', $data);
	}

	//Listing Peserta
	public function list_peserta()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing Peserta Umum
	public function peserta_umum()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('bagian', 'Umum');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing Peserta Akademik
	public function peserta_akademik()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('bagian', 'Akademik');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing Peserta Dosen
	public function peserta_dosen()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('bagian', 'Dosen');
		$query = $this->db->get();
		return $query->result();
	}

	//Listing Peserta BEM
	public function peserta_bem()
	{
		$this->db->select('*');
		$this->db->from('peserta');
		$this->db->where('bagian', 'BEM');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Peserta
	public function detail_peserta($id)
	{
		$query = $this->db->get_where('peserta', array('id' => $id));
		return $query->row();
	}

	//Add Peserta
	public function add_peserta($data)
	{
		$this->db->insert('peserta', $data);
	}

	//Update Peserta
	public function update_peserta($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('peserta', $data);
	}

	//Delete Peserta
	public function delete_peserta($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('peserta', $data);
	}

	//Listing Acara
	public function list_acara()
	{
		$this->db->select('*');
		$this->db->from('acara');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail Acara
	public function detail_acara($id)
	{
		$query = $this->db->get_where('acara', array('id' => $id));
		return $query->row();
	}

	//Add Acara
	public function add_acara($data)
	{
		$this->db->insert('acara', $data);
	}

	//Update Acara
	public function update_acara($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('acara', $data);
	}

	//Delete Acara
	public function delete_acara($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete('acara', $data);
	}

	//Delete Undangan
	public function delete_undangan($data)
	{
		$this->db->where('id_acara', $data['id_acara']);
		$this->db->delete('undangan', $data);
	}

	//Delete Kehadiran
	public function delete_kehadiran($data)
	{
		$this->db->where('kode_notulen', $data['kode_notulen']);
		$this->db->delete('kehadiran', $data);
	}

	//Delete Gambar
	public function delete_gambar($data)
	{
		$this->db->where('kode_notulen', $data['kode_notulen']);
		$this->db->delete('gambar', $data);
	}

	//List Invited
	public function invited($id){
		$this->db->select('*');
		$this->db->from('peserta');	
		$this->db->join('undangan', 'undangan.email_peserta = peserta.email', 'left');
		$this->db->join('acara', 'acara.id = undangan.id_acara', 'left');
		$this->db->where('acara.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	//List Gambar
	public function gambar($kode){
		$this->db->select('*');
		$this->db->from('gambar');	
		$this->db->join('notulen', 'notulen.kode = gambar.kode_notulen', 'left');
		$this->db->where('notulen.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Hadir
	public function hadir($kode){
		$this->db->select('*');
		$this->db->from('peserta');	
		$this->db->join('kehadiran', 'kehadiran.email_peserta = peserta.email', 'left');
		$this->db->join('notulen', 'notulen.kode = kehadiran.kode_notulen', 'left');
		$this->db->where('notulen.kode', $kode);
		$query = $this->db->get();
		return $query->result();
	}

	//List Notulen
	public function notulen(){
		$this->db->select('*');
		$this->db->from('notulen');	
		$this->db->join('users', 'users.id = notulen.id_notulis', 'left');
		$this->db->join('acara', 'acara.id = notulen.id_acara', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	//Delete Notulen
	public function delete_notulen($data)
	{
		$this->db->where('kode', $data['kode']);
		$this->db->delete('notulen', $data);
	}

	//Detail Notulen
	public function detail_notulen($kode)
	{
		$this->db->select('*');
		$this->db->from('notulen');	
		$this->db->join('users', 'users.id = notulen.id_notulis', 'left');
		$this->db->join('acara', 'acara.id = notulen.id_acara', 'left');
		$this->db->where('notulen.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Get Acara
	public function get_acara($kode)
	{
		$this->db->select('*');
		$this->db->from('acara');	
		$this->db->join('notulen', 'notulen.id_acara = acara.id', 'left');
		$this->db->where('notulen.kode', $kode);
		$query = $this->db->get();
		return $query->row();
	}

	//Update Notulen
	public function update_notulen($data)
	{
		$this->db->where('kode', $data['kode']);
		$this->db->update('notulen', $data);
	}

	//Kodeauto Notulen
	public function kode_notulen()
	{
		$this->db->select('RIGHT(notulen.kode, 2) as kode', FALSE);
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);
		$query = $this->db->get('notulen');
		if($query->num_rows() <> 0){     
	   		$data = $query->row();      
	   		$kode = intval($data->kode) + 1;
	   	} else {     
	   		$kode = 1;
	   	}

	  	$kodemax = str_pad($kode, 4, "000", STR_PAD_LEFT);    
	  	$kodejadi = "NT".$kodemax;     
	  	return $kodejadi;
	}

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */