<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/header');
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
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('main/admin');
		$this->load->view('templates/footeradmin');
	}
}
