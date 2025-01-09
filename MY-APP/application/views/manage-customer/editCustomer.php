<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Chỉnh sửa khách hàng</h5>
        </div>
        <div class="card-body">
            <!-- Nút trở về danh sách khách hàng -->
            <a href="<?php echo base_url('customer/list') ?>" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Danh sách khách hàng
            </a>

            <!-- Hiển thị thông báo -->
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Form chỉnh sửa khách hàng -->
            <form action="<?php echo base_url('manage-customer/update/' . $customers->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $customers->username ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $customers->email ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $customers->address ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $customers->phone ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $customers->id ?>">

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <div class="mt-2">
                        <img src="<?php echo base_url('uploads/user/' . $customers->avatar) ?>" alt="Avatar" width="150" height="150">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái tài khoản</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1" <?php echo ($customers->status == 1) ? 'selected' : ''; ?>>Kích hoạt</option>
                        <option value="0" <?php echo ($customers->status == 0) ? 'selected' : ''; ?>>Khóa tài khoản</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
            </form>
        </div>
    </div>
</div>
