<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct(){
        parent::__construct();
    $this->load->helper('aplikasi_helper');

        //$this->load->helper('dikdas');
        $this->load->model('User_model');
        $this->load->model('Userlevel_model');
    }
    public function index() {
    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {
        $data['data_user'] = $this->User_model->tampil_data();
        $this->load->view('admin/user/data_user',$data);
    }
  else
    {
      redirect('login/logout');
    }

  }

    public function tambah()
    {
       if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {

            $d['id_param'] = "";
            $d['username'] = "";
            $d['password'] = "";  
            $d['nama_lengkap'] = "";
            $d['email'] = "";
            $d['terakhir_login'] = "";
            $d['id_unit'] = "";
            $d['id_level'] = "";

            $d['st'] = "tambah";

            $d['mst_level']=$this->db->get('level');
            $d['mst_unit']=$this->db->get('unit');

    function get_username_availability() {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $results = $this->um->get_username($username);
            if ($results === TRUE) {
                echo '<span style="color:red;">Username Tidak Tersedia</span>';
            } else {
                echo '<span style="color:green;">Username Tersedia</span>';
            }
        } else {
            echo '<span style="color:red;">Username is required field.</span>';
        }
    }

            //$d['mst_poli'] = $this->db->get('tbl_poli');

             $this->load->view('admin/user/add_user',$d);

    }
     else
    {
      redirect('login/logout');
    }
}

  

    public function ubah()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            $id['id_user'] = $this->uri->segment(3);
            $q = $this->db->get_where("user",$id);
            $d = array();

            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id_user;
                $d['username'] = $dt->username;
                $d['password'] = $dt->password;
                $d['nama_lengkap'] = $dt->nama_lengkap;
                $d['email'] = $dt->email;
                $d['id_level'] = $dt->id_level;
                $d['id_unit'] = "";
                


            }
                $d['st'] = "edit";

                $d['mst_level']=$this->db->get('level');
                $d['mst_unit']=$this->db->get('unit');


                $this->load->view('admin/user/edit_user',$d);
        }
        else
        {
            redirect(site_url('user'));
        }
    }

    public function hapus($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('user'));
        }
    }

    public function simpan()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'required');



            
            $id['id_user'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("user",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id_user;
                        $d['username'] = $dt->username;
                        $d['password'] = $dt->password;  
                        $d['nama_lengkap'] = $dt->nama_lengkap;  
                        $d['email'] = $dt->email;
                        $d['id_level'] = $dt->id_level;
                        $d['id_unit'] = $dt->id_unit;
                        $d['terakhir_login'] = $dt->terakhir_login;  

                        $d['st'] = "edit";

                    }
                        $d['st'] = $st;
                        $d['mst_level']=$this->db->get('level');

                        $this->load->view('admin/tambah',$d);
                }
                else if($st=="tambah")
                {
                     $d['id_param'] = "";
                      $d['username'] = "";
                      $d['password'] = "";  
                      $d['nama_lengkap'] = "";
                      $d['email'] = "";
                      $d['terakhir_login'] = "";
                      $d['id_unit'] = "";
                      $d['id_level'] = "";   
                    
                    $d['st'] = $st;

                    $d['mst_level']=$this->db->get('level');

                    $this->load->view('admin/user/add_user',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['password'] = MD5($this->input->post('password'));
                    $upd['nama_lengkap'] = $this->input->post('nama_lengkap');
                    $upd['email'] = $this->input->post('email');
                    $upd['id_level'] = $this->input->post('id_level');

                    
                    $this->db->update("user",$upd,$id);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect(site_url('user'));
                }
                else if($st=="tambah")
                {
                    $in['username'] = $this->input->post('username');
                    $in['password'] = MD5($this->input->post('password'));
                    $in['nama_lengkap'] = $this->input->post('nama_lengkap');
                    $in['email'] = $this->input->post('email');
                    $in['terakhir_login'] = date('Y-m-d H:i:s');
                    $in['id_level'] = $this->input->post('id_level');
                    $in['id_unit'] = $this->input->post('id_unit');

                    //$in['foto'] = $this->input->post('foto');
                                    
                    $this->db->insert("user",$in);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(site_url('user'));
                }
            }
        }
        else
        {
            redirect(site_url('user'));
        }
    }

    //======================== LEVEL USER ==========================>

    public function level() {
    if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_level')=="1")
    {   
        $data['id_param'] = "";
        $data['level'] = "";
        $data['level'] = $this->Userlevel_model->tampil_data();
        $data['st'] = "tambah";


        $this->load->view('admin/user/level',$data);
    }
  else
    {
      redirect('login/logout');
    }

  }

   public function simpan_level()
    {
        if($this->session->userdata('logged_in')!="" )
        {
           
            $this->form_validation->set_rules('level', 'Level', 'required');



            
            $id['id_level'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("user",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id_user;
                        $d['level'] = $dt->level;

                        $d['st'] = "edit";

                    }
                        $d['st'] = $st;

                        $this->load->view('admin/user/level',$d);
                }
                else if($st=="tambah")
                {
                     $d['id_param'] = "";
                      $d['level'] = ""; 
                    
                    $d['st'] = $st;


                    $this->load->view('admin/user/level',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['level'] = $this->input->post('level');
                                    
                    $this->db->update("level",$upd,$id);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect(site_url('user/level'));
                }
                else if($st=="tambah")
                {
                    $in['level'] = $this->input->post('level');
                 
                                    
                                    
                    $this->db->insert("level",$in);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(site_url('user/level'));
                }
            
            }
        }
        else
        {
            redirect(site_url('level'));
        }
    }

        public function hapus_level($id) 
    {
        $row = $this->Userlevel_model->get_by_id($id);

        if ($row) {
            $this->Userlevel_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('user/level'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('user/level'));
        }
    }

}
