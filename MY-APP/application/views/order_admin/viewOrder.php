<div class="container-fluid">
    <div class="card">
        <div class="card-header">Danh sách đơn đặt hàng</div>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php } elseif ($this->session->flashdata('error')) { ?>
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
                        <th scope="col">Sale</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Hình thức thanh toán</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $previous_order_code = null;
                    $order_totals = []; // Biến để lưu tổng tiền của từng đơn hàng
                    foreach ($order_details as $key => $ord):
                        // Tính tổng tiền của từng đơn hàng
                        if (isset($ord->discount) && $ord->discount != 0) {
                            $discounted_price = $ord->selling_price * (1 - $ord->discount / 100);
                            $subtotal = $ord->qty * $discounted_price;
                        } else {
                            $subtotal = $ord->qty * $ord->selling_price;
                        }
                        if (!isset($order_totals[$ord->order_code])) {
                            $order_totals[$ord->order_code] = 0;
                        }
                        $order_totals[$ord->order_code] += $subtotal;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $ord->order_code ?></td>
                            <td><?php echo $ord->title ?></td>
                            <td><img src="<?php echo base_url('uploads/product/' . $ord->image) ?>" alt="" width="150" height="150"></td>
                            <td>
                                <?php
                                if (isset($ord->discount) && $ord->discount != 0) {
                                    $discounted_price = $ord->selling_price * (1 - $ord->discount / 100);
                                    echo '<span style="text-decoration: line-through;">' . number_format($ord->selling_price, 0, ',', '.') . ' VNĐ</span><br>';
                                    echo '<span style="color: red;">' . number_format($discounted_price, 0, ',', '.') . ' VNĐ</span>';
                                } else {
                                    echo number_format($ord->selling_price, 0, ',', '.') . ' VNĐ';
                                }
                                ?>
                            </td>
                            <td><?php echo $ord->discount ?>%</td>
                            <td><?php echo $ord->qty ?></td>
                            <td><?php echo $ord->form_of_payment ?></td>
                            <td>
                                <?php
                                if (isset($ord->discount) && $ord->discount != 0) {
                                    $discounted_price = $ord->selling_price * (1 - $ord->discount / 100);
                                    echo '<span style="text-decoration: line-through;">' . number_format($ord->qty * $ord->selling_price, 0, ',', '.') . ' VNĐ</span><br>';
                                    echo '<span style="color: red;">' . number_format($ord->qty * $discounted_price, 0, ',', '.') . ' VNĐ</span>';
                                } else {
                                    echo number_format($ord->qty * $ord->selling_price, 0, ',', '.') . ' VNĐ';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($ord->order_code != $previous_order_code) {
                                    ?>
                                    <select class="order_status form-control" data-order-code="<?php echo $ord->order_code ?>">
                                        <option value="1" <?php echo $ord->order_status == 1 ? 'selected' : '' ?>>Xử lý đơn hàng</option>
                                        <option value="2" <?php echo $ord->order_status == 2 ? 'selected' : '' ?>>Đang chuẩn bị hàng</option>
                                        <option value="3" <?php echo $ord->order_status == 3 ? 'selected' : '' ?>>Đơn đã được giao cho đơn vị vận chuyển</option>
                                        <option value="4" <?php echo $ord->order_status == 4 ? 'selected' : '' ?>>Đơn hàng đã được thanh toán</option>
                                        <option value="5" <?php echo $ord->order_status == 5 ? 'selected' : '' ?>>Hủy</option>
                                    </select>
                                    <?php
                                    $previous_order_code = $ord->order_code;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
           // Hiển thị tổng tiền của đơn hnàg
            foreach ($order_totals as $order_code => $total):?>
                <div style="text-align: right; margin-right: 40px">
                    <h4>Tổng tiền của đơn <?php echo $order_code; ?>:</h4>
                <h3 style="color: red;"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
