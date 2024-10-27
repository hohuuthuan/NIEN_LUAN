<?php 
    class loginModel extends CI_Model
    {
        public function checkLogin($email, $password)
        {
            $query = $this->db->where('email', $email)->where('password', $password)->get('user');
            return $query->result();
        }
        public function checkLoginCustomer($email, $password)
        {
            $query = $this->db->where('email', $email)->where('password', $password)->get('customers');
            return $query->result();
        }
        public function newCustomer($data)
        {
            return $this->db->insert('customers', $data);
        
        }
        public function newShipping($data)
        {
            $this->db->insert('shipping', $data);
            return $form_of_payment_id = $this->db->insert_id();
        
        }
        public function insert_orders($data_orders)
        {
            return $this->db->insert('orders', $data_orders);
        
        }

        public function insert_orders_details($data_orders_details)
        {
            return $this->db->insert('orders_details',$data_orders_details);
        
        }

       
    }

?>