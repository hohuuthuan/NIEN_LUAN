<?php
class orderModel extends CI_Model
{

    
    public function selectOrder()
    {
        $query =$this->db->select('orders.*, shipping.*')
        ->from('orders')
        ->join('shipping', 'orders.form_of_payment_id= shipping.id')
        ->get();

        return $query->result();
    }

    public function selectOrderDetails($orderCode)
    {
        $query =$this->db->select('orders.order_code, orders.status as order_status, orders_details.quantity as qty, orders_details.order_code,orders_details.product_id, products.*')
        ->from('orders_details')
        ->join('products', 'orders_details.product_id= products.id')
        ->join('orders', 'orders.order_code= orders_details.order_code')
        ->where('orders_details.order_code', $orderCode)
        ->get();

        return $query->result();    
    }
    public function printOrderDetails($orderCode)
    {
        $query =$this->db->select('orders.order_code, orders.status as order_status, orders_details.quantity as qty, orders_details.order_code,orders_details.product_id, products.*')
        ->from('orders_details')
        ->join('products', 'orders_details.product_id= products.id')
        ->join('orders', 'orders.order_code= orders_details.order_code')
        ->where('orders_details.order_code', $orderCode)
        ->get();

        return $query->result();    
    }

    public function deleteOrder($order_code)
    {
        return $this->db->delete('orders',['order_code'=>$order_code] );
    }

    public function deleteOrderDetails($order_code)
    {
        $this->db->where_in('order_code', $order_code);
        return $this->db->delete('orders_details');
    }

    public function updateOrder($data, $order_code)
    {
        return $this->db->update('orders', $data, ['order_code' => $order_code]);
        
    }
}

?>