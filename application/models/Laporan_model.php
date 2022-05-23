<?php

class Laporan_model extends CI_Model{
    
    public function save_penilaian_info($data){
        return $this->db->insert_batch('penilaian', $data);
    }

    public function tampil_data_supervisi(){
        $set_lap2a = $this->session->userdata('nama');
        $set_lap2b = $this->session->userdata('tanggal_awal');
        $set_lap2c = $this->session->userdata('tanggal_akhir');
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->join('karyawan','supervisi.id_karyawan=karyawan.id_karyawan','left');
        $this->db->join('detail_supervisi','supervisi.id_supervisi=detail_supervisi.id_supervisi','left');
        $this->db->where('tanggal_supervisi BETWEEN "'. date('Y-m-d', strtotime($set_lap2b)). '" and "'. date('Y-m-d', strtotime($set_lap2c)).'"','after');
        $this->db->like('supervisi.id_karyawan', $set_lap2a, 'after');
        $this->db->order_by('supervisi.id_supervisi', 'ASC');
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

    public function tampil()
    {   
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('karyawan','penilaian.id_karyawan=karyawan.id_karyawan','left');
        $info = $this->db->get();
        return $info->result();

    }

    public function get_all_karyawan(){
        $this->db->select('*');
        $this->db->from('supervisi');
        $this->db->join('karyawan','supervisi.id_karyawan=karyawan.id_karyawan');
        $this->db->group_by('supervisi.id_karyawan', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_all_penilaian(){
        $id = $this->session->userdata['id_user']['id'];
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('unit','penilaian.unit=unit.id_unit');
        $this->db->order_by('penilaian.id_penilaian', 'DESC');
        $this->db->where('kepala_unit', $id);//
        $info = $this->db->get();
        return $info->result();
    }
    
    public function edit_karyawan_info($id){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->order_by('karyawan.id_karyawan', 'DESC');
        $this->db->where('id_karyawan', $id);//
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_karyawan_info($id){
        $this->db->where('id_karyawan', $id);
        return $this->db->delete('karyawan');
    }
    
    public function update_karyawan_info($data,$id){
        $this->db->where('id_karyawan', $id);
        return $this->db->update('karyawan', $data);
    }
    public function get_all_published_category(){
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $info = $this->db->get();
        return $info->result();
    }
    
    public function get_all_unit(){
        $this->db->select('*');
        $this->db->from('unit');
        $info = $this->db->get();
        return $info->result();
    }
    
}