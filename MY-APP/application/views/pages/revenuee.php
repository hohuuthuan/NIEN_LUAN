<div class="container d-flex align-items-center justify-content-center">
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
                    <tr>
                        <form action="<?php echo base_url('revenueee') ?>" method="POST" enctype="multipart/form-data">
                            <td>
                                <div class="form-group">
                                    <input name="day" value="" type="text" class="form-control" placeholder="Ngày">
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
                                    <input name="year" value="" type="text" class="form-control" placeholder="Năm">
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success">Xem</button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
