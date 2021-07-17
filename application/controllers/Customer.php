<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
 
		parent::__construct();
		$this->load->helper('url');
	
		// Load session
		$this->load->library('session');
	
		// Load Pagination library
		$this->load->library('pagination');
	
		// Load model
		$this->load->model('CatalogModel');
	  }

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
        $data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		if($data['user']['roleid']==1){
			redirect('admin');
		}
		}
		$this->db->order_by('nama','ASC');
		$this->db->limit(6);	
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
		$this->session->set_userdata(array("search"=>''));
		$this->loadRecord();
	}

	public function sorting($sort){

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		}
		if($sort=='as'){
		$this->db->order_by('harga', 'ASC');
		}elseif($sort=='des'){
		$this->db->order_by('harga', 'DESC');
		}
		$data['produk']=$this->db->get('produk')->result_array();
		$this->session->set_userdata(array("search"=>''));
		$this->loadRecord();
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->db->where('idkota',$data['user']['kota']);
			$data['kota']=$this->db->get('kota')->row_array();
			$this->load->view('templates/header',$data);
			$this->load->view('customer/profile',$data);
			$this->load->view('templates/footer');
	}

	public function profileedit()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id=$data['user']['userid'];
        $chart = $this->input->post('chart');
        $nama = $this->input->post('nama');
        $tlp = $this->input->post('tlp');
        $kota = $this->input->post('idkota');
        $alamat = $this->input->post('alamat');
        $kodepos = $this->input->post('kodepos');

		
        //cek gamabr

        $upload_image = $_FILES['gambar'];
        
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/customer/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['user']['photo'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/img/customer/'.$old_image);
				}
                $new_image = $this->upload->data('file_name');
                $this->db->set('photo', $new_image);
            } else {
                echo $this->upload->display_errors();
				
            }
        }
        $this->db->set('nama', $nama);
        $this->db->set('tlp', $tlp);
        $this->db->set('kota', $kota);
        $this->db->set('alamat', $alamat);
        $this->db->set('kodepos', $kodepos);
        $this->db->where('userid', $id);
        $this->db->update('user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Profile Berhasil Diubah</div>');
        if($chart=='chart'){
        	redirect('ShopingChart/viewchart');
        }else{
        redirect('customer/profile');	
    	}
	}	

	public function profileeditview()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->db->where('idkota',$data['user']['kota']);
			$data['kota']=$this->db->get('kota')->row_array();
			$data['kota2']=$this->db->get('kota')->result_array();
			$this->load->view('templates/header',$data);
			$this->load->view('customer/profileedit',$data);
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

	// public function alamat()
	// {
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
 //        if($this->session->userdata('email')){
	// 		$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
	// 		}
	// 		$this->load->view('templates/header',$data);
	// 		$this->load->view('customer/alamat',$data);
	// 		$this->load->view('templates/footer');
	// }

	public function changepassword()
    {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			
        $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newpassword1', 'New Password', 'required|trim|min_length[3]|matches[newpassword2]');
        $this->form_validation->set_rules('newpassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newpassword1]');
        if ($this->form_validation->run() == false) {
            
			$this->load->view('templates/header',$data);
			$this->load->view('customer/password',$data);
			$this->load->view('templates/footer');
        } else {
            $currentpassword = $this->input->post('currentpassword');
            $newpassword = $this->input->post('newpassword1');
            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('customer/changepassword');
            } else {
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">New password can not be the same as current password!  </div>');
                    redirect('customer/changepassword');
                } else {
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">New password has been change!</div>');
                    redirect('customer/profile');
                }
            }
        }
    }

	public function about(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
        $data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		}
		$this->db->order_by('nama','ASC');
		$this->db->limit(6);	
		$data['produk'] = $this->db->get('produk')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('main/about',$data);
		$this->load->view('templates/footer');
		
	}
	//search catalog

	public function loadRecord($rowno=0){

		// Search text
		$search_text = "";
		if($this->input->post('submit') != NULL ){
		  $search_text = $this->input->post('search');
		  $this->session->set_userdata(array("search"=>$search_text));
		}else{
		  if($this->session->userdata('search') != NULL){
			$search_text = $this->session->userdata('search');
		  }
		}
	
		// Row per page
		$rowperpage = 12;
	
		// Row position
		if($rowno != 0){
		  $rowno = ($rowno-1) * $rowperpage;
		}
		if($this->input->post('as')=="as"){
			$sort='ASC';
		}elseif($this->input->post('as')=="des"){
			$sort='DESC';
		}else{
			$sort='';
		}
		// All records count
		$allcount = $this->CatalogModel->getrecordCount($search_text);
		// Get records
		
		$users_record = $this->CatalogModel->getData($rowno,$rowperpage,$search_text);

		// Pagination Configuration
		$config['base_url'] = base_url().'/Customer/loadRecord';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
	
		// Initialize
		$this->pagination->initialize($config);
		 // Membuat Style pagination untuk BootStrap v4
		 $config['first_link']       = '<<';
		 $config['last_link']        = '>>';
		 $config['next_link']        = '>';
		 $config['prev_link']        = '<';
		 $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		 $config['full_tag_close']   = '</ul></nav></div>';
		 $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		 $config['num_tag_close']    = '</span></li>';
		 $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		 $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		 $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		 $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['prev_tagl_close']  = '</span>Next</li>';
		 $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		 $config['first_tagl_close'] = '</span></li>';
		 $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		 $config['last_tagl_close']  = '</span></li>';
 
		 $this->pagination->initialize($config);
		 $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
		$data['pagination'] = $this->pagination->create_links();
		$data['produk'] = $users_record;
		$data['row'] = $rowno;
		$data['search'] = $search_text;
		
		// Load view
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
		}
		$this->load->view('templates/header',$data);
		$this->load->view('produk/catalog',$data);
		$this->load->view('templates/footer');	 
	  }


}
