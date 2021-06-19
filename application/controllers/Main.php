<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')) {
			$data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
		$data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('main/index',$data);
		$this->load->view('templates/footer');
	}
	public function catalog()
	{
		
		$data['produk']=$this->db->get('produk')->result_array();
		$this->load->view('templates/header');
		$this->load->view('produk/catalog',$data);
		$this->load->view('templates/footer');
	}

	public function admin()
	{
		if ($this->session->userdata('role_id')==1) {
			$this->load->view('templates/headeradmin');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('main/admin');
			$this->load->view('templates/footeradmin');
			
        }else{
			redirect("main");
		}
	}
}
