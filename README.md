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





MVC (Model-View-Controller), giúp tách biệt logic xử lý, giao diện và dữ liệu trong ứng dụng. Với triết lý “ít cấu hình, nhiều khả năng”, CodeIgniter thích hợp cho cả những dự án nhỏ và những ứng dụng web lớn yêu cầu tốc độ xử lý cao.
Model: Chịu trách nhiệm xử lý dữ liệu, bao gồm truy vấn cơ sở dữ liệu, thao tác và quản lý thông tin. Model giúp ứng dụng duy trì tính gọn gàng bằng cách tách biệt logic dữ liệu khỏi các phần khác.
View: Là phần giao diện người dùng, chịu trách nhiệm hiển thị dữ liệu từ Model. Các View được tổ chức linh hoạt, giúp việc thay đổi hoặc nâng cấp giao diện dễ dàng hơn.
Controller: Đóng vai trò trung gian, xử lý yêu cầu từ người dùng, gọi Model để lấy dữ liệu và chuyển dữ liệu đến View để hiển thị.
Hệ thống Router: CodeIgniter cung cấp một hệ thống định tuyến (routing) mạnh mẽ, cho phép điều chỉnh các URL linh hoạt mà không cần phải phụ thuộc vào cấu trúc thư mục vật lý. Router giúp tối ưu hóa SEO và tăng khả năng kiểm soát ứng dụng
Thư viện và Helper: CodeIgniter tích hợp sẵn nhiều thư viện và helper để hỗ trợ các chức năng phổ biến như xử lý tệp, gửi email, quản lý session, và xử lý biểu mẫu. Điều này giúp giảm thời gian phát triển và đảm bảo các chức năng được thực thi an toàn, hiệu quả.
Hệ thống Bảo mật: Lọc và xác thực dữ liệu đầu vào để ngăn chặn các lỗ hổng như SQL Injection hoặc XSS (Cross-Site Scripting).
Quản lý session với các cơ chế mã hóa để đảm bảo thông tin người dùng được bảo vệ.
Tích hợp và Mở rộng: Framework cho phép tích hợp dễ dàng với các hệ thống khác và hỗ trợ các tính năng mở rộng thông qua việc thêm các thư viện bên ngoài hoặc xây dựng module tùy chỉnh.





# Phần AI
python 3.9
CUDA 11.8
ultralytis
