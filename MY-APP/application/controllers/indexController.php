<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class indexController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('indexModel');
		$this->load->library('cart');
		$this->data['brand'] = $this->indexModel->getBrandHome();
		$this->data['category'] = $this->indexModel->getCategoryHome();
	}

	public function index()
	{
		$this->data['allProduct'] = $this->indexModel->getAllProduct();
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/component/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/component/footer');
	}
	public function category($id)
	{
		$this->data['category_Product'] = $this->indexModel->getCategoryProduct($id);
		$this->data['title'] = $this->indexModel->getCategoryTitle($id);
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/component/footer');
	}
	public function brand($id)
	{
		$this->data['brand_Product'] = $this->indexModel->getBrandProduct($id);
		$this->data['title'] = $this->indexModel->getBrandTitle($id);
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/brand',$this->data);
		$this->load->view('pages/component/footer');
	}
	public function product($id)
	{
		$this->data['product_details'] = $this->indexModel->getProductDetails($id);
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/product_detail', $this->data);
		$this->load->view('pages/component/footer');
	}
	public function cart()
	{
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/component/footer');
	}

	public function checkout()
	{
		if($this->session->userdata('logged_in_customer')){
			$this->load->view('pages/component/header', $this->data);
			$this->load->view('pages/checkout');
			$this->load->view('pages/component/footer');
		}else{
			redirect(base_url().'gio-hang');
		}
	}


	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->indexModel->getProductDetails($product_id);
		// Đặt hàng
		foreach ($this->data['product_details'] as $key => $product) {
			$cart = array(
				'id'      => $product->id,
				'qty'     => $quantity,
				'price'   => $product->price,
				'name'    => $product->title,
				'options' => array('image' => $product->image)
			);
		}
		$this->cart->insert($cart);
		redirect(base_url().'gio-hang', 'refresh');
	}
	
	public function update_cart_item(){
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as  $items){
			if($rowid == $items['rowid']){
				$cart = array(
					'rowid' => $rowid,
					'qty' => $quantity
				);
			}
		}
		$this->cart->update($cart);
		// redirect(base_url().'gio-hang', 'refresh');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_all_cart(){
		$this->cart->destroy();
		redirect(base_url().'gio-hang', 'refresh');
	}
	public function delete_item($rowid){
		$this->cart->remove($rowid);
		redirect(base_url().'gio-hang', 'refresh');
	}


	public function login()
	{
		$this->load->view('pages/component/header');
		$this->load->view('pages/login');
		$this->load->view('pages/component/footer');
	}
	public function loginCustomer(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn cần cung cấp email']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn cần cung cấp mật khẩu']);

		if ($this->form_validation->run()) {

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('loginModel');
			$result = $this->loginModel->checkLoginCustomer($email, $password);
			if(count($result)>0){
				$session_array = [
					'id'=> $result[0]->id,
					'username'=> $result[0]->username,
					'email'=> $result[0]->email,
				];

				$this->session->set_userdata('logged_in_customer', $session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				redirect(base_url('/checkout'));
			} else{
				$this->session->set_flashdata('error', 'Đăng nhập thất bại');
				redirect(base_url('/dang-nhap'));
			}
		}
		else{
			$this->login();
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in_customer');
		$this->session->set_flashdata('success', 'Đăng xuất thành công');
		redirect(base_url('/dang-nhap'));
	}


	public function dang_ky(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');

			$data = [
				'username' => $username,
				'email'=> $email,
				'password'=> $password,
				'phone' => $phone,
				'address'=> $address,

			];


			$this->load->model('loginModel');
			$result = $this->loginModel->newCustomer($data);
			if($result){
				$session_array = [
					'email'=> $email,
					'username'=> $username,
				];

				$this->session->set_userdata('logged_in_customer', $session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				redirect(base_url('checkout'));
			} else{
				$this->session->set_flashdata('error', 'Đăng nhập thất bại');
				redirect(base_url('dang-nhap'));
			}
		}
		else{
			$this->login();
		}
	}




}
