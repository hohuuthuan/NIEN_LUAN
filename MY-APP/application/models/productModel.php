<?php
class productModel extends CI_Model
{
    public function insertProductAndWarehouse($data, $import_price_one_product)
    {
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
            'quantity' => $quantity,
            'import_price_one_product' => $import_price_one_product,
            'total_import_price' => $quantity*$import_price_one_product
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
        $this->db->select('products.*, warehouses.quantity');
        $this->db->from('products');
        $this->db->join('warehouses', 'warehouses.product_id = products.id', 'left');
        $this->db->where('products.id', $id);
        $query = $this->db->get();
        return $query->row();
    }




    public function updateProduct($id, $data)
    {
        return $this->db->update('products', $data, ['id' => $id]);
    }

    public function deleteProduct($id)
    {
        // Xóa các bản ghi liên quan trong bảng warehouses
        $this->db->delete('warehouses', ['product_id' => $id]);
    
        // Sau đó, xóa sản phẩm trong bảng products
        return $this->db->delete('products', ['id' => $id]);
    }
    


    public function plusQuantityProduct($id, $data)
    {
        // Lấy số lượng hiện tại của sản phẩm
        $this->db->select('quantity');
        $this->db->from('warehouses');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            // Cập nhật số lượng mới bằng cách cộng số lượng hiện tại với số lượng mới
            $new_quantity = $result->quantity + $data['quantity'];
            $new_import_price_one_product = $data['import_price_one_product'];
            // Cập nhật số lượng trong bảng warehouses
            $this->db->set('quantity', $new_quantity);
            $this->db->set('import_price_one_product', $new_import_price_one_product);
            $this->db->where('product_id', $id);
            return $this->db->update('warehouses'); // Trả về true nếu cập nhật thành công
        } else {
            return false; // Trả về false nếu không tìm thấy sản phẩm
        }
    }
    public function plusTotalPriceProduct($id, $total_import_price)
    {
        // Lấy tổng giá hiện tại của sản phẩm
        $this->db->select('total_import_price');
        $this->db->from('warehouses');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            // Cập nhật tổng giá mới bằng cách cộng tổng giá với giá mới được tính vào
            $new_total_import_price = $result->total_import_price +  $total_import_price;

            // Cập nhật tổng giá trong bảng warehouses
            $this->db->set('total_import_price', $new_total_import_price);
            $this->db->where('product_id', $id);
            return $this->db->update('warehouses'); // Trả về true nếu cập nhật thành công
        } else {
            return false; // Trả về false nếu không tìm thấy sản phẩm
        }
    }

}


?>