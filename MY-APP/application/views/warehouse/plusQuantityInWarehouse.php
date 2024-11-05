<div class="container">
    <div class="card">
        <div class="card-header">Nhập hàng vào kho</div>
        <div class="card-body">
            <a href="<?php echo base_url('warehouse/list') ?>" class="btn btn-primary">Danh sách sản phẩm có trong
                kho</a>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
            <?php } elseif ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?>


            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity now</th>
                        <th scope="col">Add quantity</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $product->title ?></td>
                        <td><img src="<?php echo base_url('uploads/product/' . $product->image) ?>" alt="" width="150"
                                height="150"></td>
                        <td><?php echo $product->quantity ?></td>
                        <form action="<?php echo base_url('warehouse/plusquantity/' . $product->id) ?>" method="POST"
                            enctype="multipart/form-data">
                            <td>
                                <div class="form-group">
                                    <input name="quantity" value="" type="text"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nhập vào số lượng sản phẩm thêm vào kho">
                                    <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>' ?>
                                </div>
                            </td>
                            <td><button type="submit" class="btn btn-success">Nhập vào kho</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>