<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
     
    }

	public function produkdetail($id)
	{
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
		$this->db->where('produkid',$id);
		$data['produkdetail']=  $this->db->get('produk')->row_array();
        $this->db->order_by('nama','DESC');
        $this->db->limit(3);    
        $data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('produk/produkdetail',$data);
		$this->load->view('templates/footer');
	}
	
	public function addproduk()
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
		$this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        if ($this->form_validation->run() == false) {
			$this->load->view('templates/headeradmin');
			$this->load->view('templates/sidebar',$orders);
			$this->load->view('templates/topbar');
			$this->load->view('produk/addproduk');
			$this->load->view('templates/footeradmin');
        }else{
            $gambar=$_FILES["gambar"];
            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '9048';//kb
                $config['upload_path'] = './assets/img/produk/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    
                 } else {
                    echo $this->upload->display_errors();
                    die;
                }
            }

			$data = [
                'nama' => htmlspecialchars($this->input->post('namaproduk', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'stok' => htmlspecialchars($this->input->post('stok', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'poto'=> $this->upload->data("file_name")
            ];
			$this->db->insert('produk', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Menambahkan Produk Baru</div>');
            redirect('produk/listproduk');
		}
    }else{
		redirect('customer');
	}
	}
 
    public function editprodukview($id){
        if ($this->session->userdata('role_id')==1) {
        $this->db->where("produkid",$id);
        $data= $this->db->get('produk')->row_array();
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
            $this->load->view('produk/editproduk',$data);
            $this->load->view('templates/footeradmin');
        }else{
            redirect('customer');
        }
    }

    public function editproduk(){
        $id=$this->input->post('id');
        $this->db->where("produkid",$id);
        $data= $this->db->get('produk')->row_array();
        $nama = $this->input->post('namaproduk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        //cek gamabr

        $upload_image = $_FILES['gambar'];
        
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/produk/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['poto'];
                unlink(FCPATH . 'assets/img/produk/' . $old_image);
                $new_image = $this->upload->data('file_name');
                $this->db->set('poto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set('nama', $nama);
        $this->db->set('harga', $harga);
        $this->db->set('stok', $stok);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('produkid', $id);
        $this->db->update('produk');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Diubah</div>');
        redirect('produk/listproduk');
    }

    public function deleteproduk($id,$poto){
        $this->db->where('produkid', $id);
        $this->db->delete('produk');
        unlink(FCPATH . 'assets/img/produk/' . $poto);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Data Berhasil Dihapus </div>');
        redirect('produk/listproduk');
    }

	public function listproduk()
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
		$data['listproduk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/headeradmin');
		$this->load->view('templates/sidebar',$orders);
		$this->load->view('templates/topbar');
		$this->load->view('produk/listproduk',$data);
		$this->load->view('templates/footeradmin');
    }else{
		redirect('customer');
	}
	}

}
