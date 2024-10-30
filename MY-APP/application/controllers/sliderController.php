<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class sliderController extends CI_Controller {

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
			
            $this->load->model('sliderModel');
			$data['slider'] = $this->sliderModel->selectSlider();
			$this->load->view("slider/listSlider", $data);
			$this->load->view("component-admin/footer");
		}

        public function createSlider()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			$this->load->view("slider/createSlider");
			$this->load->view("component-admin/footer");
		}
		
		public function storeSlider(){
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần diền %s']);


			if ($this->form_validation->run()) {

				$ori_filename = $_FILES['image']['name'];
				$new_name = time()."".str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/sliders',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name
				];
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view("component-admin/header");
					$this->load->view("component-admin/navbar");
					$this->load->view("slider/createSlider", $error);
					$this->load->view("component-admin/footer");
				}else{
					$slider_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'image' => $slider_filename,
						'status' => $this->input->post('status'),
					];
					$this->load->model('sliderModel');
					$this->sliderModel->insertSlider($data);
					$this->session->set_flashdata('success', 'Đã thêm Slider thành công');
					redirect(base_url('slider/list'));

				}

				
			}else{
				$this->createSlider();
			}
		}

		public function editSlider($id)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			

			$this->load->model('sliderModel');
			$data['slider'] = $this->sliderModel->selectSliderById($id);

			$this->load->view("slider/editSlider", $data);
			$this->load->view("component-admin/footer");
		}
		
		public function updateSlider($id) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Bạn cần điền %s']);
		
			if ($this->form_validation->run()) {
				if(!empty($_FILES['image']['name'])) {
					// Upload Image
					$ori_filename = $_FILES['image']['name'];
					$new_name = time()."".str_replace(' ', '-', $ori_filename);
					$config = [
						'upload_path' => './uploads/sliders',
						'allowed_types' => 'gif|jpg|png|jpeg',
						'file_name' => $new_name
					];
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image')) {
						$error = array('error' => $this->upload->display_errors());
						$this->load->view("component-admin/header");
						$this->load->view("component-admin/navbar");
						$this->load->view("slider/createSlider", $error);
						$this->load->view("component-admin/footer");
			
					} else {
						$slider_filename = $this->upload->data('file_name');
						$data = [
							'title' => $this->input->post('title'),
							'image' => $slider_filename,
							'status' => $this->input->post('status'),
						];
					}
				} else {
					$data = [
						'title' => $this->input->post('title'),
						'status' => $this->input->post('status'),
					];
				}
		
				$this->load->model('sliderModel');
				$this->sliderModel->updateSlider($id, $data);
				$this->session->set_flashdata('success', 'Đã chỉnh sửa Slider thành công');
				redirect(base_url('slider/list'));
			} else {
				$this->editSlider($id);
			}
		}
		

		public function deleteSlider($id)
		{
			$this->load->model('sliderModel');
			$this->sliderModel->deleteSlider($id);
			$this->session->set_flashdata('success', 'Đã xoá Slider thành công');
			redirect(base_url('slider/list'));
		}

}
