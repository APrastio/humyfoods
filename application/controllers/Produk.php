<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function produkdetail($id)
	{
		$this->db->where('produkid',$id);
		$data['produkdetail']=  $this->db->get('produk')->row_array();
		$this->load->view('templates/header');
		$this->load->view('produk/produkdetail',$data);
		$this->load->view('templates/footer');
	}
	
	public function addproduk()
	{
		
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('produk/addproduk');
		$this->load->view('templates/footeradmin');
	}

	public function listproduk()
	{
		
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('produk/listproduk');
		$this->load->view('templates/footeradmin');
	}
	
}
