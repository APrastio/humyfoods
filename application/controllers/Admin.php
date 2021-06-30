<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('role_id')==1) {
			$this->load->view('templates/headeradmin');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('main/admin');
			$this->load->view('templates/footeradmin');
			
        }else{
			redirect("customer");
		}
	}
//dropdown
	public function listkonfirmasipemesanan()
	{
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesan();	
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadmin',$data);
		$this->load->view('templates/footeradmin');
	}

	public function orderKirim()
	{
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesanProses();
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadminkirim',$data);
		$this->load->view('templates/footeradmin');
	}
	
	public function orderTetrkirim()
	{
		$this->load->model('AdminModel','am');
		$data['listpesanan'] = $this->am->getPesanTerkirim();
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderadminterkirim',$data);
		$this->load->view('templates/footeradmin');
	}
//drowpdown detail
	public function editPesananView($id)
	{
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->ordermenunggu($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderkonfirmdetail',$data);
		$this->load->view('templates/footeradmin');
	}
	
	public function editKirimview($id)
	{
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->orderProses($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderkirimdetail',$data);
		$this->load->view('templates/footeradmin');
	}

	public function editTerKirimview($id)
	{
		$this->load->model('AdminModel','am');
		$data['pesanan'] = $this->am->orderTerkirim($id);
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/orderterkirimdetail',$data);
		$this->load->view('templates/footeradmin');
	}
//input databse
	public function editpesanan($id,$status)
	{
		$this->db->set('status', $status);
        $this->db->where('orderid', $id);
        $this->db->update('order');
		redirect('admin/orderKirim');
	}

	public function editkirim()
	{
		$id=$this->input->post('orderid');
		$status=$this->input->post('status');
		$resi=$this->input->post('resi');
		$this->db->set('status', $status);
		$this->db->set('resi', $resi);
        $this->db->where('orderid', $id);
        $this->db->update('order');
		redirect('admin/orderTetrkirim');
	}
//inputr resi
	public function resi($id)
	{
		$data['id']=$id;
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('order/resi',$data);
		$this->load->view('templates/footeradmin');
	}
}
