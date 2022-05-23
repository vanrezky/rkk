<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Supervisi_model');
    }    
  public function index() {
    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
      $data = array();
      $data['get_all_supervisi']=$this->Supervisi_model->get_all_supervisi_info();
      $this->load->view('admin/supervisi/data_supervisi', $data);
        }
  else
    {
      redirect('login/logout');
    }
  }
  
  public function add() {
    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
      $data = array('tampildata' => $this->Supervisi_model->tampil_data());
      $data['all_karyawan']=$this->Supervisi_model->get_all_karyawan();
      $this->load->view('admin/supervisi/add_supervisi', $data);
    }
      else
    {
      redirect('login/logout');
    }

  }

    public function view_data()
  {
    if (isset($_POST['cari'])) {
      $data['v_data']  = $this->Supervisi_model->view_data_karyawan($this->input->post('id_karyawan'));
      $this->load->view('admin/supervisi/tabel_data', $data);
    }else {
      echo "Silahkan Cek koneksi internet Anda!";
    }
  }


  public function create(){

        $this->form_validation->set_rules('id_supervisi', 'Id supervisi', 'trim|required');
        $this->form_validation->set_rules('ka_unit', 'Ka unit', 'trim|required');
        $this->form_validation->set_rules('rkk', 'Rkk', 'trim|required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

        $oodata = array();
        $oodata['id_karyawan'] = $this->input->post('id_karyawan');
        // $oodata['ka_unit'] = $this->session->userdata('id_user');
        $oodata['ka_unit'] = $this->input->post('ka_unit');
        $id_supervisi = $this->Supervisi_model->save_supervisi_info($oodata);

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

        $query = $this->Supervisi_model->save_detail_supervisi_info($odata);
        //$query = $this->Supervisi_model->save_penilaian_info($data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supervisi');
        }else{
            redirect('supervisi/create');
        }
    }

  public function edit($id_supervisi){

    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {

      $data= array();
      $supervisi_info = $this->Supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Supervisi_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('admin/supervisi/edit_supervisi',$data);
  }
   else
    {
      redirect('login/logout');
    }
  }

    public function update(){   
        
        $data = array();
        // $id_supervisi (primary key)
        //$id_supervisi    = $id_supervisi;
        $id_detail = [];
        $rkk         = [$this->input->post('rkk')];
        $kualifikasi      = [$this->input->post('kualifikasi')];
        $data  = array();
        $i = 0;
        foreach ($kualifikasi as $key) {
          $this->db->where('id_detail_supervisi', $key['id_detail_supervisi']);
            //     'rkk' => $rkk[$i],
            //     'kualifikasi' => $key,
            //     'id_supervisi' => $id_supervisi,
            // ));
            $i++;
        }

        $query = $this->Supervisi_model->save_detail_supervisi_info($data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supervisi');
        }else{
            redirect('supervisi/edit');
        }
    }

  public function delete($id){
    $result = $this->Supervisi_model->delete_supervisi_info($id);
    if ($result) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('supervisi');
    } else {
        $this->session->set_flashdata('message', 'Product Deleted Failed');
         redirect('supervisi');
    }
  }

  public function details($id_supervisi){

    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {

      $data= array();
      $supervisi_info = $this->Supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Supervisi_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('admin/supervisi/details',$data);
  }
   else
    {
      redirect('login/logout');
    }

  }

   public function print($id_supervisi){

    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {

      $data= array();
      $supervisi_info = $this->Supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Supervisi_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('admin/supervisi/supervisi_print',$data);
  }
   else
    {
      redirect('login/logout');
    }

  }

   public function pdf($id_supervisi){

    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
      
      $data= array();
      $supervisi_info = $this->Supervisi_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Supervisi_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Supervisi_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Supervisi_model->supervisi_info_by_id($id_supervisi);

      $this->load->library('pdf');
      $this->pdf->load_view('admin/supervisi/pdf', $data);
      $this->pdf->setPaper('A4', 'portrait');
      $this->pdf->render();
      $this->pdf->stream("supervisi.pdf");
  
  }
   else
    {
      redirect('login/logout');
    }

  }
}

