<?php
defined('BASEPATH') or exit('No direct script access allowed');
class customerController extends CI_Controller
{

	public function checkLogin()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$this->config->config['pageTitle'] = 'List Customers';
		$this->load->view("component-admin/header");
		$this->load->view("component-admin/navbar");

		$this->load->model('customerModel');
		$data['customers'] = $this->customerModel->selectCustomer();
		$this->load->view("manage-customer/listCustomer", $data);
		$this->load->view("component-admin/footer");
	}


	public function editCustomer($id)
	{
		$this->config->config['pageTitle'] = 'Edit Customer';
		$this->load->view("component-admin/header");
		$this->load->view("component-admin/navbar");

		$this->load->model('customerModel');
		$data['customers'] = $this->customerModel->selectCustomerById($id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		$this->load->view("manage-customer/editCustomer", $data);
		$this->load->view("component-admin/footer");
	}


	public function updateCustomer($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Bạn cần diền %s']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn cần điền %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Bạn cần diền %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Bạn cần chọn %s']);


		if ($this->form_validation->run()) {

			if (!empty($_FILES['image']['name'])) {
				// Upload Image
				$ori_filename = $_FILES['image']['name'];
				$new_name = time() . "" . str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/user',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view("component-admin/header");
					$this->load->view("component-admin/navbar");
					$this->load->view("manage-customer/editCustomer", $error);
					$this->load->view("component-admin/footer");
				} else {
					$avatar_filename = $this->upload->data('file_name');
					$data = [
						'username' => $this->input->post('username'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
						'address' => $this->input->post('address'),
						'avatar' => $avatar_filename,
						'status' => $this->input->post('status'),
					];
				}
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
					'status' => $this->input->post('status'),
				];
			}
		$this->load->model('customerModel');
		$this->customerModel->updateCustomer($id, $data);
		$this->session->set_flashdata('success', 'Đã chỉnh sửa trạng thái khách hàng thành công');
		redirect(base_url('customer/list'));
		} else {
			$this-> editCustomer($id);
		}
	}

	public function deleteCustomer($id)
	{
		$this->load->model('customerModel');
		$this->customerModel->deleteCustomer($id);
		$this->session->set_flashdata('success', 'Đã xoá người dùng thành công');
		redirect(base_url('category/list'));
	}

}
