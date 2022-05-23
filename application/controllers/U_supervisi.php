<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_supervisi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('U_supervisi_model');
    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="")
    {
      $data = array();
      $data['get_all_supervisi']=$this->U_supervisi_model->get_all_supervisi_info();
      $this->load->view('user/supervisi/data_supervisi', $data);
    	}
  else
    {
      redirect('login/logout');
    }
  }

  
 	public function add() {
 		if($this->session->userdata('logged_in')!="")
    {
      $data = array('tampildata' => $this->U_supervisi_model->tampil_data());
      //$data['all_published_category']=$this->product_model->get_all_published_category();
      $data['all_karyawan']=$this->U_supervisi_model->get_all_karyawan();
      $this->load->view('user/supervisi/add_supervisi', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

  public function create(){

        $this->form_validation->set_rules('id_supervisi', 'Id supervisi', 'trim|required');
        $this->form_validation->set_rules('ka_unit', 'Ka unit', 'trim|required');
        $this->form_validation->set_rules('rkk', 'Rkk', 'trim|required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

        $oodata = array();
        $oodata['id_karyawan'] = $this->input->post('id_karyawan');
        $oodata['ka_unit'] = $this->session->userdata('id_user');
        //$oodata['ka_unit'] = $this->input->post('ka_unit');
        $id_supervisi = $this->U_supervisi_model->save_supervisi_info($oodata);

        $odata = array();
        // $id_supervisi (primary key)
        $id_supervisi    = $id_supervisi;
        $rkk         = $this->input->post('rkk');
        $kualifikasi      = $this->input->post('kualifikasi');
        $nilai = $this->input->post('nilai');
        $odata  = array();
        $i = 0;
        foreach ($kualifikasi as $key) {
            array_push($odata, array(
                'rkk' => $rkk[$i],
                'kualifikasi' => $key,
                'id_supervisi' => $id_supervisi,
                'nilai' => $nilai[$i],
            ));
            $i++;
        }


        // //$id_penilaian
        // $id_supervisi = $id_supervisi;
        // $nilai = $this->input->post('nilai');
        // $data = array();
        // $i = 0;
        // foreach ($nilai as $key) {
        //   array_push($data, array(
        //     'nilai' => $key,
        //     'id_supervisi' => $id_supervisi
        //   ));
        //    $i++;
        // }

        $query = $this->U_supervisi_model->save_detail_supervisi_info($odata);
        //$query = $this->Supervisi_model->save_penilaian_info($data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('u_supervisi');
        }else{
            redirect('u_supervisi/create');
        }
    }



	  public function edit($id){
	  	if($this->session->userdata('logged_in')!="")
    {
	    $data= array();
	    //$data['all_unit']=$this->U_supervisi_model->get_all_unit();
	    $data['supervisi_info_by_id'] = $this->U_supervisi_model->edit_supervisi_info($id);
	    $this->load->view('user/supervisi/edit_supervisi',$data);

    }
          else
    {
      redirect('login/logout');
    }

  }

    public function details($id_supervisi){

    if($this->session->userdata('logged_in')!="" )
    {

      $data= array();
      $supervisi_info = $this->U_supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->U_supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->U_supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->U_supervisi_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('user/supervisi/details',$data);
  }
   else
    {
      redirect('login/logout');
    }

  }

      public function update($id) {
        $data = array();
        $data['rkk'] = $this->input->post('rkk');
        $data['supervisi'] = $this->input->post('');
        $data['unit'] = $this->input->post('unit');
        $data['karyawan'] = $this->input->post('karyawan');
        
        $this->form_validation->set_rules('unit', 'Unit', 'trim|required');
        $this->form_validation->set_rules('supervisi', 'Supervisi', 'trim|required');

        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->U_supervisi_model->update_supervisi_info($data,$id);

            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('u_supervisi');
            } else {
                $this->session->set_flashdata('message', 'Data Asuhan Berhasil Diupdate !');
                redirect('u_supervisi');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('u_supervisi/add');
        }
    }

   public function print($id_supervisi){

    if($this->session->userdata('logged_in')!="" )
    {

      $data= array();
      $supervisi_info = $this->U_supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->U_supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->U_supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->U_supervisi_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('user/supervisi/supervisi_print',$data);
  }
   else
    {
      redirect('login/logout');
    }

  }

  public function pdf($id_supervisi){

    if($this->session->userdata('logged_in')!="")
    {
      
      $data= array();
      $supervisi_info = $this->U_supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->U_supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->U_supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->U_supervisi_model->supervisi_info_by_id($id_supervisi);

      $this->load->library('pdf');
      $this->pdf->load_view('user/supervisi/pdf', $data);
      $this->pdf->setPaper('A4', 'portrait');
      $this->pdf->render();
      $this->pdf->stream("supervisi.pdf");
  
  }
   else
    {
      redirect('login/logout');
    }

  }

    public function delete($id){ 
        $result = $this->U_supervisi_model->delete_supervisi_info($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Data berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('u_supervisi');
        } else {
            $this->session->set_flashdata('message', 'Delete Data Asuhan Gagal !');
             redirect('u_supervisi');
        }
    }
    

 }