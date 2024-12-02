<div class="container-fluid my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Danh sách sản phẩm trong kho</h5>
        </div>

        <!-- Hiển thị thông báo -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <!-- Bảng danh sách sản phẩm -->
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá nhập</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($product as $key => $pro): ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1; ?></th>
                            <td><?php echo htmlspecialchars($pro->title); ?></td>
                            <td>
                                <img src="<?php echo base_url('uploads/product/' . $pro->image); ?>" 
                                     alt="<?php echo htmlspecialchars($pro->title); ?>" 
                                     class="img-thumbnail" 
                                     style="width: 100px; height: auto;">
                            </td>
                            <td><?php echo number_format($pro->import_price_one_product, 0, ',', '.'); ?> VNĐ</td>
                            <td><?php echo number_format($pro->selling_price, 0, ',', '.'); ?> VNĐ</td>
                            <td><?php echo $pro->quantity; ?></td>
                            <td>
                                <?php if ($pro->status == 1): ?>
                                    <span class="badge bg-success">Kích hoạt</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Vô hiệu hóa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này ra khỏi kho chứ?')"
                                       href="<?php echo base_url('product-in-warehouse/delete/' . $pro->product_id); ?>" 
                                       class="btn btn-danger btn-sm me-2">
                                       <i class="fas fa-trash-alt"></i> Xóa
                                    </a>
                                    <a href="<?php echo base_url('quantity/update/' . $pro->product_id); ?>" 
                                       class="btn btn-warning btn-sm">
                                       <i class="fas fa-box"></i> Nhập kho
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
