<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class orderController extends CI_Controller {

		public function checkLogin()
		{
			if(!$this->session->userdata('logged_in')){
				redirect(base_url('login'));
			}
		}

		public function index()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
            $this->load->model('orderModel');
			$data['order'] = $this->orderModel->selectOrder();
			$this->load->view("order_admin/listOrder", $data);
			$this->load->view("component-admin/footer");
		}


		public function viewOrder($order_code)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
            $this->load->model('orderModel');
			$data['order_details'] = $this->orderModel->selectOrderDetails($order_code);
			$this->load->view("order_admin/viewOrder", $data);
			$this->load->view("component-admin/footer");
		}

		public function deleteOrder($order_code)
		{
            $this->load->model('orderModel');
			$del_order_details = $this->orderModel->deleteOrderDetails($order_code);
			$del  = $this->orderModel->deleteOrder($order_code);
			if($del && $del_order_details){
				$this->session->set_flashdata('success', 'Xóa đơn hàng thành công');
				redirect(base_url('order_admin/listOrder'));
			}else{
				$this->session->set_flashdata('error', 'Xóa đơn hàng thất bại');
				redirect(base_url('order-admin/listOrder'));
			}
		}
		public function update_order_status()
		{
			$value = $this->input->post('value');
			$order_code = $this->input->post('order_code');
			$this->load->model('orderModel');
			$data = array(
				'status' => $value
			);
			$this->orderModel->updateOrder($data, $order_code);
		}
    }
?>