<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		//user
		$this->db->where('roleid',2);
		$data=$this->db->get('user')->result_array();
		$data['user']=count($data);
		//bulan ini
		$this->db->select('tglorder');
		$data['bulan']=$this->db->get('order')->result_array();
		$bulan=0;
		$waktu=time();
		foreach($data['bulan'] as $b){
			if(date('m',$b['tglorder'])==date('m',$waktu)){
				$bulan+=1;
			}
			
		}
		$data['bulan']=$bulan;
		//total penjualan
		$this->load->model('AdminModel','total');
		$data['penjualan']=$this->total->getTotalPenjualan();
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		if ($this->session->userdata('role_id')==1) {
			$this->load->view('templates/headeradmin',$orders);
			$this->load->view('templates/sidebar',$orders);
			$this->load->view('templates/topbar');
			$this->load->view('main/admin',$data,$orders);
			$this->load->view('templates/footeradmin');
			
        }else{
			redirect("customer");
		}
	}
//dropdown
	public function listkonfirmasipemesanan()
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesan();	
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadmin',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}

	public function orderKirim()
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesanProses();
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadminkirim',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}
	
	public function orderTetrkirim()
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesanTerkirim();
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadminterkirim',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}
//drowpdown detail
	public function editPesananView($id)
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->ordermenunggu($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderkonfirmdetail',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}
	
	public function editKirimview($id)
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->orderProses($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderkirimdetail',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}

	public function editTerKirimview($id)
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->orderTerkirim($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/orderterkirimdetail',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}
//input databse
	public function editpesanan($id,$status)
	{
		if ($this->session->userdata('role_id')==1) {
		$this->db->set('status', $status);
        $this->db->where('orderid', $id);
        $this->db->update('order');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan berhasil dikonfirmasi</div>');
		redirect('admin/orderKirim');
		}else{
			redirect('customer');
		}
	}

	public function editkirim()
	{
		if ($this->session->userdata('role_id')==1) {
		$id=$this->input->post('orderid');
		$status=$this->input->post('status');
		$resi=$this->input->post('resi');
		$this->db->set('status', $status);
		$this->db->set('resi', $resi);
        $this->db->where('orderid', $id);
        $this->db->update('order');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan berhasil Dikirim</div>');
			redirect('admin/orderTetrkirim');
		}else{
			redirect('customer');
		}
	}
//inputr resi
	public function resi($id)
	{
		if ($this->session->userdata('role_id')==1) {
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$data['id']=$id;
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('order/resi',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}


	public function userlist()
	{
		if ($this->session->userdata('role_id')==1) {
		$data['listuser']=$this->db->get('userview')->result_array();
		//sidebar
		$this->db->where('status','Diproses');
		$data['kirim']=$this->db->get('order')->result_array();
		$this->db->where('status','Menungu Konfirmasi');
		$data['menunggu']=$this->db->get('order')->result_array();
		$orders=[
			'menunggu'=>count($data['menunggu']),
			'kirim'=>count($data['kirim'])
		];
		//
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('main/userlist',$data);
		$this->load->view('templates/footeradmin');
	}else{
		redirect('customer');
	}
	}



}
