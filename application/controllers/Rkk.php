<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rkk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Rkk_model');
    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
      $data = array();
      $data['get_all_rkk']=$this->Rkk_model->get_all_rkk();
      $this->load->view('admin/rkk/data_rkk', $data);
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
      //$data['all_published_category']=$this->product_model->get_all_published_category();
      $data['all_unit']=$this->Rkk_model->get_all_unit();
      $this->load->view('admin/rkk/add_rkk', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

  public function save() {

        $data = array();
        $data['asuhan'] = $this->input->post('asuhan');
        $data['kualifikasi'] = $this->input->post('kualifikasi');
        $data['unit'] = $this->input->post('unit');
        $data['user'] = $this->session->userdata('id_user');

        $this->form_validation->set_rules('asuhan', 'Asuhan', 'trim|required');
        $this->form_validation->set_rules('kualifikasi', 'Kualifikasi', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Rkk_model->save_rkk_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Data RKK Berhasil Ditambahkan !');
                redirect('rkk');
            } else {
                $this->session->set_flashdata('message', 'Data RKK Galat !');
                redirect('rkk');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('rkk/add');
        }
    }

	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="")
    {
	    $data= array();
	    $data['all_unit']=$this->Rkk_model->get_all_unit();
	    $data['rkk_info_by_id'] = $this->Rkk_model->edit_rkk_info($id);
	    $this->load->view('admin/rkk/edit_rkk',$data);

    }
          else
    {
      redirect('login/logout');
    }

  }
      public function update($id) {
        $data = array();
        $data['asuhan'] = $this->input->post('asuhan');
        $data['kualifikasi'] = $this->input->post('kualifikasi');
        $data['unit'] = $this->input->post('unit');
        $data['user'] = $this->session->userdata('id_user');
        
        $this->form_validation->set_rules('asuhan', 'Asuhan', 'trim|required');
        $this->form_validation->set_rules('kualifikasi', 'Kualifikasi', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Rkk_model->update_rkk_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', 'Data Asuhan Berhasil Diupdate !');
                redirect('rkk');
            } else {
                $this->session->set_flashdata('message', 'Data Asuhan Berhasil Diupdate !');
                redirect('rkk');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('rkk/add');
        }
    }

    public function delete($id){ 
        $result = $this->Rkk_model->delete_rkk_info($id);
        if ($result) {
            $this->session->set_flashdata('message', ' Delete Data Asuhan Berhasil !');
            redirect('rkk');
        } else {
            $this->session->set_flashdata('message', 'Delete Data Asuhan Gagal !');
             redirect('rkk');
        }
    }
    

 }