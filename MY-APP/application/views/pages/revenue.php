<h2 style="text-align: center; margin-bottom: 30px; color: #FE980F;">Thống kê doanh thu</h2>
<div class="container d-flex align-items-center justify-content-center">
    <div style="width: 50%;" class="card">
        <div class="card-body">
            <h5>Doanh thu ngày hôm nay</h5>
            <table class="table">
                <thead style="border-bottom: 3px solid #FE980F;" class="thead-light">
                    <tr>

                        <th scope="col">Ngày</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daily_revenue as $revenue) { ?>
                        <tr style="border-bottom: 2px solid #FE980F;">

                        <tr>

                            <td><?php echo $revenue->date; ?></td>
                            <td><?php echo number_format($revenue->total, 0, ',', '.'); ?> VNĐ</td>
                        </tr>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    <div style="width: 50%;" class="card">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
        <?php } elseif ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php } ?>
        <div class="card-body">
            <h5>Doanh thu tháng này</h5>
            <table class="table">
                <thead style="border-bottom: 3px solid #FE980F;" class="thead-light">
                    <tr>

                        <th scope="col">Tháng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monthly_revenue as $revenue) { ?>
                        <tr style="border-bottom: 2px solid #FE980F;">

                        <tr>

                            <td><?php echo $revenue->month; ?></td>
                            <td><?php echo number_format($revenue->total, 0, ',', '.'); ?> VNĐ</td>
                        </tr>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <h3 style="margin-top: 20px;color: #FE980F; z-index: 1;">Thống kê doanh thu tùy chỉnh</h3>
    </div>
</div>


<!-- <div class="container d-flex align-items-center justify-content-center">
    <div style="width: 50%;" class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr style="border-bottom: 3px solid #FE980F;">
                        <th style="width: 140px;" scope="col">Nhập ngày</th>
                        <th scope="col">Chọn tháng</th>
                        <th scope="col">Nhập năm</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <form action="<?php echo base_url('revenue-custom')?>" method="POST" enctype="multipart/form-data">
                            <td>
                                <div class="form-group">
                                    <input name="day" value="" type="text" class="form-control"
                                     placeholder="Ngày"
                                       >
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="month" class="form-control" id="monthSelect">
                                        <option value="1">Tháng 1</option>
                                        <option value="2">Tháng 2</option>
                                        <option value="3">Tháng 3</option>
                                        <option value="4">Tháng 4</option>
                                        <option value="5">Tháng 5</option>
                                        <option value="6">Tháng 6</option>
                                        <option value="7">Tháng 7</option>
                                        <option value="8">Tháng 8</option>
                                        <option value="9">Tháng 9</option>
                                        <option value="10">Tháng 10</option>
                                        <option value="11">Tháng 11</option>
                                        <option value="12">Tháng 12</option>
                                    </select>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                    <input name="ye" value="" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Năm">
                                </div>
                            </td>
                            <td><button type="submit" class="btn btn-success">Xem</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div style="width: 50%;" class="card">
        <div style="height: 186px;" class="card-body">
            <table class="table">
                <thead style="border-bottom: 3px solid #FE980F;" class="thead-light">
                    <tr>
                        <th scope="col">Tháng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 2px solid #FE980F;">

                    <tr>
                        <td>in ra ngày tháng người dùng nhập vào ở đây</td>
                        <td>in ra số tiền với lựa choj của người dùng</td>
                    </tr>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</div> -->





