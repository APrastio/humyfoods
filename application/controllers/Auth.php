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
                    Wrong password
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                This Email is not activated yet
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email is not registed
          </div>');
            redirect('auth');
        }
    }

    public function regis()
    {
        if ($this->session->userdata('email')) {
            redirect('Customer');
        }
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
                'is_active' => 1
            ];
            $this->db->insert('user', $data);
            

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created please login
            </div>');
            redirect('auth');
        }
    }


    private function _sendEmail()
    {
        $config = [

            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'lostjoker310@gmail.com',
            'smtp_pass' => 'joker12355',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('lostjoker310@gmail.com', 'GDI');
        $this->email->to('wersa245@gmail.com');
        $this->email->subject('Testing');
        $this->email->message('hello world');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
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