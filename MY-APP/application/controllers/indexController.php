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
	
	public function delete_to_cart(){
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
	
}
