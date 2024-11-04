<?php
class customerModel extends CI_Model
{
    public function selectCustomer()
    {
        $this->db->where('role_id', 2);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function selectCustomerById($id)
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        return $query->row();
    }

    public function updateCustomer($id, $data)
    {
        return $this->db->update('users', $data, ['id' => $id]);
    }

    public function deleteCustomer($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }
}

?>