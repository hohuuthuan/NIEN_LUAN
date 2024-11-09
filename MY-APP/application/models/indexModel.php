<?php
class indexModel extends CI_Model
{
    public function getBrandHome()
    {
        $query = $this->db->get_where('brands', ['status' => 1]);
        return $query->result();
    }
    public function getCategoryHome()
    {
        $query = $this->db->get_where('categories', ['status' => 1]);
        return $query->result();
    }

    public function getAllProduct()
    {
        // Chọn tất cả các cột từ bảng products và cột quantity từ bảng warehouses
        $this->db->select('products.*, warehouses.quantity');
        $this->db->from('products');
        $this->db->join('warehouses', 'warehouses.product_id = products.id', 'left');
        $this->db->where('products.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCustomerToken($email)
{
    $query = $this->db->get_where('users', ['email' => $email]);
    return $query->row();
}

    public function activeCustomerAndUpdateNewToken($email, $data_customer)
    {
        return $this->db->update('users', $data_customer, ['email' => $email]);
    }

    // comment
    public function commentSend($data)
    {
        return $this->db->insert('comment', $data);
    }
    public function getListConmment()
    {
        $query = $this->db->get_where('comment', ['status' => 1]);
        return $query->result();
    }



    // Pagination
    public function countAllProduct()
    {
        return $this->db->count_all('products');
    }
    public function countAllProductByCate($id)
    {
        $this->db->where('category_id', $id);
        $this->db->from('products');
        return $this->db->count_all_results();

    }
    public function countAllProductByBrand($id)
    {
        $this->db->where('brand_id', $id);
        $this->db->from('products');
        return $this->db->count_all_results();

    }
    public function countAllProductByKeyword($keyword)
    {
        $this->db->like('products.title', $keyword);
        $this->db->from('products');
        return $this->db->count_all_results();

    }

    public function getIndexPagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('products', ['status' => 1]);
        return $query->result();
    }


    public function getCategoryPagination($id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->get();
        return $query->result();
    }
    public function getCategoryKyTuPagination($id, $kytu, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->order_by('products.title', $kytu)
            ->get();
        return $query->result();
    }
    public function getCategoryPricePagination($id, $gia, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->order_by('products.selling_price', $gia)
            ->get();
        return $query->result();
    }
    public function getCategoryPriceRangePagination($id, $from_price, $to_price, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->where('products.selling_price >=' . $from_price)
            ->where('products.selling_price <=' . $to_price)
            ->order_by('products.selling_price', 'asc')
            ->get();
        return $query->result();
    }
    public function getBrandPagination($id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.brand_id', $id)
            ->get();
        return $query->result();
    }

    public function getCategorySlug($id)
    {
        $this->db->select('categories.*');
        $this->db->from('categories');
        $this->db->limit(1);
        $this->db->where('categories.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->slug;
    }
    public function getBrandSlug($id)
    {
        $this->db->select('brands.*');
        $this->db->from('brands');
        $this->db->limit(1);
        $this->db->where('brands.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->slug;
    }
    public function getSearchPagination($keyword, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->like('products.title', $keyword)
            ->get();
        return $query->result();
    }
    // Hết pagination


    public function getItemsCategoryHome()
    {
        $this->db->select('products.*, categories.title as cate_title, categories.id');
        $this->db->from('categories');
        $this->db->join('products', 'products.category_id = categories.id');
        $query = $this->db->get();
        $result = $query->result_array();
        // print_r($result);
        $newArray = array();
        foreach ($result as $key => $value) {
            $newArray[$value['cate_title']][] = $value;
        }
        // print_r($newArray);
        return $newArray;

    }





    public function getCategoryTitle($id)
    {
        $this->db->select('categories.*');
        $this->db->from('categories');
        $this->db->limit(1);
        $this->db->where('categories.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    public function getMinPriceProduct($id)
    {
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->select_min('selling_price');
        $this->db->where('products.category_id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->selling_price;
    }
    public function getMaxPriceProduct($id)
    {
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->select_max('selling_price');
        $this->db->where('products.category_id', $id);
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $price = $result->selling_price;
    }



    public function getBrandProduct($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.brand_id', $id)
            ->get();
        return $query->result();
    }

    public function getCategoryProduct($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->get();
        return $query->result();
    }
    public function getProductDetails($id)
    {
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu, warehouses.quantity')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('warehouses', 'warehouses.product_id = products.id', 'left')
            ->where('products.id', $id)
            ->get();
        return $query->result();
    }


    public function getBrandTitle($id)
    {
        $this->db->select('brands.*');
        $this->db->from('brands');
        $this->db->limit(1);
        $this->db->where('brands.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }
    public function getProductTitle($id)
    {
        $this->db->select('products.*');
        $this->db->from('products');
        $this->db->limit(1);
        $this->db->where('products.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $title = $result->title;
    }

    // Tìm kiếm với từ khóa
    public function getProductByKeyword($keyword)
    {
        $query = $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->like('products.title', $keyword)
            ->get();
        return $query->result();
    }


    public function getProfileUser($user_id)
    {
        $query = $this->db->select('*')
            ->from('customers')
            ->where('id', $user_id)
            ->get();
        return $query->row();
    }


    
    public function updateCustomer($user_id, $data)
    {
        $this->db->where('id', $user_id);
        return $this->db->update('customers', $data);
    }




}

?>