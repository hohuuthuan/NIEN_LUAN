# NIEN_LUAN


done BAI6
done BAI8
done BAI12
done BAI22
done BAI26
done BAI42
done BAI47
done BAI49
done BAI51

bài 62 sản phẩm liên quan chưa làm 
tới bài 65 đánh giá bằng sao



Làm tới phần hiển thị hủy đơns cho customer: trạng thái bằng 1 và 2 mới hiện nút hủy đơn


Đã thay đổi cấu trúc bảng product và warehouses
Ngày mai cần phải làm về giảm giá, thống kê doanh thu
Làm thêm nút nhập kho để update số lượng còn trong kho của sản phẩm.


Đã làm xong cái giảm giá sản phẩm


Nếu nhập kho thì lưu thêm giá nhập của sản phẩm để khi mà in ra tiền lời thì lấy số lượng sản phẩm nhân với giá nhập đó
Tổng tiền thu thì chỉ cộng cột subtotal bên orders_details
Lấy đó mà trừ ra là ok

Làm thêm cái thống kê doanh thu: chung 1 trang, giao diện là chọn ngày, tháng, năm để có thể tính doanh thu bất cứ thời gian nào
Thêm các giao diện thống kê chỉ theo tháng, ngày, tuần, năm




Ngày mai nên làm là:
khi bấm xác thực thì gửi mail về
Trên mail khi bấm xác thực thì có email trên đường dẫn luôn
sau khi bấm xác thực thì trong hàm đó có lấy email về
chuyển sang trang nhập mật khẩu mới với email đó truyền vào
route resetpass thì update lại thông tin người dùng
còn số điện thoại thì tính sau



Làm thống kê doanh thu
Lưu ý là khi xóa đơn hàng thì chỉ xóa bên bảng order
Bảng order_detail vẫn còn sử dụng để tính thống kê doanh thu
Cập nhật trạng thái thanh toán với value = 4 của hàm update_order_status