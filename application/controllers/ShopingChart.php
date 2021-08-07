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
			//kota
			$data['kota2']=$this->db->get('kota')->result_array();
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
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk berhasil dimasukan kedalam keranjang
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
				redirect('produk/produkdetail/'.$data['produkid']);
		}else{
			redirect('auth');
		}
	}


	public function addWishlist()
	{
		if ($this->session->userdata('email')) {

			$data = [
				'userid' => htmlspecialchars($this->input->post('userid', true)),
				'produkid' => htmlspecialchars($this->input->post('produkid', true))
			];
			$this->db->where('userid',$data['userid']);
			$this->db->where('produkid',$data['produkid']);
			$cek=$this->db->get('wishlist')->row_array();
			if ($cek) {
				redirect('produk/produkdetail/'.$data['produkid']);
			}else{
				$this->db->insert('wishlist', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk berhasil dimasukan kedalam keranjang
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('produk/produkdetail/'.$data['produkid']);
			}
			
		}else{
			redirect('auth');
		}
	}

	public function wishlistview()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			$this->db->where('userid',$data['user']['userid']);
			$data['order']= $this->db->get('wishlitview')->result_array();
			$this->load->view('templates/header',$data);
			$this->load->view('chart/wishlist',$data);
			$this->load->view('templates/footer');
			}
	}

	public function deleteWishlist()
	{
		if ($this->session->userdata('email')) {

			$data = [
				'userid' => htmlspecialchars($this->input->post('userid', true)),
				'produkid' => htmlspecialchars($this->input->post('produkid', true))
			];
			$this->db->where('userid',$data['userid']);
			$this->db->where('produkid',$data['produkid']);
			$cek=$this->db->get('wishlist')->row_array();
			if ($cek) {
				redirect('produk/produkdetail/'.$data['produkid']);
			}else{
				$this->db->insert('wishlist', $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Produk berhasil dimasukan kedalam keranjang
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('produk/produkdetail/'.$data['produkid']);
			}
			
		}else{
			redirect('auth');
		}
	}
//baru
	public function editchart($id)
	{
		$data=$this->db->get_where('shopingchart',['chartid'=>$id])->row_array();
		// var_dump($data['produkid']);
		$produk=$this->db->get_where('produk',['produkid'=>$data['produkid']])->row_array();
		// echo'<br>';
		// var_dump($produk["stok"]);
		// echo'<br>';
		// var_dump($data);die;
		if($_GET['id']==2 && $data['qty']>1){
        $this->db->set('qty', $data['qty']-1);
		}else if($_GET['id']==1){
			if($data['qty']<$produk["stok"]){
			$this->db->set('qty', $data['qty']+1);
			}else{
			$this->db->set('qty', $produk["stok"]);
			}
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
