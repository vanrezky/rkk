<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_laporan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();      
        $this->load->helper('aplikasi');
        $this->load->library('form_validation');
        $this->load->model('Ulaporan_model');
    }
    public function index()
    {
        if($this->session->userdata('logged_in')!="")
        {
            $this->load->view('user/laporan/laporan');
        }
        else
        {
            redirect('login/logout');
        }
    }
    // public function supervisi1()
    // {
    //     if($this->session->userdata('logged_in')!="")
    // { 
    //     if($this->session->userdata()=="Semua")
    //             {   
    //                 $data = array();
    //                 $data ['get_karyawan']=$this->Penilaian_model->get_all_karyawan();

    //                 $d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi WHERE tanggal_supervisi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                    
    //                 $this->load->view('user/laporan/supervisi',$data);
    //             }
    //             else
    //             {

    //                 $data = array('data_supervisi' => $this->Ulaporan_model->tampil_data_supervisi());
    //                 $data['get_karyawan']=$this->Ulaporan_model->get_all_karyawan();
    //                 // $set_lap2['tanggal_awal'] = $this->session->userdata('tanggal_awal');
    //                 // $set_lap2['tanggal_akhir'] = $this->session->userdata('tanggal_akhir');

    //                 // $d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi a LEFT JOIN karyawan b ON a.karyawan=b.id_karyawan WHERE a.tanggal_supervisi BETWEEN '".$set_lap2['tanggal_awal']."' AND '".$set_lap2['tanggal_akhir']."' ORDER BY a.tanggal_supervisi DESC");

    //                 $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
    //                 $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
    //                 $this->session->set_userdata($sel_lap1);
                

    //                 $this->load->view('user/laporan/supervisi',$data);
    //           }
    //       }
    //     else
    //       {
    //         redirect('login/logout');
    //       }

    //     }

    public function supervisi() {
        if($this->session->userdata('logged_in')!="" )
        {
            $data = array();
            $data['get_all_supervisi']=$this->Ulaporan_model->get_all_supervisi_info();
            $this->load->view('user/laporan/supervisi', $data);
            }
          else
            {
              redirect('login/logout');
            }
        }
        
    public function set_supervisi()
    {
            $sel_lap1['nama'] = $this->input->post('nama');
            $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
            $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
            $this->session->set_userdata($sel_lap1);
            redirect('u_laporan/supervisi');

    }

    public function penilaian() {
      if($this->session->userdata('logged_in')!="")
      { 
        $data = array();
        //$data['tampil_data']=$this->Upenilaian_model->tampil_data_avg();
        $id = $this->session->userdata('id_user');
        $data['tampil_data'] = $this->db->query("SELECT id_supervisi, tanggal_supervisi, id_karyawan, nama_karyawan, AVG(nilai) AS total FROM supervisi LEFT JOIN detail_supervisi USING(id_supervisi) INNER JOIN karyawan USING(id_karyawan) WHERE kepala_unit=$id GROUP BY id_supervisi ORDER BY id_supervisi DESC");
        //$data['tampil_data'] = $this->db->query("SELECT id_penilaian, kepala_unit, id_karyawan, nama_karyawan, tanggal_penilaian, AVG(nilai) AS total FROM penilaian LEFT JOIN karyawan USING(id_karyawan) WHERE kepala_unit=$id GROUP BY id_karyawan,tanggal_penilaian");
        
        $this->load->view('user/penilaian/data_penilaian', $data);
              }
        else
          {
            redirect('login/logout');
          }

        }
        
    public function set_penilaian()
    {
            $sel_lap1['nama'] = $this->input->post('nama');
            $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
            $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
            $this->session->set_userdata($sel_lap1);
            redirect('u_laporan/supervisi');

    }

    public function details($id_supervisi){

        if($this->session->userdata('logged_in')!="")
        {

          $data= array();
          $supervisi_info = $this->Ulaporan_model->supervisi_info_by_id($id_supervisi);
          $id_karyawan = $supervisi_info->id_karyawan;
          $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
          $ka_unit = $supervisi_info->ka_unit;
          
          
          $data['karyawan_info'] =$this->Ulaporan_model->karyawan_info_by_id($id_karyawan);
          $data['supervisi_details_info'] =$this->Ulaporan_model->supervisidetails_info_by_id($id_supervisi);
          $data['supervisi_info'] =$this->Ulaporan_model->supervisi_info_by_id($id_supervisi);
        
          $this->load->view('user/laporan/details',$data);
    }
       else
        {
          redirect('login/logout');
        }

    }
       public function print($id_supervisi){

    if($this->session->userdata('logged_in')!="" )
    {

      $data= array();
      $supervisi_info = $this->Ulaporan_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Ulaporan_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Ulaporan_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Ulaporan_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('user/supervisi/supervisi_print',$data);
  }
   else
    {
      redirect('login/logout');
    }

  }

   public function pdf($id_supervisi){

    if($this->session->userdata('logged_in')!="" )
    {
      
      $data= array();
      $supervisi_info = $this->Ulaporan_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Ulaporan_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Ulaporan_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Ulaporan_model->supervisi_info_by_id($id_supervisi);

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
}
