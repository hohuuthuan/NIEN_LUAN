<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class orderController extends CI_Controller {

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
            $this->load->model('orderModel');


			$data['order'] = $this->orderModel->selectOrder();
			// In dữ liệu để kiểm tra
			// echo '<pre>';
			// print_r($data['order']);
			// echo '</pre>';
			
			$this->load->view("order_admin/listOrder", $data);
			$this->load->view("component-admin/footer");
		}


		public function viewOrder($order_code)
		{
			$this->load->view("component-admin/header");
            $this->load->view("component-admin/navbar");
            $this->load->model('orderModel');


			$data['order_details'] = $this->orderModel->selectOrderDetails($order_code);
			// In dữ liệu để kiểm tra
			// echo '<pre>';
			// print_r($data['order_details']);
			// echo '</pre>';

			$this->load->view("order_admin/viewOrder", $data);
			$this->load->view("component-admin/footer");
		}

		public function deleteOrder($order_code)
		{
            $this->load->model('orderModel');
			
			$update_order_details = $this->orderModel->updateOrderDetails($order_code);
			$del  = $this->orderModel->deleteOrder($order_code);
			if($del && $update_order_details){
				$this->session->set_flashdata('success', 'Xóa đơn hàng thành công');
				redirect(base_url('order_admin/listOrder'));
			}else{
				$this->session->set_flashdata('error', 'Xóa đơn hàng thất bại');
				redirect(base_url('order-admin/listOrder'));
			}
		}

		public function update_order_status()
		{
			$value = $this->input->post('value');
			$order_code = $this->input->post('order_code');
			$this->load->model('orderModel');
	
			// Nếu value là 4, tạo ngày tháng và thêm vào cột date_delivered
			if ($value == 4) {
				$date_delivered = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
				$data_order = array(
					'status' => $value,
				);
				$data_order_details = array(
					'date_delivered' => $date_delivered
				);
				$this->orderModel->updateOrder($data_order, $order_code);
				$this->orderModel->updateOrderDetails($data_order_details, $order_code);
			}
			elseif ($value == 5) {
				$data_order = array(
					'status' => $value,
				);
				$this->orderModel->updateOrder($data_order, $order_code);
			}else{
				$data_order = array(
					'status' => $value
				);
				$data_order_details = array(
					'date_delivered' => '0000-00-00'
				);
				$this->orderModel->updateOrder($data_order, $order_code);
				$this->orderModel->updateOrderDetails($data_order_details, $order_code);
			}
			
		}

		public function printOrder($order_code){
			$this->load->library('Pdf');
		
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Print Order: ' . $order_code);
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->Write(5, 'CodeIgniter TCPDF Integration');
			$pdf->SetFont('dejavusans', '', 10);
		
			// In đơn hàng
			$pdf->SetFont('dejavusans', '', 10);
			// Add a page
			$pdf->AddPage();
			$this->load->model('orderModel');
		
			$data['order_details'] = $this->orderModel->printOrderDetails($order_code);
		
			$html = '
			<h3>Đơn hàng của bạn bao gồm các sản phẩm:</h3>    
			<p>Cảm ơn bạn đã ủng hộ website <a href="#">abc.domain</a> của chúng tôi. Vui lòng liên hệ hotline nếu xảy ra sự cố: 19001900</p>        
			<table border="1" cellspacing="3" cellpadding="4">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Chiết khấu</th>
						<th>Tổng số tiền:</th>
					</tr>
				</thead>
				<tbody>
			';
			$total = 0;
			foreach($data['order_details'] as $key => $product){
				// echo '<pre>'; 
				// print_r($product); 
				// echo '</pre>';
				$discounted_price = $product->selling_price * (1 - $product->discount / 100);
				$total += $product->qty * $discounted_price;
				$html .= '
					<tr>
						<td>' . ($key + 1) . '</td>
						<td>' . $order_code . '</td>
						<td>' . $product->title . '</td> 
						<td>' . number_format($product->selling_price, 0, ',', '.') . 'đ</td>
						<td>' . $product->qty . '</td>
						<td>' . $product->discount . '%</td>
						<td>' . number_format($product->qty * $discounted_price, 0, ',', '.') . 'đ</td>
					</tr>
				';
			}
		
			$html .= '<tr><td colspan="7" align="right">Tổng tiền: ' . number_format($total, 0, ',', '.') . 'đ</td></tr>
			</tbody>
			</table>';
		
			// Output the HTML content
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Order: ' . $order_code . '.pdf', 'I'); 
		}
		
		

    }
?>