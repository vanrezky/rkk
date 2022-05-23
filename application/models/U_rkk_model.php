<?php

class U_rkk_model extends CI_Model{
    
    public function save_rkk_info($data){
        return $this->db->insert('rkk', $data);
    }
    
    public function get_all_rkk(){
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('rkk');
        $this->db->join('user','rkk.user=user.id_user');
        $this->db->join('unit','rkk.unit=unit.id_unit');
        $this->db->order_by('rkk.id_rkk', 'DESC');
        $this->db->where('user', $id);//
        $info = $this->db->get();
        return $info->result();
    }
    
    public function edit_rkk_info($id){
        $this->db->select('*');
        $this->db->from('rkk');
        $this->db->join('user','rkk.user=user.id_user');
        $this->db->join('unit','rkk.unit=unit.id_unit');
        $this->db->order_by('rkk.id_rkk', 'DESC');
        $this->db->where('id_rkk', $id);//
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_rkk_info($id){
        $this->db->where('id_rkk', $id);
        return $this->db->delete('rkk');
    }
    
    public function update_rkk_info($data,$id){
        $this->db->where('id_rkk', $id);
        return $this->db->update('rkk', $data);
    }

    
    public function get_all_unit(){
        $this->db->select('*');
        $this->db->from('unit');
        $info = $this->db->get();
        return $info->result();
    }
    
}