<?php

class U_karyawan_model extends CI_Model{
    
    public function save_karyawan_info($data){
        return $this->db->insert('karyawan', $data);
    }
    
    public function get_all_karyawan(){
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('unit','karyawan.unit=unit.id_unit');
        $this->db->order_by('karyawan.id_karyawan', 'DESC');
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
    
    // public function published_product_info($id) {
    //     $this->db->set('publication_status', 1);
    //     $this->db->where('product_id', $id);
    //     return $this->db->update('tbl_product');
    // }
    
    // public function unpublished_product_info($id) {
    //     $this->db->set('publication_status', 0);
    //     $this->db->where('product_id', $id);
    //     return $this->db->update('tbl_product');
    // }
    
    
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