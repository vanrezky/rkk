<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class App_Login_Model extends CI_Model {


	public function getLoginData($data)

	{

		$login['username'] = $data['username'];
		$login['password'] = md5($data['password']);

		$cek = $this->db->get_where('user', $login);

		if($cek->num_rows()>0)
		{
			foreach($cek->result() as $qad)
			{
				$sess_data['logged_in'] 	= 'yesGetMeLoginBaby';
				$sess_data['id_user'] 		= $qad->id_user;
				$sess_data['username'] 		= $qad->username;
				$sess_data['nama_lengkap'] 	= $qad->nama_lengkap;
				$sess_data['id_level'] 		= $qad->id_level;
				$sess_data['id_unit'] 		= $qad->id_unit;

				$this->session->set_userdata($sess_data);
				$this->db->where('id_user',$qad->id_user);
                $this->db->update('user', array('terakhir_login'=> date('Y-m-d H:i:s')));
			
			}
			if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
			{
				redirect('dashboard');
			} 
			else if($this->session->userdata('logged_in')!="")
			{
				redirect('u_dashboard');
			}
		}
		else
		{	

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// $this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.");
			redirect('login');
		}
	}

}