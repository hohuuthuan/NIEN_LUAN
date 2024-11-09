<?php
class loginModel extends CI_Model
{
    public function checkLoginAdmin($email, $password)
    {
        $query = $this->db->where('email', $email)->where('password', $password)->where('status', 1)->where('role_id', 1)->get('users');
        return $query->result();
    }
    public function checkLoginCustomer($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function newCustomer($data)
    {
        return $this->db->insert('users', $data);

    }
    public function newUserAdmin($data)
    {
        return $this->db->insert('users', $data);

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
        return $this->db->insert('orders_details', $data_orders_details);

    }


}

?>