
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">Chỉnh sửa danh mục</div>
        <div class="card-body">
            <a href="<?php echo base_url('category/list') ?>" class="btn btn-secondary mb-3">Danh sách danh mục</a>
            <form action="<?php echo base_url('category/update/' . $category->id) ?>" method="POST" enctype="multipart/form-data">

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
                                <input name="title" value="<?php echo $category->title ?>" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Nhập tên danh mục">
                                <?php echo '<span class="text-danger">'.form_error('title').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" value="<?php echo $category->slug ?>" type="text" class="form-control" id="convert_slug" placeholder="Nhập slug">
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
                        <textarea name="description" type="text" class="form-control" rows="4" placeholder="Nhập mô tả"><?php echo $category->description ?></textarea>
                        <?php echo '<span class="text-danger">'.form_error('description').'</span>' ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input name="image" type="file" class="form-control-file">
                        <img src="<?php echo base_url('uploads/category/'.$category->image) ?>" alt="" width="150" height="150">
                        <small class="text-danger"><?php if(isset($error)) echo $error ?></small>
                    </div>
                </fieldset>

                <!-- Trạng thái -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Trạng thái</legend>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1" <?php echo ($category->status == 1) ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?php echo ($category->status == 0) ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Submit -->
                <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
            </form>
        </div>
    </div>
</div>
