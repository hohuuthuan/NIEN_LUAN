<div class="container">
    <div class="card">
        <div class="card-header">Chỉnh sửa danh mục</div>
        <div class="card-body">
        <a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Add category</a>
        <a href="<?php echo base_url('category/list') ?>" class="btn btn-primary">List category</a>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <form action="<?php echo base_url('category/update/'.$category->id) ?>" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label>Title</label>
                <input name="title" value="<?php echo $category->title ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('title').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input name="slug" value="<?php echo $category->slug ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('slug').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" value="<?php echo $category->description ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('description').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control-file" id="exampleInputPassword1" placeholder="">
                <img src="<?php echo base_url('uploads/category/'.$category->image) ?>" alt="" width="150" height="150">
                <small class="text text-danger"><?php if(isset($error)) echo $error ?></small>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <?php 
                            if($category->status == 1) {
                        ?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>