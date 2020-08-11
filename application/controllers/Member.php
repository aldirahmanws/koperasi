<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		if($this->session->status != 'admin'){
			redirect('tabungan');
		}
        $data['member'] = $this->db->where('status','user')->get('tb_user')->result();
		$data['main_view'] = 'member_view';
		$this->load->view('template_view', $data);
    }
}