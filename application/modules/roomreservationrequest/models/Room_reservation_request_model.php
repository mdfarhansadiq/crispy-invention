<?php
class Room_reservation_request_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_booking_info()
    {
        $query = $this->db->get('customer_booking_info');
        return $query->result();
    }

    public function insert_accepted_customer_booking_info($data)
    {
        $this->db->insert('accepted_customer_booking_infos', $data);
        //return $this->db->insert_id();
    }

    public function specific_customer_booking_info_accept($id)
    {
        $data = $this->db->get_where('customer_booking_info', ['id' => $id]);
        // $this->db->insert('accepted_customer_booking_infos', $data);
        // return $this->db->insert_id();
        return $data->row();
    }

    // public function update_menu($data, $id)
    // {
    //     $this->db->where('id', $id);
    //     $this->db->update('add_menu', $data);
    //     //$this->db->where('id',$id)->update('add_menu',$data);
    // }

    public function delete_specific_customer_booking_info($id) 
    {
        $this->db->where('id', $id);
        $this->db->delete('customer_booking_info');
    }
}
