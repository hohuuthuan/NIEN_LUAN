<?php 
    class productModel extends CI_Model
    {
        public function insertProductAndWarehouse($data) {
            // Bắt đầu giao dịch
            $this->db->trans_start();
            
            // Lưu lại quantity và loại bỏ nó khỏi productData
            $quantity = $data['quantity'];
            unset($data['quantity']);
            
            // Chèn dữ liệu vào bảng products
            $this->db->insert('products', $data);
            
            // Lấy product_id vừa được chèn
            $product_id = $this->db->insert_id();
            
            // Chuẩn bị dữ liệu cho bảng warehouses
            $warehouseData = array(
                'product_id' => $product_id,
                'quantity' => $quantity
            );
            
            // Chèn dữ liệu vào bảng warehouses
            $this->db->insert('warehouses', $warehouseData);
            
            // Kết thúc giao dịch
            $this->db->trans_complete();
            
            // Kiểm tra xem giao dịch có thành công hay không
            if ($this->db->trans_status() === FALSE) {
                // Nếu có lỗi, giao dịch sẽ bị hủy bỏ
                return FALSE;
            } else {
                // Nếu thành công, giao dịch sẽ được cam kết
                return TRUE;
            }
        }

        public function selectAllProduct()
        {
            $query = $this->db->select('categories.title as tendanhmuc, products.*, warehouses.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('warehouses', 'products.id = warehouses.product_id')
            ->join('brands', 'brands.id = products.brand_id')
            ->get(); 
            return $query->result();  
        }
        public function selectProductById($id)
        {
            $query = $this->db->get_where('products', ['id' => $id]); 
            return $query->row();  
        }

        public function updateProduct($id, $data)
        {
            return $this->db->update('products',$data, ['id'=>$id]);   
        }

        public function deleteProduct($id)
        {
            return $this->db->delete('products',['id'=>$id]);   
        }
    }

?>