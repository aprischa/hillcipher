<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('SiswaModel');
	}
	
	public function index(){
		$data['siswa'] = $this->SiswaModel->view();
		$this->load->view('siswa/index', $data);
	}
	
	public function tambah(){
		if($this->input->post('submit')){ 
			if($this->SiswaModel->validation("save")){ 
				$this->SiswaModel->save(); 
				redirect('siswa');
			}
		}
		
		$this->load->view('siswa/form_tambah');
	}
	
	public function ubah($nis){
		if($this->input->post('submit')){ 
			if($this->SiswaModel->validation("update")){ 
				$this->SiswaModel->edit($nis); 
				redirect('siswa');
			}
		}
		
		$data['siswa'] = $this->SiswaModel->view_by($nis);
		$this->load->view('siswa/form_ubah', $data);
	}
	
	public function hapus($nis){
		$this->SiswaModel->delete($nis); 
		redirect('siswa');
	}
}
