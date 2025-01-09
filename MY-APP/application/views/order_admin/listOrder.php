<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">Danh sách đơn đặt hàng</div>
        
        <?php if($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php } elseif($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php } ?>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order code</th>
                            <th scope="col">Customer name</th>
                            <th scope="col">Customer phone</th>
                            <th scope="col">Customer address</th>
                            <th scope="col">Payment form</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order as $key => $ord): ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td><?php echo $ord->order_code ?></td>
                                <td><?php echo $ord->name ?></td>
                                <td><?php echo $ord->phone ?></td>
                                <td style="width: 400px;"><?php echo $ord->address ?></td>
                                <td><?php echo $ord->form_of_payment ?></td>
                                <td>
                                    <?php 
                                    if ($ord->status == 1) {
                                        echo '<span class="badge badge-primary">Đang chờ xử lý</span>';
                                    } elseif ($ord->status == 2) {
                                        echo '<span class="badge badge-warning">Đang chuẩn bị hàng</span>';
                                    } elseif ($ord->status == 3) {
                                        echo '<span class="badge badge-success">Đã giao cho đơn vị vận chuyển</span>';
                                    } elseif ($ord->status == 4) {
                                        echo '<span class="badge badge-info">Đơn hàng đã được thanh toán</span>';
                                    } else {
                                        echo '<span class="badge badge-danger">Đã hủy</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" href="<?php echo base_url('order_admin/deleteOrder/'.$ord->order_code) ?>" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                    <a href="<?php echo base_url('order_admin/viewOrder/'.$ord->order_code) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-eye"></i> Xem
                                    </a>
                                    <a href="<?php echo base_url('order_admin/printOrder/'.$ord->order_code) ?>" class="btn btn-success btn-sm" target="_blank">
                                        <i class="fa-solid fa-print"></i> Print Order
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
