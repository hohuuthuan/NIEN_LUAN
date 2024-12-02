<!-- <div class="container">
    <div class="card">
        <div class="card-header">Thêm sản phẩm</div>
        <div class="card-body">
        <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">List product</a>
        <form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data" >

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
                <label>Quantity</label>
                <input name="quantity" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('quantily').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input name="slug" type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('slug').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" type="text" class="form-control" id="exampleInputPassword1" placeholder=""></textarea>
                <?php echo '<span class="text text-danger">'.form_error('description').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Import Price / One product</label>
                <input name="import_price_one_product" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('import_price_one_product').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Selling Price</label>
                <input name="selling_price" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('selling_price').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Đơn vị tính của sản phẩm</label>
                <input name="unit" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('selling_price').'</span>' ?>
            </div>
            <div class="form-group">
                <label>Mã giảm giá</label>
                <input name="discount" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
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



            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div> -->





<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">Thêm sản phẩm</div>
        <div class="card-body">
            <a href="<?php echo base_url('product/list') ?>" class="btn btn-secondary mb-3">Danh sách sản phẩm</a>
            <form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data">
                <?php if($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
                <?php } elseif($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
                <?php } ?>

                <!-- Thông tin cơ bản -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Tên sản phẩm</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm</label>
                                <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Nhập tên sản phẩm">
                                <?php echo '<span class="text-danger">'.form_error('title').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input name="quantity" type="number" class="form-control" placeholder="Nhập số lượng">
                                <?php echo '<span class="text-danger">'.form_error('quantity').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Giá và giảm giá -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Thông tin giá</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="import_price">Giá nhập (1 sản phẩm)</label>
                                <input name="import_price_one_product" type="number" class="form-control" placeholder="Nhập giá nhập">
                                <?php echo '<span class="text-danger">'.form_error('import_price_one_product').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selling_price">Giá bán</label>
                                <input name="selling_price" type="number" class="form-control" placeholder="Nhập giá bán">
                                <?php echo '<span class="text-danger">'.form_error('selling_price').'</span>' ?>
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
                                    <?php foreach($brand as $key => $bra) { ?>
                                        <option value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo '<span class="text-danger">'.form_error('brand').'</span>' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Danh mục</label>
                                <select name="category_id" class="form-control">
                                    <?php foreach($category as $key => $cate) { ?>
                                        <option value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo '<span class="text-danger">'.form_error('category').'</span>' ?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Thông tin thêm -->
                <fieldset class="border p-3 mb-4">
                    <legend class="w-auto px-2 text-primary">Mô tả và hình ảnh sản phẩm</legend>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
                        <?php echo '<span class="text-danger">'.form_error('description').'</span>' ?>
                    </div>
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input name="image" type="file" class="form-control-file">
                        <small class="text-danger"><?php if(isset($error)) echo $error ?></small>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <?php echo '<span class="text-danger">'.form_error('status').'</span>' ?>
                    </div>
                </fieldset>

                <!-- Submit -->
                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>
