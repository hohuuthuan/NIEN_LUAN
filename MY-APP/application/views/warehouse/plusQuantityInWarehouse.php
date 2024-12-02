<div class="container-fluid my-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Nhập hàng vào kho</h5>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('warehouse/list') ?>" class="btn btn-primary mb-3">
                <i class="fas fa-list"></i> Danh sách sản phẩm trong kho
            </a>

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

            <!-- Bảng nhập liệu -->
            <table class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng hiện tại</th>
                        <th scope="col">Giá bán hiện tại</th>
                        <th scope="col">Thêm số lượng</th>
                        <th scope="col">Giá nhập mới / sản phẩm</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 200px;"><?php echo htmlspecialchars($product->title); ?></td>
                        <td>
                            <img src="<?php echo base_url('uploads/product/' . $product->image); ?>" 
                                 alt="<?php echo htmlspecialchars($product->title); ?>" 
                                 class="img-thumbnail" 
                                 style="width: 120px; height: auto;">
                        </td>
                        <td><?php echo $product->quantity; ?></td>
                        <td><?php echo number_format($product->selling_price, 0, ',', '.'); ?> VNĐ</td>

                        <!-- Form nhập hàng -->
                        <form action="<?php echo base_url('warehouse/plusquantity-importpriceinwwarehouses/' . $product->id); ?>" 
                              method="POST" enctype="multipart/form-data">
                            <td>
                                <div class="form-group">
                                    <label for="quantity_warehouses" class="form-label">SL sản phẩm nhập kho</label>
                                    <input type="number" name="quantity_warehouses" 
                                           class="form-control" id="quantity_warehouses" 
                                           placeholder="Nhập số lượng" required>
                                    <?php echo '<span class="text-danger">' . form_error('quantity_warehouses') . '</span>'; ?>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="import_price_warehouses" class="form-label">Giá nhập mới (VNĐ)</label>
                                    <input type="number" name="import_price_warehouses" 
                                           class="form-control" id="import_price_warehouses" 
                                           placeholder="Nhập giá tiền" required>
                                    <?php echo '<span class="text-danger">' . form_error('import_price_warehouses') . '</span>'; ?>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-download"></i> Nhập vào kho
                                </button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
