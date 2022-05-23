<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Karyawan_model');

    }    
  public function index() {
  	if($this->session->userdata('logged_in')!=""&& $this->session->userdata('id_level')=="1")
    {
      $data = array();
      $data['get_all_karyawan']=$this->Karyawan_model->get_all_karyawan();
      $this->load->view('admin/karyawan/data_karyawan', $data);
    	}
  else
    {
      redirect('login/logout');
    }

  }

 	public function add() {
 		if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
      $data = array();
      $data['all_unit']=$this->Karyawan_model->get_all_unit();
      $data['all_kaunit']=$this->Karyawan_model->get_all_kaunit();
      $this->load->view('admin/karyawan/add_karyawan', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

 public function view_data()
  {
    if (isset($_POST['cari'])) {
      $data['v_data']  = $this->Karyawan_model->view_data_user($this->input->post('id_user'));
      $this->load->view('admin/karyawan/tabel_data', $data);
    }else {
      echo "Silahkan Cek koneksi internet Anda!";
    }
  }

  public function save() {
        $data = array();
        $data['nama_karyawan'] = $this->input->post('nama_karyawan');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['unit'] = $this->input->post('unit');
        $data['kepala_unit'] = $this->input->post('id_user');

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Karyawan_model->save_karyawan_info($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                redirect('Karyawan');
            } else {
                $this->session->set_flashdata('message', 'Input Karyawan Galat !');
                redirect('Karyawan');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Karyawan/add');
        }
    }

	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
	    $data= array();
	    $data['all_unit']=$this->Karyawan_model->get_all_unit();
      $data['all_kaunit']=$this->Karyawan_model->get_all_kaunit();
	    $data['karyawan_info_by_id'] = $this->Karyawan_model->edit_karyawan_info($id);
	    $this->load->view('admin/karyawan/edit_karyawan',$data);

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
        $data['unit'] = $this->input->post('unit');
        $data['kepala_unit'] = $this->input->post('kepala_unit');
        
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Karyawan_model->update_karyawan_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Karyawan');
            } else {
                $this->session->set_flashdata('message', 'Data Karyawan Berhasil Diupdate !');
                redirect('Karyawan');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('Karyawan/add');
        }
    }

    public function delete($id){ 
        $result = $this->Karyawan_model->delete_karyawan_info($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-error" role="alert"> Data Berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Karyawan');
        } else {
            $this->session->set_flashdata('message', 'Delete Data Karyawan Gagal !');
             redirect('Karyawan');
        }
    }
    

 }