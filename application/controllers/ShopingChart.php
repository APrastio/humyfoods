<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopingChart extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();	
	}

	public function viewchart()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
			//qty chart
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			//isi chart
			$this->db->where('userid',$data['user']['userid']);
			$data['chartitem']=$this->db->get('chartview')->result_array();
			//total belanjaan
			$this->load->model('ShoppingChartModel', 'chart');
            $data['total'] = $this->chart->getTotal($data['user']['userid']);
			$this->load->view('templates/header',$data);
			$this->load->view('chart/chart',$data);
			$this->load->view('templates/footer',$data);
			}else{
				redirect("auth");
			}		
	}
	public function addchart()
	{
		if ($this->session->userdata('email')) {
			$data = [
				'userid' => htmlspecialchars($this->input->post('userid', true)),
				'produkid' => htmlspecialchars($this->input->post('produkid', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'dateadd' => time()
			];
			$cek=$this->db->get_where('shopingchart', ['userid' => $data['userid'],'produkid' => $data['produkid']])->row_array();
			if($cek>0){
				$qty=$data['qty']+$cek['qty'];
				$this->db->set('qty', $qty);
				$this->db->where('chartid',$cek['chartid']);
				$this->db->update('shopingchart');
			}else{
				$this->db->insert('shopingchart', $data);
			}
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Produk Baru</div>');
				redirect('produk/produkdetail/'.$data['produkid']);
		}else{
			redirect('auth');
		}
	}

	public function editchart($id)
	{
		$data=$this->db->get_where('shopingchart',['chartid'=>$id])->row_array();
		if($_GET['id']==2 && $data['qty']>1){
        $this->db->set('qty', $data['qty']-1);
		}else if($_GET['id']==1){
			$this->db->set('qty', $data['qty']+1);
		}else{
			$this->db->set('qty', 1);
		}
        $this->db->where('chartid', $id);
        $this->db->update('shopingchart');
        redirect('ShopingChart/viewchart');
	}
	
	public function deletechart($id)
	{
		$this->db->where('chartid', $id);
        $this->db->delete('shopingchart');
		redirect('ShopingChart/viewchart');
	}

			
}
