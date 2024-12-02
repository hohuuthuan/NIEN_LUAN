<?php
defined('BASEPATH') or exit('No direct script access allowed');
class warehouseController extends CI_Controller
{

	public function checkLogin()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		 $this->config->config['pageTitle'] = 'Warehouse';
		$this->load->view("component-admin/header");
		$this->load->view("component-admin/navbar");

		$this->load->model('productModel');
		$data['product'] = $this->productModel->selectAllProduct();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';


		$this->load->view("warehouse/listProductInWarehouse", $data);
		$this->load->view("component-admin/footer");
	}


	public function updateQuantityProduct($id)
	{
		$this->load->view("component-admin/header");
		$this->load->view("component-admin/navbar");

		$this->load->model('productModel');
		$data['product'] = $this->productModel->selectProductById($id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		$this->load->view("warehouse/plusQuantityInWarehouse", $data);

		$this->load->view("component-admin/footer");
	}

	public function plusQuantityWarehouses($id)
	{
		$data = [
			'quantity' => $this->input->post('quantity_warehouses'),
			'import_price_one_product' => $this->input->post('import_price_warehouses'),
		];
		$total_import_price = ($this->input->post('import_price_warehouses'))*($this->input->post('quantity_warehouses'));
		$this->load->model('productModel');

		if ($this->productModel->plusQuantityProduct($id, $data) && $this->productModel->plusTotalPriceProduct($id, $total_import_price)) {
			$this->session->set_flashdata('success', 'Đã thêm vào kho thành công');
		} else {
			$this->session->set_flashdata('error', 'Thêm vào kho thất bại');
		}
		redirect(base_url('quantity/update/' . $id));
	}

	public function deleteProduct($id)
	{
		$this->load->model('productModel');
	
		// Kiểm tra nếu sản phẩm liên quan đến đơn hàng
		$orders = $this->productModel->getOrdersByProductId($id);
		if (!empty($orders)) {
			$order_codes = array_column($orders, 'order_code');
			$this->session->set_flashdata(
				'error',
				'Không thể xóa sản phẩm vì đang được sử dụng trong các đơn hàng: ' . implode(', ', $order_codes)
			);
			redirect(base_url('warehouse/list')); // Quay lại danh sách kho
		}
	
		// Nếu không liên quan đến đơn hàng, tiến hành xóa
		if ($this->productModel->deleteProduct($id)) {
			$this->session->set_flashdata('success', 'Sản phẩm đã được xóa thành công khỏi kho');
		} else {
			$this->session->set_flashdata('error', 'Xóa sản phẩm thất bại');
		}
	
		redirect(base_url('warehouse/list'));
	}
	

}
