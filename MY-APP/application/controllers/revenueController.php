<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class revenueController extends CI_Controller {

		public function checkLogin()
		{
			if(!$this->session->userdata('logged_in')){
				redirect(base_url('login'));
			}
		}


        public function statistics_by_week()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			
            $this->load->model('productModel');
			$data['product'] = $this->productModel->selectAllProduct();

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';


			$this->load->view("product/listProduct", $data);
			$this->load->view("component-admin/footer");
		}
        public function statistics_by_month()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			
            $this->load->model('productModel');
			$data['product'] = $this->productModel->selectAllProduct();

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';


			$this->load->view("product/listProduct", $data);
			$this->load->view("component-admin/footer");
		}
        public function statistics_by_year()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			
            $this->load->model('productModel');
			$data['product'] = $this->productModel->selectAllProduct();

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';


			$this->load->view("product/listProduct", $data);
			$this->load->view("component-admin/footer");
		}

		public function index()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			
            $this->load->model('productModel');
			$data['product'] = $this->productModel->selectAllProduct();

			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';


			$this->load->view("product/listProduct", $data);
			$this->load->view("component-admin/footer");
		}

        public function createProduct()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			// Load categories
			$this->load->model('categoryModel');
			$data['category'] = $this->categoryModel->selectCategory();
			// Load brand
			$this->load->model('brandModel');
			$data['brand'] = $this->brandModel->selectBrand();

			$this->load->view("product/createProduct", $data);
			$this->load->view("component-admin/footer");
		}
		
		public function storeProduct(){
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn cần điền %s']);
			$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn cần chọn %s']);


			if ($this->form_validation->run()) {

				$ori_filename = $_FILES['image']['name'];
				$new_name = time()."".str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/product',
					'allowed_types' => 'gif|jpg|png|jpeg|webp',
					'file_name' => $new_name
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view("component-admin/header");
					$this->load->view("component-admin/navbar");
					$this->load->view("product/createProduct", $error);
					$this->load->view("component-admin/footer");
				}else{
					$product_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'description' => $this->input->post('description'),
						'price' => $this->input->post('price'),
						'image' => $product_filename,
						'status' => $this->input->post('status'),
						'quantity'=> $this->input->post('quantity'),
						'brand_id'=> $this->input->post('brand_id'),
						'category_id'=> $this->input->post('category_id'),
					];
					$this->load->model('productModel');
					$this->productModel->insertProductAndWarehouse($data);
					$this->session->set_flashdata('success', 'Đã thêm sản phẩm thành công');
					redirect(base_url('product/list'));

				}	
			}else{
				$this->createProduct();
			}
		}

		public function editProduct($id)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			
			// Load categories
			$this->load->model('categoryModel');
			$data['category'] = $this->categoryModel->selectCategory();
			// Load brand
			$this->load->model('brandModel');
			$data['brand'] = $this->brandModel->selectBrand();

			


			$this->load->model('productModel');
			$data['product'] = $this->productModel->selectProductById($id);


			echo '<pre>';
			print_r($data);
			echo '</pre>';

			$this->load->view("product/editProduct", $data);
			$this->load->view("component-admin/footer");
		}
		
		public function updateProduct($id)
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'Bạn cần điền %s']);
			$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required' => 'Bạn cần diền %s']);
			$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn cần chọn %s']);
			
			

			if ($this->form_validation->run()) {

				if(!empty($_FILES['image']['name'])){
					// Upload Image
					$ori_filename = $_FILES['image']['name'];
					$new_name = time()."".str_replace(' ', '-', $ori_filename);
					$config = [
						'upload_path' => './uploads/product',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'file_name' => $new_name
					];
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('image')) {
						$error = array('error' => $this->upload->display_errors());
						$this->load->view("component-admin/header");
						$this->load->view("component-admin/navbar");
						$this->load->view("product/createProduct", $error);
						$this->load->view("component-admin/footer");
					}else{
						$product_filename = $this->upload->data('file_name');
						$data = [
							'title' => $this->input->post('title'),
							'slug' => $this->input->post('slug'),
							'description' => $this->input->post('description'),
							'price' => $this->input->post('price'),
							'image' => $product_filename,
							'status' => $this->input->post('status'),
					
							'brand_id'=> $this->input->post('brand_id'),
							'category_id'=> $this->input->post('category_id'),
						];
					}
				}else{
					$data = [
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'description' => $this->input->post('description'),
						'price' => $this->input->post('price'),
						'status' => $this->input->post('status'),

						'brand_id'=> $this->input->post('brand_id'),
						'category_id'=> $this->input->post('category_id'),
					];
				}
				$this->load->model('productModel');
				$this->productModel->updateProduct($id,$data);
				$this->session->set_flashdata('success', 'Đã chỉnh sửa danh mục thành công');
				redirect(base_url('product/list'));	
			}else{
				$this->editProduct($id);
			}
		}

		public function deleteProduct($id)
		{
			$this->load->model('productModel');
			$this->productModel->deleteProduct($id);
			$this->session->set_flashdata('success', 'Đã xoá danh mục thành công');
			redirect(base_url('product/list'));
		}

}
