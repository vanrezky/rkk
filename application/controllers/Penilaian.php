<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {


    public function __construct()
    {
        parent::__construct();      
        $this->load->helper('aplikasi');
        $this->load->library('form_validation');
        $this->load->model('Penilaian_model');
        $this->load->model('Supervisi_model');
    }

    public function index() {
      if($this->session->userdata('logged_in')!=""&& $this->session->userdata('id_level')=="1")
      { 
        $data = array();

        $data['tampil_data'] = $this->db->query("SELECT id_supervisi, tanggal_supervisi, id_karyawan, nama_karyawan, AVG(nilai) AS total FROM supervisi LEFT JOIN detail_supervisi USING(id_supervisi) INNER JOIN karyawan USING(id_karyawan) GROUP BY id_supervisi ORDER BY id_supervisi DESC");

        $this->load->view('admin/penilaian/data_penilaian', $data);
              }
        else
          {
            redirect('login/logout');
          }

        }
    
    public function add()
    {
    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    { 
        if($this->session->userdata()=="Semua")
                {
                    // $data = array();
                    // $data ['get_karyawan']=$this->Penilaian_model->get_all_karyawan();
                    // $d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi WHERE AND tanggal_supervisi'");
                    
                    $this->load->view('admin/penilaian/penilaian',$data);
                }
                else
                {   
                    
                    // $data = array('data_supervisi' => $this->Penilaian_model->tampil_data());
                    $data = array();
                    $data['get_all_supervisi']=$this->Penilaian_model->get_supervisi_info();
                    $data['get_karyawan']=$this->Penilaian_model->get_all_karyawan();
                    
                    $this->load->view('admin/penilaian/penilaian',$data);
                }   
        }

      else
    {
      redirect('login/logout');
    }
  }     

    public function set()
    {

            $sel_lap1['nama'] = $this->input->post('nama');
            $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
            $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
            $this->session->set_userdata($sel_lap1);

            redirect('penilaian/add');

    }

public function details($id_supervisi){

    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {

      $data= array();
      $supervisi_info = $this->Penilaian_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Penilaian_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Penilaian_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Penilaian_model->supervisi_info_by_id($id_supervisi);
      //$data['penilaian_info'] =$this->Penilaian_model->penilaian_info_by_id($id_supervisi);

      $this->load->view('admin/penilaian/details',$data);
  }
   else
    {
      redirect('login/logout');
    }
  }

    public function save()
    {
        $nilai              = $this->input->post('nilai');
        $id_supervisi       = $this->input->post('id_supervisi');
        $tanggal_penilaian  = date('Y-m-d');
        $id_detail_supervisi = $this->input->post('id_detail_supervisi');
        $data  = array();
        $i = 0;
        $ii = 0;
        foreach ($nilai as $key) {
            array_push($data, array(
                // 'id_supervisi' => $i,
                'nilai' => $key,
                'tanggal_penilaian' => $tanggal_penilaian,
                'id_supervisi' => $id_supervisi[$i],
                'id_detail_supervisi' => $id_detail_supervisi[$ii],
            ));
            $i++;
            $ii++;
        }
        $query = $this->Penilaian_model->save_penilaian_info($data);
        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    $sel_lap1['nama'] = $this->input->post('nama');
                    $sel_lap1['tanggal'] = $this->input->post('tanggal');
                    $this->session->set_userdata($sel_lap1);

            redirect('penilaian/');
        }else{
            redirect('penilaian/save');
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
    
      $this->load->view('admin/penilaian/penilaianprint',$data);
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
      $this->pdf->load_view('admin/penilaian/pdf', $data);
      $this->pdf->setPaper('A4', 'portrait');
      $this->pdf->render();
      $this->pdf->stream("penilaian.pdf");
  
  }
   else
    {
      redirect('login/logout');
    }

  }
}
