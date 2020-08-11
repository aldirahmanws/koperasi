<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
			redirect(base_url('login'));
		}
	}
	public function index()
	{
		if($this->session->status == 'user') {
			$data['tabungan'] = $this->db->where('tb_tabungan.id_user', $this->session->id_user);
		}
		$data['tabungan'] = $this->db->join('tb_user', 'tb_user.id_user = tb_tabungan.id_user')->get('tb_tabungan')->result();
		$data['main_view'] = 'tabungan_view';
		$this->load->view('template_view', $data);
    }
    public function tambah()
    {
        $data['user'] = $this->db->where('status', 'user')->get('tb_user')->result();
        $data['main_view'] = 'form_tabungan_view';
		$this->load->view('template_view', $data);
    }
    public function simpan_tabungan()
    {
        $data['id_user'] = $this->input->post('id_user');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tanggal'] = date('Y-m-d');
        $this->db->insert('tb_tabungan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Tabungan berhasil ditambahkan</div>');
		redirect('tabungan');
    }
}