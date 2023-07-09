<?php
class Room_reservation_list_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_booking_info()
    {
        $query = $this->db->get('accepted_customer_booking_infos');
        return $query->result();
    }
}
