<?php
class predictionController extends CI_Controller
{
    public function index()
    {
        // Cấu hình CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        // Trả về view
        $this->load->view('AI/postFile');
    }
}
?>
