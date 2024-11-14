<?php
defined('BASEPATH') or exit('No direct script access allowed');
class revenueController extends CI_Controller
{
    public function checkLogin()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->view("component-admin/header");
        $this->load->view("component-admin/navbar");
        $this->load->model('revenueModel');

        $data['daily_revenue'] = $this->revenueModel->getRevenueByDay();
        $data['monthly_revenue'] = $this->revenueModel->getRevenueByMonth();
        $data['yearly_revenue'] = $this->revenueModel->getRevenueByYear();
		// echo '<pre>';
		// print_r($data);
		// echo '<pre>';
        $this->load->view('pages/revenue', $data);
        $this->load->view("component-admin/footer");



		
    }


}
?>