<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Dokumen_model');
    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="")
    {
      $data = array();
      $data['get_all']=$this->Dokumen_model->get_all_dokumen();
      $this->load->view('administrator/dokumen/data_dokumen', $data);
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
      $this->load->view('administrator/dokumen/add_dokumen', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

  public function save() {

        $data = array();
        $data['jenis_dokumen'] = $this->input->post('jenis_dokumen');

        $this->form_validation->set_rules('jenis_dokumen', 'Jenis dokumen', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Dokumen_model->save_dokumen_info($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('dokumen');
            } else {
                $this->session->set_flashdata('message', 'Data RKK Galat !');
                redirect('dokumen');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('dokumen/add');
        }
    }

	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="")
    {
	    $data= array();
	    $data['dokumen_info_by_id'] = $this->Dokumen_model->edit_dokumen_info($id);
	    $this->load->view('administrator/dokumen/edit_dokumen',$data);

    }
          else
    {
      redirect('login/logout');
    }

  }
      public function update($id) {
        $data = array();
        $data['jenis_dokumen'] = $this->input->post('jenis_dokumen');
        
        $this->form_validation->set_rules('jenis_dokumen', 'Jenis dokumen', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Dokumen_model->update_dokumen_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Data Berhasil Diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('dokumen');
            } else {
                $this->session->set_flashdata('message', 'Data Asuhan Berhasil Diupdate !');
                redirect('dokumen');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('dokumen/add');
        }
    }

    public function delete($id){ 
        $result = $this->Dokumen_model->delete_dokumen_info($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-delete" role="alert"> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('dokumen');
        } else {
            $this->session->set_flashdata('message', 'Delete Data Asuhan Gagal !');
             redirect('dokumen');
        }
    }
    

 }