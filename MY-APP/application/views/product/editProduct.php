<div class="container-fluid">
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
                <label>Quantity</label>
                <input name="quantity" value="<?php echo $product->quantity ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('quantity').'</span>' ?>
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
                <input name="price" value="<?php echo $product->price ?>" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                <?php echo '<span class="text text-danger">'.form_error('price').'</span>' ?>
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
</div>