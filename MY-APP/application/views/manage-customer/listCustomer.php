<div class="container">
    <div class="card">
        <div class="card-header">Danh sách khách hàng</div>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($customers as $key => $cus){
                ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $cus->username?></td>
                    <td><?php echo $cus->email?></td>
                    <td><?php echo $cus->phone?></td>
                    <td><?php echo $cus->address?></td>
                    <td><img src="<?php echo base_url('uploads/user/'.$cus->avatar) ?>" alt="" width="150" height="150"></td>
                    <td><?php 
                        if($cus->status == 1){
                            echo "Bình thường";
                        }else{
                            echo "Người dùng bị khóa";
                        }     
                    ?></td>
                    <td>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa khách hàng này chứ?')" href="<?php echo base_url('manage-customer/delete/'.$cus->id) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Delete</a>
                        <a href="<?php echo base_url('manage-customer/edit/'.$cus->id) ?>" class="btn btn-warning"><i class="fa-solid fa-wrench"></i>Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>