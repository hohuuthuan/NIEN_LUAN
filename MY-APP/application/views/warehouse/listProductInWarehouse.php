<div class="container">
    <div class="card">
        <div class="card-header">Danh sách sản phẩm trong kho</div>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php } elseif ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php } ?>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product as $key => $pro) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $key ?></th>
                            <td><?php echo $pro->title ?></td>
                            <td><img src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="" width="150" height="150"></td>
                            
                           <td><?php
                            if ($pro->status == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></td>
                            
                            <td><?php echo $pro->quantity ?></td>

                            
                            <td>
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này ra khỏi kho chứ chứ?')"
                                    href="<?php echo base_url('product/delete/' . $pro->product_id) ?>"
                                    class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('quantity/update/' . $pro->product_id) ?>" class="btn btn-warning">Nhập kho</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>