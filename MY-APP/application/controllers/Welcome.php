<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->model('indexModel');
		$data['allproduct'] = $this->indexModel->getAllProduct();
		var_dump($data);
		$this->load->view('HomePage');
	}
}
