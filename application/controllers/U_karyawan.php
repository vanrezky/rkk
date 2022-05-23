<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class U_karyawan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();


        $this->load->model('U_karyawan_model');

    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="")
    {
      $data = array();
      $data['get_all_karyawan']=$this->U_karyawan_model->get_all_karyawan();
      $this->load->view('user/karyawan/data_karyawan', $data);
    	}
  else
    {
      redirect('login/logout');
    }

  }

 	public function add() {
 		if($this->session->userdata('logged_in')!="")
    {
      $data = array();
      $data['all_unit']=$this->U_karyawan_model->get_all_unit();
      $this->load->view('user/karyawan/add_karyawan', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

  public function save() {

        $data = array();
        $data['nama_karyawan'] = $this->input->post('nama_karyawan');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['unit'] = $this->session->userdata('id_unit');
        $data['kepala_unit'] = $this->session->userdata('id_user');

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->U_karyawan_model->save_karyawan_info($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('u_karyawan');
            } else {
                $this->session->set_flashdata('message', 'Input Karyawan Galat !');
                redirect('u_karyawan');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('u_karyawan/add');
        }
    }

	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="")
    {
	    $data= array();
	    $data['all_unit']=$this->U_karyawan_model->get_all_unit();
	    $data['karyawan_info_by_id'] = $this->U_karyawan_model->edit_karyawan_info($id);
	    $this->load->view('user/karyawan/edit_karyawan',$data);

    }
          else
    {
      redirect('login/logout');
    }

  }
      public function update($id) {
        $data = array();
        $data['nama_karyawan'] = $this->input->post('nama_karyawan');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['unit'] = $this->session->userdata('id_unit');
        $data['kepala_unit'] = $this->session->userdata('id_user');
        
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->U_karyawan_model->update_karyawan_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('u_karyawan');
            } else {
                $this->session->set_flashdata('message', 'Data Karyawan Berhasil Diupdate !');
                redirect('u_karyawan');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('u_karyawan/add');
        }
    }

    public function delete($id){ 
        $result = $this->U_karyawan_model->delete_karyawan_info($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-error" role="alert"> Data Berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('u_karyawan');
        } else {
            $this->session->set_flashdata('message', 'Delete Data Karyawan Gagal !');
             redirect('u_karyawan');
        }
    }
    

 }