<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class brandController extends CI_Controller {

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
			
            $this->load->model('brandModel');
			$data['brand'] = $this->brandModel->selectBrand();
			$this->load->view("brand/listBrand", $data);
			$this->load->view("component-admin/footer");
		}

        public function createBrand()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			$this->load->view("brand/createBrand");
			$this->load->view("component-admin/footer");
		}
		
		public function storeBrand(){
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn cần điền %s']);
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn cần chọn %s']);
			

			if ($this->form_validation->run()) {

				$ori_filename = $_FILES['image']['name'];
				$new_name = time()."".str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/brand',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view("component-admin/header");
					$this->load->view("component-admin/navbar");
					$this->load->view("brand/createBrand", $error);
					$this->load->view("component-admin/footer");
				}else{
					$brand_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'description' => $this->input->post('description'),
						'image' => $brand_filename,
						'status' => $this->input->post('status'),
					];
					$this->load->model('brandModel');
					$this->brandModel->insertBrand($data);
					$this->session->set_flashdata('success', 'Đã thêm thương hiệu thành công');
					redirect(base_url('brand/list'));

				}

				
			}else{
				$this->createBrand();
			}
		}

		public function editBrand($id)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			

			$this->load->model('brandModel');
			$data['brand'] = $this->brandModel->selectBrandById($id);

			$this->load->view("brand/editBrand", $data);
			$this->load->view("component-admin/footer");
		}
		
		public function updateBrand($id)
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn cần điền %s']);
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn cần chọn %s']);
			

			if ($this->form_validation->run()) {

				if(!empty($_FILES['image']['name'])){
					// Upload Image
					$ori_filename = $_FILES['image']['name'];
					$new_name = time()."".str_replace(' ', '-', $ori_filename);
					$config = [
						'upload_path' => './uploads/brand',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'file_name' => $new_name
					];
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('image')) {
						$error = array('error' => $this->upload->display_errors());
						$this->load->view("component-admin/header");
						$this->load->view("component-admin/navbar");
						$this->load->view("brand/createBrand", $error);
						$this->load->view("component-admin/footer");
					}else{
						$brand_filename = $this->upload->data('file_name');
						$data = [
							'title' => $this->input->post('title'),
							'slug' => $this->input->post('slug'),
							'description' => $this->input->post('description'),
							'image' => $brand_filename,
							'status' => $this->input->post('status'),
						];
					}
				}else{
					$data = [
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'description' => $this->input->post('description'),
						'status' => $this->input->post('status'),
					];
				}
				$this->load->model('brandModel');
				$this->brandModel->updateBrand($id,$data);
				$this->session->set_flashdata('success', 'Đã chỉnh sửa thương hiệu thành công');
				redirect(base_url('brand/list'));	
			}else{
				$this->editBrand($id);
			}
		}

		public function deleteBrand($id)
		{
			$this->load->model('brandModel');
			$this->load->model('productModel'); // Đảm bảo có model kiểm tra sản phẩm liên kết
	
			// Kiểm tra xem thương hiệu có sản phẩm liên kết hay không
			$brandUsedInProducts = $this->brandModel->checkBrandInProducts($id);
	
			if ($brandUsedInProducts) {
				// Nếu có sản phẩm sử dụng thương hiệu này, không cho phép xóa
				$this->session->set_flashdata('error', 'Không thể xóa thương hiệu vì có sản phẩm đang sử dụng.');
			} else {
				// Nếu không có sản phẩm nào liên kết, thực hiện xóa
				if ($this->brandModel->deleteBrand($id)) {
					$this->session->set_flashdata('success', 'Đã xóa thương hiệu thành công');
				} else {
					$this->session->set_flashdata('error', 'Xóa thương hiệu thất bại');
				}
			}
	
			redirect(base_url('brand/list'));
		}
}
