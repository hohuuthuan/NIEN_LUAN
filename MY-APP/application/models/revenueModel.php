<?php

class revenueModel extends CI_Model
{

    public function getRevenueByDay()
    {
        $this->db->select('DATE(date_delivered) as date, SUM(subtotal) as total');
        $this->db->group_by('DATE(date_delivered)');
        $query = $this->db->get('revenue');
        return $query->result();
    }

    public function getRevenueByMonth()
    {
        $this->db->select('YEAR(date_delivered) as year, MONTH(date_delivered) as month, SUM(subtotal) as total');
        $this->db->group_by('YEAR(date_delivered), MONTH(date_delivered)');
        $query = $this->db->get('revenue');
        return $query->result();
    }

    public function getRevenueByYear()
    {
        $this->db->select('YEAR(date_delivered) as year, SUM(subtotal) as total');
        $this->db->group_by('YEAR(date_delivered)');
        $query = $this->db->get('revenue');
        return $query->result();
    }


        public function getRevenueByCustomDate($date) {
            $this->db->select('*');
            $this->db->from('revenue');
            $this->db->where('DATE(date_delivered)', $date);
            $query = $this->db->get();
            return $query->result();
    
        }



}



?>