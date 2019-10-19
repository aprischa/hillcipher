<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function view(){
		return $this->db->get('siswa')->result();
	}
	
	public function view_by($nis){
		$this->db->where('nis', $nis);
		return $this->db->get('siswa')->row();
	}
	
	public function validation($mode){
		$this->load->library('form_validation'); 
		if($mode == "save")
			$this->form_validation->set_rules('input_nis', 'NPM', 'required|numeric|max_length[12]');
		
		$this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('input_telp', 'telp', 'required|numeric|max_length[15]');
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
			
		if($this->form_validation->run()) 
			return TRUE;
		else 
			return FALSE; 
	}
	
	public function save(){
		$data = array(
			"nis" => $this->input->post('input_nis'),
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"alamat" => $this->input->post('input_alamat')
		);
		
		$this->db->insert('siswa', $data); 
	}
	
	public function edit($nis){
		$data = array(
			"nama" => $this->input->post('input_nama'),
			"jenis_kelamin" => $this->input->post('input_jeniskelamin'),
			"telp" => $this->input->post('input_telp'),
			"alamat" => $this->input->post('input_alamat')
		);
		
		$this->db->where('nis', $nis);
		$this->db->update('siswa', $data);
	}
	
	public function delete($nis){
		$this->db->where('nis', $nis);
		$this->db->delete('siswa'); 
	}
}
