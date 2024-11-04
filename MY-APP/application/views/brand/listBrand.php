<div class="container-fluid">
    <div class="card">
        <div class="card-header">Danh sách thương hiệu</div>
            <?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>
        <div class="card-body">
            <a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Add brand</a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
                <?php
                    foreach($brand as $key => $bra){
                ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $bra->title?></td>
                    <td><?php echo $bra->slug?></td>
                    <td><?php echo $bra->description?></td>
                    <td><img src="<?php echo base_url('uploads/brand/'.$bra->image) ?>" alt="" width="150" height="150"></td>
                    <td><?php 
                        if($bra->status == 1){
                            echo "Active";
                        }else{
                            echo "Inactive";
                        }     
                    ?></td>
                    <td>
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')" href="<?php echo base_url('brand/delete/'.$bra->id) ?>" class="btn btn-danger">Delete</a>
                        <a href="<?php echo base_url('brand/edit/'.$bra->id) ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php } ?>
            </>
            </table>
        </div>
    </div>
</div>