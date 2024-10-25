<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class loginController extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
		}

		public function index()
		{
			$this->load->view("loginAdmin/header");
			$this->load->view("login/indexLogin");
			$this->load->view("loginAdmin/footer");
		}

		public function loginUser(){
			$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn cần cung cấp email']);
			$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn cần cung cấp mật khẩu']);

			if ($this->form_validation->run()) {

				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$this->load->model('loginModel');
				$result = $this->loginModel->checkLogin($email, $password);
				if(count($result)>0){
					$session_array = [
						'id'=> $result[0]->id,
						'username'=> $result[0]->username,
						'email'=> $result[0]->email,
					];

					$this->session->set_userdata('logged_in', $session_array);
					$this->session->set_flashdata('success', 'Đăng nhập thành công');
					redirect(base_url('dashboard'));
				} else{
					$this->session->set_flashdata('error', 'Đăng nhập thất bại');
					redirect(base_url('login'));
				}
			}
			else{
				$this->index();
			}
		}


		

}
