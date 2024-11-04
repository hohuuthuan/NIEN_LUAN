<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class dashboardController extends CI_Controller {

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
			$this->load->view("dashboard/indexDashboard");
			$this->load->view("component-admin/footer");
		}


		public function logout (){
			$this->session->unset_userdata('logged_in');
			$this->session->set_flashdata('message', 'Đăng xuất thành công');
			redirect(base_url('login'));
		}	
}
