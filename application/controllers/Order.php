<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('userview', ['email' => $this->session->userdata('email')])->row_array();
		if($this->session->userdata('email')){
			if($data['user']['alamat']!=null){
			
			//qty chart
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			$this->db->where('userid',$data['user']['userid']);
			if($data['chart']==false){
				redirect('customer');
			}
			//isi chart
			$data['chartitem']=$this->db->get('chartview')->result_array();
			//total belanjaan
			$this->load->model('ShoppingChartModel', 'chart');
            $data['total'] = $this->chart->getTotal($data['user']['userid']);
			//total qty
			$data['qty'] = $this->chart->getTotalQty($data['user']['userid']);
			//baru
			//total massa
			$data['massa'] = $this->chart->getTotalMassa($data['user']['userid']);
			
			$m=$data['massa']["SUM(`massatotal`)"]/1000;
			$s=round($m);
			$s=$s+0.3;
			if($m<=$s){
				$data['jneh']=round($m);
				}else{
				$data['jneh']=ceil($m);	
				}				
			//cek
			$this->db->where('userid',$data['user']['userid']);
			$this->db->where('status',"Belum Bayar");
			$data['cek']=$this->db->get('pesanview')->row_array();
			// var_dump($data['qty'] ["SUM(`qty`)"]);die;
			$data['kurir']=$this->chart->getKurir($data['qty'] ["SUM(`qty`)"],$data['user']['idkota']);
			//kurir
			$this->load->view('templates/header',$data);
			$this->load->view('order/order',$data);
			$this->load->view('templates/footer',$data);
			}else{
				redirect("customer/profile");
			}
			}else{
				redirect("auth");
			}
	}

	public function addorder()
	{
		
		$chart=$this->db->get_where('shopingchart',['userid' => $this->input->post('userid')])->result_array();
		$this->load->model('ShoppingChartModel','sm');
		$qty=$this->sm->getTotalQty($this->input->post('userid'));
		$data=[
			'userid' => htmlspecialchars($this->input->post('userid', true)),
			'qty' => $qty['SUM(`qty`)'],
			'total' => htmlspecialchars($this->input->post('totalharga', true)),
			'tglorder' => time(),
			'status' => 'Belum Bayar'
		];
		
		$this->db->insert('order',$data);
		// $this->db->where('orderid','');
		$this->db->select_max('orderid');
		$order=$this->db->get('order')->row_array();
		foreach($chart as $s){
		$data=[
			'orderid' => $order['orderid'],
			'userid' => htmlspecialchars($this->input->post('userid', true)),
			'produkid' => $s['produkid'],
			'qty' => $s['qty'],
			'biayaid' => htmlspecialchars($this->input->post('biayaid', true))
		];
		$this->db->insert('pesan',$data);
		}
		$this->db->where('userid', $this->input->post('userid'));
        $this->db->delete('shopingchart');
		$this->_sendEmail();	
		redirect('order/orderpayment');
	}

	private function _sendEmail()
    {
		$nama=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
        $from = "humyfoodsstore@gmail.com";
          $to = 'lostjoker310@gmail.com';
          $host = "ssl://smtp.gmail.com";
          $port = "465";
          $username = 'humyfoodsstore@gmail.com';
          $password = 'j0k3r12355';
          $subject = "Pesanan";
          $body = 'Ada Pesanan masuk atas nama '.$nama['nama'].'';
          $headers = array ('From' => $from, 'To' => $to,'Subject' => $subject,'Content-type' => "text/html");
          $smtp = Mail::factory('smtp',
             array ('host' => $host,
               'port' => $port,
               'auth' => true,
               'username' => $username,
               'password' => $password));

          $mail = $smtp->send($to, $headers, $body);

          if (PEAR::isError($mail)) {
            echo($mail->getMessage());
          } else {
            echo("Message successfully sent!\n");
          }
        //$token,$tipe
        
        // $config = [

        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'lostjoker310@gmail.com',
        //     'smtp_pass' => 'l0s3r12355',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];
        // $this->load->library('email', $config);
        // $this->email->from('lostjoker310@gmail.com','Humyfoods');
        // $this->email->to('wersa245@gmail.com');
        // $this->email->subject('akun');
        // $this->email->message('hello');
        // if($tipe=='verify'){
        // $this->email->subject('Account Verification');    
        // $this->email->message('Klik link ini untuk verifikasi akun anda : <a href="'.base_url().'auth/verfy?email='.$this->input->post('email').'&token='.$token.'">Activate</a>');    
        // }
        

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }
	
	public function statuspengiriman()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			// $this->db->where('userid',$data['user']['userid']);
			// $this->db->where('status','Menungu');
			// $data['menunggu']=$this->db->get('order')->result_array();
			$this->db->where('userid',$data['user']['userid']);
			$this->db->where('status','Dikirim');
			$this->db->or_where('userid',$data['user']['userid']);
			$this->db->where('status','Menungu Konfirmasi');
			$data['order']=$this->db->get('order')->result_array();
			$this->load->view('templates/header',$data);
			$this->load->view('order/statuspengiriman',$data);
			$this->load->view('templates/footer');
	}
	
	public function batal()
	{
		$id=$this->input->post('orderid');
		$this->db->set('status', 'Batal');
		$this->db->where('orderid', $id);
        $this->db->update('order');
		redirect('order/orderpayment');
	}
	public function orderpayment()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
			$this->db->where('userid',$data['user']['userid']);
			$this->db->where('status','Belum Bayar');
			$data['order']= $this->db->get('pesanview')->result_array();
			$this->load->view('templates/header',$data);
			$this->load->view('order/orderpayment',$data);
			$this->load->view('templates/footer');
	}

	public function pesan(){
		$id=$this->input->post('orderid');
		
        //cek gamabr
        $upload_image = $_FILES['gambar'];
        
        if ($upload_image) {
			
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/buktibayar/';
			
            $this->load->library('upload', $config);
			
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('buktipembayaran', $new_image);
				$this->db->set('status', 'Menungu Konfirmasi');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('orderid', $id);
        $this->db->update('order');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Produk Berhasil Diubah</div>');
        redirect('order/statuspengiriman');
	}
}
