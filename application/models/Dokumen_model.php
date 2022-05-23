<?php

class Dokumen_model extends CI_Model{
    
    public function save_dokumen_info($data){
        $this->db->set('create_at', date("Y-m-d H:i:s"));
        $this->db->set('update_at', date("Y-m-d H:i:s"));
        return $this->db->insert('jenis_dokumen', $data);
    }
    
    public function get_all_dokumen(){
        $this->db->select('*');
        $this->db->from('jenis_dokumen');
        $this->db->order_by('id_jenis_dokumen', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }
    
    public function edit_dokumen_info($id){
        $this->db->select('*');
        $this->db->from('jenis_dokumen');
        $this->db->order_by('jenis_dokumen.id_jenis_dokumen', 'DESC');
        $this->db->where('id_jenis_dokumen', $id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_dokumen_info($id){
        $this->db->where('id_jenis_dokumen', $id);
        return $this->db->delete('jenis_dokumen');
    }
    
    public function update_dokumen_info($data,$id){
        $this->db->where('id_jenis_dokumen', $id);
        return $this->db->update('jenis_dokumen', $data);
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
    
    
    // public function get_all_published_category(){
    //     $this->db->select('*');
    //     $this->db->from('tbl_category');
    //     $this->db->where('publication_status',1);
    //     $info = $this->db->get();
    //     return $info->result();
    // }
    
    public function get_all_unit(){
        $this->db->select('*');
        $this->db->from('unit');
        $info = $this->db->get();
        return $info->result();
    }
    
}