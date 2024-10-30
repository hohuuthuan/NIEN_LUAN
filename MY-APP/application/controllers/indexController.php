<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class indexController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('indexModel');
		$this->load->model('sliderModel');
		$this->load->library('cart');
		$this->data['brand'] = $this->indexModel->getBrandHome();
		$this->data['category'] = $this->indexModel->getCategoryHome();
	}
	public function page_404(){

		$this->load->view('pages/component/page404');

	}
	public function index()
	{
		//custom config link
		$config = array();
        $config["base_url"] = base_url() .'/pagination/index'; 
		$config['total_rows'] = ceil($this->indexModel->countAllProduct()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
        $config["uri_segment"] = 3; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// Giới hạn sản phẩm trong trang (limit, start)
		$this->data['allproduct_pagination'] = $this->indexModel->getIndexPagination($config["per_page"], $this->page);
		//pagination



		$this->data['allProduct'] = $this->indexModel->getAllProduct();
		$this->data['sliders'] = $this->sliderModel->selectAllSlider();
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/component/slider', $this->data);
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/component/footer');
	}

	public function send_mail($to_mail, $subject, $message) {

		$config = array();

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'hohuuthuan789@gmail.com';
		$config['smtp_pass'] = 'xvinihubnvdnmloz';
		$config['smtp_port'] = '465';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$from_mail = 'hohuuthuan789@gmail.com';

		$this->email->from($from_mail, 'Trang web abc.xyz');
		$this->email->to($to_mail);
		// Gửi 1 bản copy cho 1 hay nhiều người
		// $this->email->cc('another@another-example.com');
		// Gửi 1 bản copy cho 1 hay nhiều người mà không thấy được thông tin người gửi
		// $this->email->bcc('them@their-example.com');

		
		$this->email->subject($subject);
		$this->email->message($message);

		$this->email->send();
	}
	public function confirm_checkout(){
		$this->form_validation->set_rules('name', 'Username', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'Bạn cần cung cấp %s']);
		if ($this->form_validation->run() == TRUE) {

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$form_of_payment = $this->input->post('form_of_payment');

			$data = [
				'name' => $name,
				'email'=> $email,
				'phone' => $phone,
				'address'=> $address,
				'form_of_payment'=> $form_of_payment

			];	
			
			$this->load->model('loginModel');
			$result = $this->loginModel->newShipping($data);
			if($result){
				$letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3); // Lấy 3 chữ cái ngẫu nhiên
				$numbers = sprintf("%06d", rand(0, 999999)); // Tạo 6 chữ số ngẫu nhiên
				$order_code = $letters . $numbers; // Kết hợp chữ cái và số
				// echo $order_code;
				// Lưu vàp orders
				$data_orders = [
					'order_code' => $order_code,
					'status' => 1,
					'form_of_payment_id'=> $result
	
				];	
				$insert_orders = $this->loginModel->insert_orders($data_orders);

				// Order details
				foreach ($this->cart->contents() as $items) {
					$data_orders_details = array(
						'order_code' => $order_code,
						'product_id' => $items['id'],
						'quantity' => $items['qty']
					);
					$insert_orders_details = $this->loginModel->insert_orders_details($data_orders_details);
				}

				
				$this->session->set_flashdata('success', 'Đặt hàng thành công');
				// Khi đã đặt hàng thành công thì giỏ hàng sẽ xóa đi các mặt hàng đã đặt
				$this->cart->destroy();

				// Gửi mail thông báo đã đặt hàng
				$to_mail = $email;
				$subject = 'Thông báo đặt hàng';
				$message = 'Cảm ơn bạn đã đặt hàng, chúng tôi sẽ gửi đơn hàng đến bạn sớm nhất.';

				$this->send_mail($to_mail, $subject, $message);

				redirect(base_url('thank-you-for-order'));
			} else{
				$this->session->set_flashdata('error', 'Đặt hàng thất bại');
				redirect(base_url('checkout'));
			}
		}else{	
			redirect(base_url('checkout'));
		}
	}

	
	public function category($id)
	{
		$this->data['slug'] = $this->indexModel->getCategorySlug($id);
		//custom config link
		$config = array();
        $config["base_url"] = base_url() .'/pagination/danh-muc/'.'/'.$id.'/'.$this->data['slug']; 
		$config['total_rows'] = ceil($this->indexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
        $config["uri_segment"] = 5; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
	
		// Lấy giá thấp nhất và lớn nhất
		$min_price = $this->data['min_price'] = $this->indexModel->getMinPriceProduct($id);
		$max_price = $this->data['max_price'] = $this->indexModel->getMaxPriceProduct($id);



		// Filter
		if(isset($_GET['kytu'])){
			$kytu = $_GET['kytu'];
			$this->data['allproductbycate_pagination'] = $this->indexModel->getCategoryKyTuPagination($id, $kytu, $config["per_page"], $this->page);
		}elseif(isset($_GET['gia'])){
			$kytu = $_GET['gia'];
			$this->data['allproductbycate_pagination'] = $this->indexModel->getCategoryPricePagination($id, $kytu, $config["per_page"], $this->page);
		}elseif(isset($_GET['to']) && isset($_GET['from']) ){
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];
			$this->data['allproductbycate_pagination'] = $this->indexModel->getCategoryPriceRangePagination($id, $from_price, $to_price, $config["per_page"], $this->page);
		}else{
			$this->data['allproductbycate_pagination'] = $this->indexModel->getCategoryPagination($id, $config["per_page"], $this->page);
		}

		// $this->data['category_Product'] = $this->indexModel->getCategoryProduct($id);
		$this->data['title'] = $this->indexModel->getCategoryTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/component/footer');
	}
	public function brand($id)
	{

		$this->data['slug'] = $this->indexModel->getBrandSlug($id);
		//custom config link
		$config = array();
        $config["base_url"] = base_url() .'/pagination/thuong-hieu/'.'/'.$id.'/'.$this->data['slug']; 
		$config['total_rows'] = ceil($this->indexModel->countAllProductByBrand($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
        $config["uri_segment"] = 5; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// Giới hạn sản phẩm trong trang (limit, start)
		$this->data['allproductbybrand_pagination'] = $this->indexModel->getbrandPagination($id, $config["per_page"], $this->page);
		//pagination


		// $this->data['brand_Product'] = $this->indexModel->getBrandProduct($id);
		$this->data['title'] = $this->indexModel->getBrandTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/brand',$this->data);
		$this->load->view('pages/component/footer');
	}



	public function search_product()
	{
		if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
			$keyword = $_GET['keyword'];
		}

		//custom config link
		$config = array();
        $config["base_url"] = base_url().'/search-product'; 
		$config['reuse_query_string'] = TRUE;
		$config['total_rows'] = ceil($this->indexModel->countAllProductByKeyword($keyword)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 1; //từng trang 3 sản phẩn
        $config["uri_segment"] = 2; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// Giới hạn sản phẩm trong trang (limit, start)
		$this->data['allproductbykeyword_pagination'] = $this->indexModel->getSearchPagination($keyword, $config["per_page"], $this->page);
		//pagination


		// $this->data['product'] = $this->indexModel->getProductByKeyword($keyword);
		$this->data['title'] = $keyword;
		$this->config->config['pageTitle'] = "Search product: ".$keyword;
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/search-product', $this->data);
		$this->load->view('pages/component/footer');
	}




	public function product($id)
	{
		$this->data['product_details'] = $this->indexModel->getProductDetails($id);
		$this->data['title'] = $this->indexModel->getProductTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/product_detail', $this->data);
		$this->load->view('pages/component/footer');
	}
	public function thank_you_for_order()
	{
		$this->config->config['pageTitle'] = 'Cảm ơn bạn đã đặt hàng';
		$this->data['allProduct'] = $this->indexModel->getAllProduct();
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/thank-you-for-order', );
		$this->load->view('pages/component/footer');
	}
	public function cart()
	{
		$this->config->config['pageTitle'] = 'Giỏ hàng';
		$this->load->view('pages/component/header', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/component/footer');
	}



	public function add_to_cart() {
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->indexModel->getProductDetails($product_id);
	
		// Đặt hàng
		$found = false;
		foreach ($this->cart->contents() as $items) {
			if ($items['id'] == $product_id) {
				$this->session->set_flashdata('error', 'Mặt hàng bạn đặt đã tồn tại trong giỏ hàng. Vui lòng vào giỏ hàng chỉnh sửa số lượng');
				redirect(base_url().'gio-hang', 'refresh');
				$found = true;
				break;
			}
		}
	
		if (!$found) {
			foreach ($this->data['product_details'] as $key => $product) {
				if ($product->quantity >= $quantity) {
					$cart = array(
						'id'      => $product->id,
						'qty'     => $quantity,
						'price'   => $product->price,
						'name'    => $product->title,
						'options' => array('image' => $product->image, 'in_stock' => $product->quantity)
					);
					$this->cart->insert($cart);
					$this->session->set_flashdata('success', 'Thêm vào giỏ hàng thành công.');
					redirect(base_url().'gio-hang', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Số lượng bạn chọn vượt quá số lượng tồn kho. Vui lòng chọn lại.');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}

	}
	
	
	public function update_cart_item(){
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as  $items){
			if($rowid == $items['rowid']){
				if($quantity < $items['options']['in_stock']){
					$cart = array(
						'rowid' => $rowid,
						'qty' => $quantity
					);
				}elseif($quantity > $items['options']['in_stock']){
					$cart = array(
						'rowid' => $rowid,
						'qty' => $items['options']['in_stock']
					);
				}
				
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
		$this->config->config['pageTitle'] = 'Đăng nhập';
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
				$this->session->set_flashdata('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại email hoặc mật khẩu');
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

			$letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3); // Lấy 3 chữ cái ngẫu nhiên
			$numbers = sprintf("%06d", rand(0, 999999)); // Tạo 6 chữ số ngẫu nhiên
			$token = $letters . $numbers; // Kết hợp chữ cái và số
			$date_created = Carbon\Carbon::now('Asia/Ho_Chi_Minh');

			$data = [
				'username' => $username,
				'email'=> $email,
				'password'=> $password,
				'phone' => $phone,
				'address'=> $address,
				'token'=> $token,
				'date_created'=> $date_created
			];

			$this->load->model('loginModel');
			$result = $this->loginModel->newCustomer($data);
			if($result){
				// $session_array = [
				// 	'email'=> $email,
				// 	'username'=> $username,
				// ];

				// $this->session->set_userdata('logged_in_customer', $session_array);
				// $this->session->set_flashdata('success', 'Đăng nhập thành công');

				// Gửi mail thông báo đã đăng ký thành công
				$fullURL = base_url().'kich-hoat-tai-khoan/?token='.$token.'&email='.$email;
				$to_mail = $email;
				$subject = 'Thông báo đăng ký tài khoản thành công';
				$message = 'Click vào đường link để kích hoạt tài khoản: '.$fullURL;
				$this->send_mail($to_mail, $subject, $message);
				$this->session->set_flashdata('success', 'Đăng ký tài khoản thành công. Vui lòng kiểm tra email để kích hoạt tài khoản.');
				redirect(base_url('dang-nhap'));
			} else{
				$this->session->set_flashdata('error', 'Đăng nhập thất bại');
				redirect(base_url('dang-nhap'));
			}
		}
		else{
			$this->login();
		}
	}
	public function kich_hoat_tai_khoan(){
		if(isset($_GET['email']) && $_GET['token']){
			echo $token = $_GET['token'];
			echo $email = $_GET['email'];
		}
		$data['get_customer'] = $this->indexModel->getCustomerToken($email); 
		

		// Update tài khoản vừa tạo
		$time_now = Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addMinute(10); // tạo thời gian 10 phút hoạt động cho đường link
		// Tạo 1 token mới để tránh trùng lặp
		$letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3); // Lấy 3 chữ cái ngẫu nhiên
		$numbers = sprintf("%06d", rand(0, 999999)); // Tạo 6 chữ số ngẫu nhiên
		$new_token = $letters . $numbers; // Kết hợp chữ cái và số

		foreach($data['get_customer'] as $key => $value){
			if($token!= $value->token){
				$this->session->set_flashdata('error','Đường link kích hoạt không đúng hoặc đã được kích hoạt. Vui lòng kiểm tra lại!!!');
				redirect(base_url('dang-nhap'));
			}
			$data_customer = [
				'status' => 1,
				'token'	=> $new_token
			];
			if($value->date_created < $time_now){
				$active_customer = $this->indexModel->activeCustomerAndUpdateNewToken($email, $data_customer);
				$this->session->set_flashdata('success','Kích hoạt tài khoản thành công, mời bạn đăng nhập lại');
				redirect(base_url('dang-nhap'));
			}else{
				$this->session->set_flashdata('error','Kích hoạt tài khoản thất bại, bạn vui lòng quay lại bước đăng ký');
				redirect(base_url('dang-nhap'));
			}

		}

	}

	public function checkout()
	{
		$this->config->config['pageTitle'] = 'Checkout';
		if($this->session->userdata('logged_in_customer') && $this->cart->contents()){
			$this->load->view('pages/component/header', $this->data);
			$this->load->view('pages/checkout');
			$this->load->view('pages/component/footer');
		}else{
			redirect(base_url().'gio-hang');
		}
	}

	

	


}
