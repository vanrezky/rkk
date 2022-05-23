<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('Aplikasi');
}

	public function index()
	{
		if($this->session->userdata('logged_in')!="" )
		{

		$data['dashboard1'] = $this->db->query("SELECT COUNT(id_karyawan) AS jml_karyawan FROM karyawan");
		$data['dashboard2'] = $this->db->query("SELECT COUNT(id_rkk) AS jml_asuhan FROM rkk");
		$data['dashboard3'] = $this->db->query("SELECT COUNT(id_user) AS jml_user FROM user");
		$data['dashboard4'] = $this->db->query("SELECT COUNT(id_supervisi) AS jml_supervisi FROM supervisi");

		$this->load->view('user/u_dashboard', $data);
		
		}
		else
		{
			redirect('login/logout');
		}

	}
}
