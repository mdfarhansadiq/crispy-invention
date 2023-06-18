<?php
class Add_menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_menus()
    {
        $query = $this->db->get('add_menu');
        return $query->result();
    }

    public function insert_menu($data)
    {
        $this->db->insert('add_menu', $data);
        return $this->db->insert_id();
    }

    public function edit_menu($id)
    {
        $query = $this->db->get_where('add_menu', ['id' => $id]);
        return $query->row();
    }

    // public function update_menu($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('add_menu', $data);
    //     //$this->db->where('id',$id)->update('add_menu',$data);
    // }

    public function delete_menu($id) {
        $this->db->where('id', $id);
        $this->db->delete('add_menu');
    }
}
