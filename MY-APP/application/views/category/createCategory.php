<div class="container-fluid">
    <div class="card">
        <div class="card-header">Thêm danh mục</div>
        <div class="card-body">
        <a href="<?php echo base_url('category/list') ?>" class="btn btn-primary">List category</a>
        <form action="<?php echo base_url('category/store') ?>" method="POST" enctype="multipart/form-data" >

            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>

            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('title').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input name="slug" type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('slug').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('description').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control-file" id="exampleInputPassword1" placeholder="">
                <small class="text text-danger"><?php if(isset($error)) echo $error ?></small>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <option selected value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <?php echo '<span class="text text-danger">'.form_error('status').'</span>' ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>