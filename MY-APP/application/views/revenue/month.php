<div class="container-fluid">
    <div class="card">
        <div class="card-header">Thống kê doanh thu theo tháng</div>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <div class="card-body">
            <a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Add product</a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tổng sản phẩm đã bán</th>
                    <th scope="col">Số lượng đơn hàng</th>
                    <th scope="col">Tổng số tiền thu được</th>
                    <th scope="col">Tiền lời</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($product as $key => $pro){
                ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $pro->title?></td>
                    <td><?php echo $pro->slug?></td>
                    <td><?php echo $pro->description?></td>
                    <td><?php echo number_format($pro->price,0, ',','.') ?>vnd</td>
                    <td><?php echo $pro->tenthuonghieu?></td>
                    <td><?php echo $pro->tendanhmuc?></td>
                    <td>
                        <?php echo $pro->quantity?>
                        
                </td>
                    <td><img src="<?php echo base_url('uploads/product/'.$pro->image) ?>" alt="" width="150" height="150"></td>
                    <td><?php 
                        if($pro->status == 1){
                            echo "Active";
                        }else{
                            echo "Inactive";
                        }     
                    ?></td>
                    <td>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" href="<?php echo base_url('product/delete/'.$pro->product_id) ?>" class="btn btn-danger">Delete</a>
                        <a href="<?php echo base_url('product/edit/'.$pro->product_id) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url('quantity/update/'.$pro->product_id)?>"><button class="btn btn-warning">Quản lý trong kho</button></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>