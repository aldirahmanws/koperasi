<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(base_url('member'));
		}
		$this->load->view('login_view');
	}
	public function login()
	{
        
		if ($this->masuk() == TRUE) {
			redirect(base_url('member'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Username / Password Wrong !</div>');
			redirect('login');
		}
	}
	public function masuk() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->where('username',$username);
        $result = $this->getUsers($password);        

        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    
    function getUsers($password) {
        $query = $this->db->get('tb_user');

        if ($query->num_rows() == 1) {
            
            $result = $query->row_array();

            if ($this->bcrypt->check_password($password, $result['password'])) {
                foreach ($query->result() as $sess) {
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['id_user'] = $sess->id_user;
                    $sess_data['username'] = $sess->username;
                    $sess_data['status'] = $sess->status;
                }
                $this->session->set_userdata($sess_data);
                redirect(base_url('member'));
            } else {
                //Wrong password
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username / Password Wrong !</div>');
				redirect('login');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username / Password Wrong !</div>');
			redirect('login');
        }
	}
	public function logout()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->session->sess_destroy();
			redirect('login');
		} else {
			redirect('login');
		}
	}
}
