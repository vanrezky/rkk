<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class U_penilaian extends CI_Controller {


    public function __construct()
    {
        parent::__construct();      
        $this->load->helper('aplikasi');
        $this->load->library('form_validation');
        $this->load->model('Upenilaian_model');
    }

    public function index() {
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
    
    public function add()
    {
    if($this->session->userdata('logged_in')!="" )
    { 
        if($this->session->userdata()=="Semua")
                {
                    $data = array();
                    $data ['get_karyawan']=$this->Upenilaian_model->get_all_karyawan();
                    $d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi WHERE AND tanggal_supervisi'");
                    
                    $this->load->view('user/penilaian/penilaian',$data);
                }
                else
                {   
                    $data = array('data_supervisi' => $this->Upenilaian_model->tampil_data());
                    $data['get_karyawan']=$this->Upenilaian_model->get_all_karyawan();

                    $this->load->view('user/penilaian/penilaian',$data);
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
            $sel_lap1['tanggal'] = $this->input->post('tanggal');
            $this->session->set_userdata($sel_lap1);

            redirect('u_penilaian/add');

    }

    public function save()
    {
        // $id_supervisi (primary key)
        $nilai              = $this->input->post('nilai');
        $id_supervisi       = $this->input->post('id_supervisi');
        $tanggal_penilaian  = date('Y-m-d');
        $id_karyawan       = $this->input->post('id_karyawan');


        $data  = array();
        $i = 0;
        $ii = 0;
        foreach ($nilai as $key) {
            array_push($data, array(
                // 'id_supervisi' => $i,
                'id_supervisi' => $id_supervisi[$i],
                'id_karyawan' => $id_karyawan[$ii],
                'nilai' => $key,
                'tanggal_penilaian' => $tanggal_penilaian,
                'id_karyawan' => $id_karyawan[$i],
            ));
            $i++;
            $ii++;
        }

        $query = $this->Upenilaian_model->save_penilaian_info($data);
        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    $sel_lap1['nama'] = $this->input->post('nama');
                    $sel_lap1['tanggal'] = $this->input->post('tanggal');
                    $this->session->set_userdata($sel_lap1);

            redirect('u_penilaian');
        }else{
            redirect('u_penilaian/save');
        }
    }

    public function details($id_supervisi){

        if($this->session->userdata('logged_in')!="")
        {

          $data= array();
          $supervisi_info = $this->Upenilaian_model->supervisi_info_by_id($id_supervisi);
          $id_karyawan = $supervisi_info->id_karyawan;
          $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
          $ka_unit = $supervisi_info->ka_unit;
          
          
          $data['karyawan_info'] =$this->Upenilaian_model->karyawan_info_by_id($id_karyawan);
          $data['supervisi_details_info'] =$this->Upenilaian_model->supervisidetails_info_by_id($id_supervisi);
          $data['supervisi_info'] =$this->Upenilaian_model->supervisi_info_by_id($id_supervisi);

          $this->load->view('user/penilaian/details',$data);
      }
       else
        {
          redirect('login/logout');
        }
      }

  public function print($id_supervisi){

    if($this->session->userdata('logged_in')!="")
    {

      $data= array();
      $supervisi_info = $this->Upenilaian_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Upenilaian_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Upenilaian_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Upenilaian_model->supervisi_info_by_id($id_supervisi);
    
      $this->load->view('user/penilaian/penilaianprint',$data);
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
      $supervisi_info = $this->Upenilaian_model->supervisi_info_by_id($id_supervisi);
      $id_karyawan = $supervisi_info->id_karyawan;
      $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
      $ka_unit = $supervisi_info->ka_unit;
      
      
      $data['karyawan_info'] =$this->Upenilaian_model->karyawan_info_by_id($id_karyawan);
      $data['supervisi_details_info'] =$this->Upenilaian_model->supervisidetails_info_by_id($id_supervisi);
      $data['supervisi_info'] =$this->Upenilaian_model->supervisi_info_by_id($id_supervisi);

      $this->load->library('pdf');
      $this->pdf->load_view('user/penilaian/pdf', $data);
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