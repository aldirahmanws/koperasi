<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
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
			$data['pinjaman'] = $this->db->where('tb_pinjaman.id_user', $this->session->id_user);
		}
		$data['pinjaman'] = $this->db->join('tb_user', 'tb_user.id_user = tb_pinjaman.id_user')->get('tb_pinjaman')->result();
		$data['main_view'] = 'pinjaman_view';
		$this->load->view('template_view', $data);
	}
	public function buat()
    {
        $data['user'] = $this->db->where('status', 'user')->get('tb_user')->result();
        $data['main_view'] = 'form_pinjaman_view';
		$this->load->view('template_view', $data);
	}
	public function simpan_pinjaman()
    {
        $data['id_user'] = $this->input->post('id_user');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['tanggal'] = date('Y-m-d');
        $this->db->insert('tb_pinjaman', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Tabungan berhasil ditambahkan</div>');
		redirect('pinjaman');
	}
	public function detail($id_pinjaman = '')
    {
		$data['detail'] = $this->db->where('id_pinjaman', $id_pinjaman)->get('tb_pinjaman')->row();;
        $data['pembayaran'] = $this->db->where('id_pinjaman', $id_pinjaman)->get('tb_pembayaran')->result();
        $data['main_view'] = 'detail_pinjaman_view';
		$this->load->view('template_view', $data);
	}
	public function simpan_pembayaran()
    {
		$data['id_pinjaman'] = $this->input->post('id_pinjaman');
		$data['jumlah_dibayar'] = $this->input->post('jumlah');
		$data['tanggal_pembayaran'] = $this->input->post('tanggal_pembayaran');
        $this->db->insert('tb_pembayaran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Tabungan berhasil ditambahkan</div>');
		redirect('pinjaman/detail/'.$data['id_pinjaman']);
	}
}