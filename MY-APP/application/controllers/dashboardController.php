<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class dashboardController extends CI_Controller {

		public function checkLogin()
		{
			if(!$this->session->userdata('logged_in')){
				redirect(base_url('login'));
			}
		}
		public function logout (){
			$this->session->unset_userdata('logged_in');
			$this->session->set_flashdata('message', 'Đăng xuất thành công');
			redirect(base_url('login'));
		}
		public function index()
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
			$this->load->view("dashboard/indexDashboard");
			$this->load->view("component-admin/footer");
		}
		public function revenue()
		{
			$this->load->model('revenueModel');
			$data['daily_revenue'] = $this->revenueModel->getRevenueByDay();
			$data['monthly_revenue'] = $this->revenueModel->getRevenueByMonth();
			$data['yearly_revenue'] = $this->revenueModel->getRevenueByYear();
			$this->load->view('revenue_view', $data);
		}

			
}
