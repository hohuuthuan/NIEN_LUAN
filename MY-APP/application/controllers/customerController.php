<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class customerController extends CI_Controller {

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
			
            $this->load->model('customerModel');
			$data['customers'] = $this->customerModel->selectCustomer();
			$this->load->view("manage-customer/listCustomer", $data);
			$this->load->view("component-admin/footer");
		}


		public function editCustomer($id)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			

			$this->load->model('customerModel');
			$data['customers'] = $this->customerModel->selectCustomerById($id);

			$this->load->view("manage-customer/editCustomer", $data);
			$this->load->view("component-admin/footer");
		}

		public function updateCustomer($id)
		{	
				$data = [
					'status' => $this->input->post('status'),
				];
				$this->load->model('customerModel');
				$this->customerModel->updateCustomer($id,$data);
				$this->session->set_flashdata('success', 'Đã chỉnh sửa trạng thái khách hàng thành công');
				redirect(base_url('customer/list'));	
			
		}



		public function deleteCustomer($id)
		{
			$this->load->model('customerModel');
			$this->customerModel->deleteCustomer($id);
			$this->session->set_flashdata('success', 'Đã xoá danh mục thành công');
			redirect(base_url('category/list'));
		}

}
