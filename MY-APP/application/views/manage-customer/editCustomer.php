<div class="container">
    <div class="card">
        <div class="card-header">Chỉnh sửa khách hàng</div>
        <div class="card-body">
        <a href="<?php echo base_url('customer/list') ?>" class="btn btn-primary">List customer</a>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <form action="<?php echo base_url('manage-customer/update/'.$customers->id) ?>" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                        <?php 
                            if($customers->status == 1) {
                        ?>
                            <option selected value="1">Kích hoạt</option>
                            <option value="0">Khóa tài khoản</option>
                        <?php }elseif($customers->status ==0){
                            ?>
                            <option value="1">Kích hoạt</option>
                            <option selected  value="0">Khóa tài koản</option>
                        <?php }?>

                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>