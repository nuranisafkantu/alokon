<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checkLogin();
		checkAkses([0,1,2]);
		$this->title = "Dashboard";
		$this->session = $this->session->userdata();
	}

	public function index()
	{
		$data['alkonMasuk'] = $this->db->query("SELECT * FROM tbl_stock_alkon WHERE is_first = 0")->num_rows();	
		$data['alkonKadaluarsa'] = $this->db->query("SELECT * FROM tbl_stock_alkon WHERE status = 0")->num_rows();	
		$data['title'] = $this->title;
		$data['session'] = (object)$this->session;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('main/dashboard',$data);
		$this->load->view('template/footer',$data);
	}
}
