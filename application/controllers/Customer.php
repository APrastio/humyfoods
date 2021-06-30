<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
        $data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		if($data['user']['roleid']==1){
			redirect('admin');
		}
		}
		
		$data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('main/index',$data);
		$this->load->view('templates/footer');
		
	}
	public function catalog()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		}
		$data['produk']=$this->db->get('produk')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('produk/catalog',$data);
		$this->load->view('templates/footer');
	}
	public function profile()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->load->view('templates/header',$data);
			$this->load->view('customer/profile',$data);
			$this->load->view('templates/footer');
	}

	public function password()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->load->view('templates/header',$data);
			$this->load->view('customer/password',$data);
			$this->load->view('templates/footer');
	}

	public function alamat()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->load->view('templates/header',$data);
			$this->load->view('customer/alamat',$data);
			$this->load->view('templates/footer');
	}

}
