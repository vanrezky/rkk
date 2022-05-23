
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


    public function __construct()
    {
        parent::__construct();      
        $this->load->helper('aplikasi');
        $this->load->library('form_validation');
        $this->load->model('Laporan_model');
        $this->load->model('Supervisi_model');  
    }
    public function index()
    {
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
        { 
            $this->load->view('admin/laporan/laporan');
        }
        else
        {
            redirect('login/logout');
        }

    }
    
    public function supervisi1()
    {
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    { 
        if($this->session->userdata()=="Semua")
                {   
                    $data=array();
                    //$data ['get_karyawan']=$this->Penilaian_model->get_all_karyawan();

                    //$d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi'");
                    
                    $this->load->view('admin/laporan/supervisi',$data);

                }

                else
                {   
                    

                    $data = array('data_supervisi' => $this->Laporan_model->tampil_data_supervisi());
                    $data['get_karyawan']=$this->Laporan_model->get_all_karyawan();
                    // $set_lap2['tanggal_awal'] = $this->session->userdata('tanggal_awal');
                    // $set_lap2['tanggal_akhir'] = $this->session->userdata('tanggal_akhir');

                    // $d['data_supervisi'] = $this->db->query("SELECT * FROM supervisi a LEFT JOIN karyawan b ON a.karyawan=b.id_karyawan WHERE a.tanggal_supervisi BETWEEN '".$set_lap2['tanggal_awal']."' AND '".$set_lap2['tanggal_akhir']."' ORDER BY a.tanggal_supervisi DESC");

                

                    $this->load->view('admin/laporan/supervisi',$data);
              }
          }
        else
          {
            redirect('login/logout');
          }

        }

        public function supervisi() {
            if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
            {
              $data = array();
              $data['get_all_supervisi']=$this->Supervisi_model->get_all_supervisi_info();
              $this->load->view('admin/laporan/supervisi', $data);
                }
          else
            {
              redirect('login/logout');
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
        
          $this->load->view('admin/laporan/details',$data);
      }
       else
        {
          redirect('login/logout');
        }

      }
        
    public function set_supervisi()
    {       
            $data = array();
            $supervisi_info = $this->Laporan_model->supervisi_info_by_id($id_supervisi);
            $id_karyawan = $supervisi_info->id_karyawan;
            $tanggal_supervisi = $supervisi_info->tanggal_supervisi;
            $ka_unit = $supervisi_info->ka_unit;    
            $sel_lap1['nama'] = $this->input->post('nama');
            $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
            $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
            $this->session->set_userdata($sel_lap1);
            redirect('laporan/supervisi');

    }

    public function cetak_excel()
    {   
        $set_lap2b = $this->session->userdata('tanggal_awal');
        $set_lap2c = $this->session->userdata('tanggal_akhir');

        $data = array();
        $data = array( 'title' => 'Laporan Supervisi','data_supervisi' => $this->Laporan_model->tampil_data_supervisi());


        // $sel_lap1['tanggal_awal'] = $this->input->post('tanggal_awal');
        // $sel_lap1['tanggal_akhir'] = $this->input->post('tanggal_akhir');
        // $this->session->set_userdata($sel_lap1);
        

        $this->load->view('admin/laporan/cetak_excel', $data);
    }


    //----------------------------------------------------------------------------------

    public function penilaian() {
      if($this->session->userdata('logged_in')!=""&& $this->session->userdata('id_level')=="1")
      { 
        $data = array();
        $data['tampil_data'] = $this->db->query("SELECT id_supervisi, tanggal_supervisi, id_karyawan, nama_karyawan, AVG(nilai) AS total FROM supervisi LEFT JOIN detail_supervisi USING(id_supervisi) INNER JOIN karyawan USING(id_karyawan) GROUP BY id_supervisi ORDER BY id_supervisi DESC");

        $this->load->view('admin/laporan/penilaian', $data);
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
            redirect('laporan/supervisi');

    }
}

