<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopingChart extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
	}

	public function viewchart()
	{
		$this->load->view('templates/header');
		$this->load->view('chart/chart');
		$this->load->view('templates/footer');
	}
	public function produk()
	{
		$this->load->view('templates/header');
		$this->load->view('produk/produk');
		$this->load->view('templates/footer');
	}
}
