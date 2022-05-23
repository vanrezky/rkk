<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('Aplikasi');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
		
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}
			else
			{
				$dt['username'] 	= $this->input->post('username');
				$dt['password'] 	= $this->input->post('password');
				$dt['password'] 	= $this->input->post('password');
				$dt['terakhir_login'] = date('Y-m-d H:i:s');

				

				$this->app_login_model->getLoginData($dt);

			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
		{
			redirect('dashboard');
		}
	}


	public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
