<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class categoryController extends CI_Controller {

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
			
            $this->load->model('categoryModel');
			$data['category'] = $this->categoryModel->selectCategory();
			$this->load->view("category/listCategory", $data);
			$this->load->view("component-admin/footer");
		}

        public function createCategory()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			$this->load->view("category/createCategory");
			$this->load->view("component-admin/footer");
		}
		
		public function storeCategory(){
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn cần điền %s']);
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn cần chọn %s']);
			

			if ($this->form_validation->run()) {

				$ori_filename = $_FILES['image']['name'];
				$new_name = time()."".str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/category',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view("component-admin/header");
					$this->load->view("component-admin/navbar");
					$this->load->view("category/createCategory", $error);
					$this->load->view("component-admin/footer");
				}else{
					$category_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'description' => $this->input->post('description'),
						'image' => $category_filename,
						'status' => $this->input->post('status'),
					];
					$this->load->model('categoryModel');
					$this->categoryModel->insertcategory($data);
					$this->session->set_flashdata('success', 'Đã thêm danh mục thành công');
					redirect(base_url('category/list'));

				}

				
			}else{
				$this->createcategory();
			}
		}

		public function editcategory($id)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			

			$this->load->model('categoryModel');
			$data['category'] = $this->categoryModel->selectcategoryById($id);

			$this->load->view("category/editcategory", $data);
			$this->load->view("component-admin/footer");
		}
		
		public function updatecategory($id)
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
						'upload_path' => './uploads/category',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'file_name' => $new_name
					];
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('image')) {
						$error = array('error' => $this->upload->display_errors());
						$this->load->view("component-admin/header");
						$this->load->view("component-admin/navbar");
						$this->load->view("category/createCategory", $error);
						$this->load->view("component-admin/footer");
					}else{
						$category_filename = $this->upload->data('file_name');
						$data = [
							'title' => $this->input->post('title'),
							'slug' => $this->input->post('slug'),
							'description' => $this->input->post('description'),
							'image' => $category_filename,
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
				$this->load->model('categoryModel');
				$this->categoryModel->updateCategory($id,$data);
				$this->session->set_flashdata('success', 'Đã chỉnh sửa danh mục thành công');
				redirect(base_url('category/list'));	
			}else{
				$this->editCategory($id);
			}
		}

		public function deleteCategory($id)
		{
			$this->load->model('categoryModel');
			$this->categoryModel->deleteCategory($id);
			$this->session->set_flashdata('success', 'Đã xoá danh mục thành công');
			redirect(base_url('category/list'));
		}

}
