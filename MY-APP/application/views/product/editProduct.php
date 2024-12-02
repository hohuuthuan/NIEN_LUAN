<!-- <div class="container">
    <div class="card">
        <div class="card-header">Chỉnh sửa sản phẩm</div>
        <div class="card-body">
        <a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Add product</a>
        <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">List product</a>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <form action="<?php echo base_url('product/update/'.$product->id) ?>" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label>Title</label>
                <input name="title" value="<?php echo $product->title ?>" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('title').'</span>' ?>
            </div>

            <div class="form-group">
                <label>Slug</label>
                <input name="slug" value="<?php echo $product->slug ?>" type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('slug').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input name="description" value="<?php echo $product->description ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('description').'</span>' ?>
            </div>
            
            <div class="form-group">
                <label>Price</label>
                <input name="selling_price" value="<?php echo $product->selling_price ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('selling_price').'</span>' ?>
            </div>

            <div class="form-group">
                <label>Đơn vị tính của sản phẩm</label>
                <input name="unit" value="<?php echo $product->unit ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('selling_price').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Giảm giá (%)</label>
                <input name="discount" value="<?php echo $product->discount ?>" type="number" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('selling_price').'</span>' ?>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                        <?php foreach($brand as $key => $bra) {?>
                            <option value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
                        <?php }?>
                    </select>
                    <?php echo '<span class="text text-danger">'.form_error('brand').'</span>' ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                        <?php foreach($category as $key => $cate) {?>
                            <option value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
                        <?php }?>
                    </select>
                    <?php echo '<span class="text text-danger">'.form_error('category').'</span>' ?>
                </div>
            </div>





            <div class="form-group">
                <label>Image</label>
                <input name="image" type="file" class="form-control-file" id="exampleInputPassword1" placeholder="">
                <img src="<?php echo base_url('uploads/product/'.$product->image) ?>" alt="" width="150" height="150">
                <small class="text text-danger"><?php if(isset($error)) echo $error ?></small>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <?php 
                            if($product->status == 1) {
                        ?>
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                            <?php }elseif($customers->status ==0){
                            ?>
                            <option value="1">Active</option>
                            <option selected  value="0">Inactive</option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div> -->





<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">Chỉnh sửa sản phẩm</div>
        <div class="card-body">
            <a href="<?php echo base_url('product/create') ?>" class="btn btn-secondary mb-3">Thêm sản phẩm</a>
            <a href="<?php echo base_url('product/list') ?>" class="btn btn-secondary mb-3">Danh sách sản phẩm</a>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
            
            <form action="<?php echo base_url('product/update/'.$product->id) ?>" method="POST" enctype="multipart/form-data">
                
                <!-- Thông tin cơ bản -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Thông tin cơ bản</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm</label>
                                <input name="title" value="<?php echo $product->title ?>" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Nhập tên sản phẩm">
                                <?php echo '<span class="text-danger">'.form_error('title').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" value="<?php echo $product->slug ?>" type="text" class="form-control" id="convert_slug" placeholder="Nhập slug cho sản phẩm">
                                <?php echo '<span class="text-danger">'.form_error('slug').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Mô tả và giá -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Thông tin giá</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" class="form-control" rows="4"><?php echo $product->description; ?></textarea>
                                <!-- <input name="description" value="<?php echo $product->description ?>" type="text" class="form-control"> -->
                                <?php echo '<span class="text-danger">'.form_error('description').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selling_price">Giá bán</label>
                                <input name="selling_price" value="<?php echo $product->selling_price ?>" type="text" class="form-control" placeholder="Nhập giá bán">
                                <?php echo '<span class="text-danger">'.form_error('selling_price').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Đơn vị và giảm giá -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Đơn vị và giảm giá</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="unit">Đơn vị tính</label>
                                <input name="unit" value="<?php echo $product->unit ?>" type="text" class="form-control" placeholder="Nhập đơn vị tính của sản phẩm">
                                <?php echo '<span class="text-danger">'.form_error('unit').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount">Giảm giá (%)</label>
                                <input name="discount" value="<?php echo $product->discount ?>" type="number" class="form-control" placeholder="Nhập % giảm giá">
                                <?php echo '<span class="text-danger">'.form_error('discount').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Danh mục và thương hiệu -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Phân loại</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand">Thương hiệu</label>
                                <select name="brand_id" class="form-control">
                                    <?php foreach($brand as $bra) { ?>
                                        <option value="<?php echo $bra->id ?>" <?php echo $product->brand_id == $bra->id ? 'selected' : '' ?>><?php echo $bra->title ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo '<span class="text-danger">'.form_error('brand').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Danh mục</label>
                                <select name="category_id" class="form-control">
                                    <?php foreach($category as $cate) { ?>
                                        <option value="<?php echo $cate->id ?>" <?php echo $product->category_id == $cate->id ? 'selected' : '' ?>><?php echo $cate->title ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo '<span class="text-danger">'.form_error('category').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Hình ảnh và trạng thái -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Hình ảnh và trạng thái</legend>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input name="image" type="file" class="form-control-file">
                        <img src="<?php echo base_url('uploads/product/'.$product->image) ?>" alt="Hình ảnh sản phẩm" width="150" height="150" class="mt-2">
                        <small class="text-danger"><?php if(isset($error)) echo $error ?></small>
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1" <?php echo $product->status == 1 ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?php echo $product->status == 0 ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
            </form>
        </div>
    </div>
</div>
