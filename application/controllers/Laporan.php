<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses(2);
		$this->title = "Laporan";
		$this->session = $this->session->userdata();
	}

	// public function index() {
    //     $data['masuk'] = $this->YourModel->get_masuk_data();
    //     $this->load->view('laporan_alkon_masuk', $data);
    // }

	public function masuk()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$data['masuk'] = $this->M_alkon->get_alkon_masuk();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/laporan_masuk',$data);
		$this->load->view('template/footer',$data);
	}

	public function keluar()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/user',$data);
		$this->load->view('template/footer',$data);
	}

	public function kadaluarsa()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/user',$data);
		$this->load->view('template/footer',$data);
	}
}
