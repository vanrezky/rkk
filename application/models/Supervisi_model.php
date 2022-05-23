<?php

class Supervisi_model extends CI_Model{

    public function save_penilaian_info($data){
        return $this->db->insert_batch('penilaian', $data);
    }
    
    public function save_detail_supervisi_info($data){
        return $this->db->insert_batch('detail_supervisi', $data);
    }

    public function save_supervisi_info($data) {
        $this->db->set('tanggal_supervisi', date("Y-m-d"));
        $this->db->insert('supervisi', $data);
        return $this->db->insert_id();
    }

    public function tampil_data(){
        //$id = $this->session->userdata['id_user']['id'];
        $this->db->select('*');
        $this->db->from('rkk');
        $this->db->order_by('id_rkk', 'ASC');
        //$this->db->where('user', $id);
        $info = $this->db->get();
        return $info->result();
    }
    public function get_all_supervisi_info(){
        //$id = $this->session->userdata['id_user']['id'];
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->join('karyawan','karyawan.id_karyawan=supervisi.id_karyawan');
        $this->db->join('user','user.id_user=supervisi.ka_unit');
        $this->db->order_by('supervisi.id_supervisi', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function supervisi_info_by_id($id_supervisi){
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->where('id_supervisi',$id_supervisi);
        $result = $this->db->get();
        return $result->row();
    }

    public function supervisi_info_edit_by_id($id_supervisi){
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->where('id_supervisi',$id_supervisi);
        $result = $this->db->get();
        return $result->row();
    }

    public function supervisidetails_info_by_id($id_supervisi){
        $this->db->select('*');
        $this->db->from('detail_supervisi');
        $this->db->where('id_supervisi',$id_supervisi);
        $result = $this->db->get();
        return $result->result();
    }

    public function karyawan_info_by_id($kary_id){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('unit', 'karyawan.unit=unit.id_unit');
        $this->db->join('user', 'karyawan.kepala_unit=user.id_user');
        $this->db->where('id_karyawan',$kary_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function edit_supervisi_info($id){
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->join('karyawan','karyawan.id_karyawan=supervisi.karyawan');
        $this->db->join('user','user.id_user=supervisi.ka_unit');
        $this->db->order_by('supervisi.id_supervisi', 'DESC');
        $this->db->where('id_supervisi', $id);//
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_supervisi_info($id){
        $this->db->where('id_supervisi', $id);
        return $this->db->delete('supervisi');
    }
    
    public function update_supervisi_info($data,$id){
        $this->db->where('id_supervisi', $id);
        return $this->db->update('supervisi', $data);
    }

    public function update_supervisi_detail_info($data,$id){
        $this->db->where('id_detail_supervisi', $id);
        return $this->db->update('detail_supervisi', $data);
    }
    
    public function get_all_karyawan(){
        //$id = $this->session->userdata['id_user']['id'];
        $tanggal = date('Y-m-d');
        $this->db->from('karyawan');
        $this->db->join('user','user.id_user=karyawan.kepala_unit');
        //$this->db->join('supervisi','supervisi.id_karyawan=karyawan.id_karyawan','left');
        //$this->db->where_not_in('tanggal_supervisi', $tanggal);
        $this->db->order_by('karyawan.id_karyawan', 'DESC');
        //$this->db->where('kepala_unit', $id);//
        $info = $this->db->get();
        return $info->result();
    }

       public function view_data_karyawan($id){
        $this->db->join('user', "karyawan.kepala_unit=user.id_user");
        $this->db->join('unit', "karyawan.unit=unit.id_unit",'left');
            return $this->db->get_where('karyawan', "karyawan.id_karyawan='$id'");
   }
    
}