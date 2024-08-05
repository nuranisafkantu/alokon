<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alkon_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([0,1]);
		$this->title = "Data Alkon Keluar";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$data['alkon'] = $this->M_alkon->alkonReady();
		$data['faskes'] = $this->M_faskes->get_all();
		$data['keluar'] = $this->M_alkon->get_alkon_keluar();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/alkon_keluar',$data);
		$this->load->view('template/footer',$data);
	}

	public function proses()
	{
		$data = array(
			'id_stock_alkon' => $this->input->post('alkon'),
			'taking' => $this->input->post('stok'),
			'out_date' => $this->input->post('out_date'),
			'id_faskes' => $this->input->post('faskes'),
			'nama_penerima' =>$this->input->post('nama_penerima')
		);

		// var_dump($data);
		// die;

		$proses = $this->M_alkon->insert_alkon_keluar($data);

		// if ($proses == true) {
		// 	echo "success";
		// } else {
		// 	echo "error";
		// }

		redirect('alkon_keluar');
	}
	public function delete($id)
	{

		$getid = $this->encryption->decrypt(urldecode($id));

		$delete = $this->M_alkon->delete_alkon_keluar($getid);

		// if ($delete == true) {
		// 	$this->session->set_flashdata('success', 'Password berhasil direset');
		// } else {
		// 	$this->session->set_flashdata('error', 'Password gagal direset');
		// }

		redirect('alkon_keluar');
	}
}



