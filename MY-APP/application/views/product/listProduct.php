<!-- <div class="container-fluid">
    <div class="card">
        <div class="card-header">Danh sách sản phẩm</div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <div class="card-body">
            <a href="<?php echo base_url('product/create'); ?>" class="btn btn-primary mb-3">Thêm sản phẩm</a>

            <?php if (empty($product)): ?>
                <div class="alert alert-info">Không có sản phẩm nào trong danh sách.</div>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Đơn vị tính</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Thương hiệu</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Tồn kho</th>
                            <th scope="col">Hình ảnh</th>
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
                                    <?php echo strlen($pro->description) > 50
                                        ? htmlspecialchars(substr($pro->description, 0, 50)) . '...'
                                        : htmlspecialchars($pro->description); ?>
                                </td>
                                <td>
                                    <?php if ($pro->selling_price > 0): ?>
                                        <?php if ($pro->discount > 0): ?>
                                        
                                            <span style="text-decoration: line-through; color: red;">
                                                <?php echo number_format($pro->selling_price, 0, ',', '.'); ?> VNĐ
                                            </span>
                                            <br>
                                   
                                            <span style="font-weight: bold; color: green;">
                                                <?php
                                                $discounted_price = $pro->selling_price * (1 - $pro->discount / 100);
                                                echo number_format($discounted_price, 0, ',', '.'); ?> VNĐ
                                            </span>
                                        <?php else: ?>
                                       
                                            <span style="font-weight: bold; color: green;">
                                                <?php echo number_format($pro->selling_price, 0, ',', '.'); ?> VNĐ
                                            </span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span style="color: gray;">Liên hệ</span>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo htmlspecialchars($pro->unit); ?></td>
                                <td><?php echo $pro->discount ? $pro->discount . ' %' : 'Không giảm giá'; ?></td>
                                <td><?php echo htmlspecialchars($pro->tenthuonghieu); ?></td>
                                <td><?php echo htmlspecialchars($pro->tendanhmuc); ?></td>
                                <td><?php echo htmlspecialchars($pro->quantity); ?></td>
                                <td>
                                    <img src="<?php echo base_url('uploads/product/' . $pro->image); ?>"
                                        alt="<?php echo htmlspecialchars($pro->title); ?>"
                                        style="max-width: 150px; height: auto;">
                                </td>
                                <td>
                                    <?php if ($pro->status == 1): ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td style="width: 400px;">
                                    <a href="<?php echo base_url('product/delete/' . $pro->product_id); ?>"
                                        class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa chứ?');">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                    <a href="<?php echo base_url('product/edit/' . $pro->product_id); ?>"
                                        class="btn btn-warning">
                                        <i class="fa-solid fa-wrench"></i> Sửa
                                    </a>
                                    <a href="<?php echo base_url('quantity/update/' . $pro->product_id); ?>"
                                        class="btn btn-info">
                                        <i class="fa-solid fa-bars-progress"></i> Quản lý trong kho
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php echo $pagination ?? ''; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div> -->


<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">Danh sách sản phẩm</div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <div class="card-body">
            <a href="<?php echo base_url('product/create'); ?>" class="btn btn-success mb-3">Thêm sản phẩm</a>

            <?php if (empty($product)): ?>
                <div class="alert alert-info">Không có sản phẩm nào trong danh sách.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Giá bán</th>
                                <th scope="col">Đơn vị tính</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Thương hiệu</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Tồn kho</th>
                                <th scope="col">Hình ảnh</th>
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
                                        <?php
                                        $description = $pro->description;
                                        $trimmed_description = mb_substr($description, 0, 50); // Cắt chuỗi từ ký tự 0 đến ký tự 50
                                        $final_description = mb_strlen($description) > 50 ? htmlspecialchars($trimmed_description) . '...' : htmlspecialchars($description);
                                        echo $final_description;
                                        ?>

                                    </td>
                                    <td>
                                        <?php if ($pro->selling_price > 0): ?>
                                            <?php if ($pro->discount > 0): ?>
                                                <span style="text-decoration: line-through; color: red;">
                                                    <?php echo number_format($pro->selling_price, 0, ',', '.'); ?> VNĐ
                                                </span><br>
                                                <span class="font-weight-bold text-success">
                                                    <?php $discounted_price = $pro->selling_price * (1 - $pro->discount / 100);
                                                    echo number_format($discounted_price, 0, ',', '.'); ?>
                                                    VNĐ
                                                </span>
                                            <?php else: ?>
                                                <span class="font-weight-bold text-success">
                                                    <?php echo number_format($pro->selling_price, 0, ',', '.'); ?> VNĐ
                                                </span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="text-muted">Liên hệ</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($pro->unit); ?></td>
                                    <td><?php echo $pro->discount ? $pro->discount . ' %' : 'Không giảm giá'; ?></td>
                                    <td><?php echo htmlspecialchars($pro->tenthuonghieu); ?></td>
                                    <td><?php echo htmlspecialchars($pro->tendanhmuc); ?></td>
                                    <td><?php echo htmlspecialchars($pro->quantity); ?></td>
                                    <td>
                                        <img src="<?php echo base_url('uploads/product/' . $pro->image); ?>"
                                            alt="<?php echo htmlspecialchars($pro->title); ?>"
                                            style="max-width: 150px; height: auto;">
                                    </td>
                                    <td>
                                        <?php if ($pro->status == 1): ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="<?php echo base_url('product/delete/' . $pro->product_id); ?>"
                                            class="btn btn-danger btn-sm mr-2"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa chứ?');">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </a>
                                        <a href="<?php echo base_url('product/edit/' . $pro->product_id); ?>"
                                            class="btn btn-warning btn-sm mr-2">
                                            <i class="fa-solid fa-wrench"></i> Sửa
                                        </a>
                                        <a href="<?php echo base_url('quantity/update/' . $pro->product_id); ?>"
                                            class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-bars-progress"></i> Quản lý kho
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <?php echo $pagination ?? ''; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>