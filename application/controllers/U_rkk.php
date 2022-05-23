<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_rkk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('U_rkk_model');
    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="")
    {
      $data = array();
      $data['get_all_rkk']=$this->U_rkk_model->get_all_rkk();
      $this->load->view('user/rkk/data_rkk', $data);
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
      $data['all_unit']=$this->U_rkk_model->get_all_unit();
      $this->load->view('user/rkk/add_rkk', $data);
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
        $data['unit'] = $this->session->userdata('id_unit');
        $data['user'] = $this->session->userdata('id_user');

        $this->form_validation->set_rules('asuhan', 'Asuhan', 'trim|required');
        $this->form_validation->set_rules('kualifikasi', 'Kualifikasi', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->U_rkk_model->save_rkk_info($data);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('u_rkk');
            } else {
                $this->session->set_flashdata('message', 'Data RKK Galat !');
                redirect('u_rkk');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('u_rkk/add');
        }
    }

	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="")
    {
	    $data= array();
	    $data['all_unit']=$this->U_rkk_model->get_all_unit();
	    $data['rkk_info_by_id'] = $this->U_rkk_model->edit_rkk_info($id);
	    $this->load->view('user/rkk/edit_rkk',$data);

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
        $data['unit'] = $this->session->userdata('id_unit');
        $data['user'] = $this->session->userdata('id_user');
        
        $this->form_validation->set_rules('asuhan', 'Asuhan', 'trim|required');
        $this->form_validation->set_rules('kualifikasi', 'Kualifikasi', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->U_rkk_model->update_rkk_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('u_rkk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('u_rkk');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('u_rkk/add');
        }
    }

    public function delete($id){ 
        $result = $this->U_rkk_model->delete_rkk_info($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('u_rkk');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
             redirect('u_rkk');
        }
    }
    

 }