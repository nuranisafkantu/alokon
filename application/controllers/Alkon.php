<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alkon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([0,1]);
		$this->title = "Alkon";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$data['alkon'] = $this->M_alkon->get_all();
		$data['jenis'] = $this->M_jns_alkon->get_all();
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/alkon',$data);
		$this->load->view('template/footer',$data);
	}

	public function proses()
	{
		$stokmasuk = $this->input->post('stok');
		$tanggal = $this->input->post('expired_date');

		$data = array(
			'nama_alkon' => $this->input->post('nama'),
			'id_jns_alkon' => $this->input->post('jns_alkon')
		);

		$proses = $this->M_alkon->insert($data);

		if ($proses['status'] == true) {
			$stok = array(
				'id_data_alkon' => $proses['id'],
				'stock' => $stokmasuk,
				'expired_date' => $tanggal,
				'entry_date' => date('Y-m-d'),
				'is_first' => 1	,
				'status' => 1
			);

			$stokin = $this->M_alkon->insert_alkon_masuk($stok);

			// if ($stokin == true) {
			// 	echo "success";
			// } else {
			// 	echo "error";
			// }
		} else {
			echo "error";
		}

		redirect('alkon');
	}

	public function delete($id)
	{

		$getid = $this->encryption->decrypt(urldecode($id));

		$delete = $this->M_alkon->delete($getid);

		// if ($delete == true) {
		// 	$this->session->set_flashdata('success', 'Password berhasil direset');
		// } else {
		// 	$this->session->set_flashdata('error', 'Password gagal direset');
		// }

		redirect('alkon');
	}
}
