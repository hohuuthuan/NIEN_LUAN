<div class="container">
    <div class="card">
        <div class="card-header">Chi tiết đơn hàng</div>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Hình thức thanh toán</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                    foreach($order_details as $key => $ord){
                ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $ord->order_code?></td>
                    <td><?php echo $ord->title?></td>
        
                    <td><img src="<?php echo base_url('uploads/product/'.$ord->image) ?>" alt="" width="150" height="150"></td>
                    <td><?php echo number_format($ord->price,0, ',','.') ?>vnd</td>
                    <td><?php echo $ord->qty?></td>
                    <td><?php echo $ord->form_of_payment?></td>
                    <td><?php echo number_format($ord->qty * $ord->price,0, ',','.') ?>vnd</td>
                    
                    <?php if(($ord->order_status == 1) || ($ord->order_status == 2) ) {?>
                        echo '
                            <td>
                                <a onclick="return confirm('Bạn chắc chắn xóa đơn này chứ, các sản phẩm trong đơn sẽ được xóa')" href="<?php echo base_url('order_customer/deleteOrder/'.$ord->order_code) ?>" class="btn btn-danger">Delete Order</a>
                                
                            </td>
                        
                        ';
                    <?php }?>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>