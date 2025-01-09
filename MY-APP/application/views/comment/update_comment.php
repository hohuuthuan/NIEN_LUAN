<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Chỉnh sửa trạng thái bình luận</h5>
        </div>
        <div class="card-body">
            <!-- Nút trở về danh sách khách hàng -->
            <a href="<?php echo base_url('comment') ?>" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Danh sách bình luận
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
            <form action="<?php echo base_url('comment/update/'. $comments->id) ?>" method="POST" enctype="multipart/form-data">
            
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái tài khoản</label>
                    <select class="form-select" id="status" name="status">
                        <option value="1" <?php echo ($comments->status == 1) ? 'selected' : ''; ?>>Duyệt bình luận</option>
                        <option value="0" <?php echo ($comments->status == 0) ? 'selected' : ''; ?>>Chặn bình luận</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
            </form>
        </div>
    </div>
</div>
