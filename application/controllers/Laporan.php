<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->title = "Laporan";
		$this->session = array(
			'id' => 1,
			'username' => "Eko Hidayat",
			'role' => 2
		);
	}

	public function masuk()
	{
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/user',$data);
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
