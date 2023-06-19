<?php
class Add_sub_sub_menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_sub_sub_menus()
    {
        $query = $this->db->get('add_sub_sub_menu');
        return $query->result();
    }

    public function insert_menu($data)
    {
        $this->db->insert('add_sub_sub_menu', $data);
        return $this->db->insert_id();
    }

    // public function edit_sub_menu($id)
    // {
    //     $query = $this->db->get_where('add_sub_menu', ['id' => $id]);
    //     return $query->row();
    // }

    // public function update_menu($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('add_menu', $data);
    //     //$this->db->where('id',$id)->update('add_menu',$data);
    // }

    // public function delete_submenu($id) {
    //     $this->db->where('id', $id);
    //     $this->db->delete('add_sub_menu');
    // }
}
