
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">Thêm danh mục</div>
        <div class="card-body">
            <a href="<?php echo base_url('category/listt') ?>" class="btn btn-secondary mb-3">Danh sách danh mục</a>
            <form action="<?php echo base_url('category/store') ?>" method="POST" enctype="multipart/form-data">

                <?php if($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
                <?php } elseif($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
                <?php } ?>

                <!-- Thông tin cơ bản -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Thông tin danh mục</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Tên danh mục</label>
                                <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Nhập tên thương hiệu">
                                <?php echo '<span class="text-danger">'.form_error('title').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" type="text" class="form-control" id="convert_slug" placeholder="Nhập slug">
                                <?php echo '<span class="text-danger">'.form_error('slug').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Mô tả và hình ảnh -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Mô tả và hình ảnh</legend>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" type="text" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                        <?php echo '<span class="text-danger">'.form_error('description').'</span>' ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input name="image" type="file" class="form-control-file">
                        <small class="text-danger"><?php if(isset($error)) echo $error ?></small>
                    </div>
                </fieldset>

                <!-- Trạng thái -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Trạng thái</legend>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Submit -->
                <button type="submit" class="btn btn-success">Thêm danh mục</button>
            </form>
        </div>
    </div>
</div>
