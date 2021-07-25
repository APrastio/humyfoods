<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Customer');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('main/login');
            $this->load->view('templates/footer');
        } else {
            // valid succes
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //jika user ada
        if ($user) {
            //jika user aktive
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['roleid']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['roleid'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('customer');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukan salah
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Email ini belum melakukan Aktivasi
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar
          </div>');
            redirect('auth');
        }
    }

    

    public function regis()
    {
        if ($this->session->userdata('email')) {
            redirect('Customer');
        }else{
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is registed'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'The Password not match!',
            'min_length' => 'password to sort'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header');
            $this->load->view('main/regis');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'roleid' => 2,
                'photo' => 'default.png',
                'is_active' => 0
            ];

            //token
            $token=urldecode(base64_encode(random_bytes(32)));
            $usertoken=[
                'email'=> $this->input->post('email'),
                'token'=> $token
            ];

            $this->db->insert('user', $data);
            $this->db->insert('usertoken', $usertoken);
            
            $this->_sendEmail($token,'verify');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Selamat! akun anda berhasil dibuat harap cek email anda untuk aktivasi
            </div>');
            redirect('auth');
        }
    }
    }

    private function _sendEmail($token,$tipe)
    {
        $from = "humyfoodsstore@gmail.com";
          $to = $this->input->post('email');

          $host = "ssl://smtp.gmail.com";
          $port = "465";
          $username = 'humyfoodsstore@gmail.com';
          $password = 'j0k3r12355';
          if($tipe=='verify'){
          $subject = "Aktivasi Akun";
          $body = 'Klik link ini untuk verifikasi akun anda : <a href="'.base_url().'auth/verify?email='.$to.'&token='.$token.'">Activate</a>';
          }elseif($tipe=='lupa'){
            $subject = "Reset Password";
            $body = 'Klik link ini untuk Reset password anda : <a href="'.base_url().'auth/reset?email='.$to.'&token='.$token.'">Activate</a>';
          }
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

    public function verify(){
        $email=$this->input->get('email');
        $token=$this->input->get('token');
        
        
        $this->db->where('email',$email);
        $user=$this->db->get('user')->row_array();

        if($user){
            $usertoken=$this->db->get_where('usertoken',['token'=>$token])->row_array();
            if($usertoken){
                $this->db->set('is_active',1);
                $this->db->where('email',$email);
                $this->db->update('user');
                $this->db->delete('usertoken',['email'=> $email]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Aktivasi berhasil, Silahkan Login
            </div>');   
            redirect('auth');
            }else{
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal aktivasi token salah
            </div>');   
            redirect('auth');
            }
        }else{
             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal aktivasi Email salah
            </div>');
            redirect('auth');
        }
    }
    public function lupapasswordview()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header',$data);
            $this->load->view('main/lupapassword');
            $this->load->view('templates/footer');
        }else{
            $email=$this->input->post('email');
            
            $user=$this->db->get_where('user',['email'=> $email])->row_array();
            if($user){
                if($user['is_active']==1){
                    $token= urldecode(base64_encode(random_bytes(32)));
                    $usertoken=[
                        'email'=>$email,
                        'token'=>$token
                    ];
                    $this->db->insert('usertoken',$usertoken);
                    $this->_sendEmail($token,'lupa');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Harap cek email anda untuk reset password
                </div>'); if($this->session->userdata('email')){
                    redirect('customer/password');
                    }else{
                        redirect('auth');
                    }
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Email belum diaktivasi
                </div>');
                redirect('auth/lupapasswordview');
                }

            }else{
                
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar
          </div>');
          redirect('auth/lupapasswordview');
            }
        }
    }
    public function reset(){
        $email=$this->input->get('email');
        $token=$this->input->get('token');
        $user=$this->db->get_where('user',['email'=>$email])->row_array();
        if($user){
            $usertoken=$this->db->get_where('usertoken',['token'=>$token]);
            if($usertoken){
            $this->session->set_userdata('resetemail',$email);
            $this->resetpasswordview();
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal reset Token salah
            </div>');
            redirect('auth');
            }
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gagal reset Email salah
            </div>');
            redirect('auth');
        }
    }

    public function resetpasswordview(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if($this->session->userdata('email')){
			$data['chart'] = $this->db->select('qty')->get_where('shopingchart', ['userid'=>$data['user']['userid']])->result_array();
			}
        if($this->session->userdata('resetemail')){

        $this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]', [
            'matches' => 'The Password not match!',
            'min_length' => 'password to sort'
        ]);
        $this->form_validation->set_rules('password2','password','required|trim|min_length[3]|matches[password1]', [
            'matches' => 'The Password not match!',
            'min_length' => 'password to sort'
        ]);
        if($this->form_validation->run()==false){
        $this->load->view('templates/header',$data);
        $this->load->view('main/resetpassword');
        $this->load->view('templates/footer');
        }else{
            $password=password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
            $email=$this->session->userdata('resetemail');
            $this->db->set('password',$password);
            $this->db->where('email',$email);
            $this->db->update('user');
            $this->session->unset_userdata('resetemail');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Password berhasil direset harap login
            </div>');
            if($this->session->userdata('email')){
                redirect('customer/password');
                }else{
                    redirect('auth');
                }
        }
    }else{
        redirect('customer');
    }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        you have been logout
        </div>');
        redirect('customer');
    }
    public function blocked()
    {
        //$data['title'] = 'Blocked';
        //$this->load->view('templates/auth_header', $data);
        $this->load->view('auth/blocked');
        //$this->load->view('templates/auth_footer');
    }
}