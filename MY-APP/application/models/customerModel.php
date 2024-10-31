<?php 
    class customerModel extends CI_Model
    {

        public function selectCustomerById($user_id)
        {
            $query = $this->db->get_where('customers', ['id' => $user_id]); 
            return $query->row();  
        }

        public function updateCustomers($user_id, $data)
        {
            return $this->db->update('customers',$data, ['id'=>$user_id]);   
        }


    }
    
?>