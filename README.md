# phongtro
# Controllers
1. Tên controllers luôn luôn viết hoa chữ cái đầu tiên
2. Phải luôn luôn có hàm index() để khởi chạy.
3. Controller chứa các hàm xử lý dữ liệu lấy từ các model

# Models
1. Chứa các file thao tác trên CSDL của ứng dụng.
2. Tên model phải viết hoa chữ cái đầu, và phần đuôi luôn phải có '_model'.

# Views
1. Chứa các file hiển thị thông tin.



# Các lưu ý
1. Thêm base_url trong application/config/config.php
	a. http://localhost:8000/phongtro
HOẶC
	b. http://localhost/phongtro
Tùy vào port hiện tại được sử dụng trên localhost

2. Thêm base_url trong system/core/Config.php
	a. http://localhost:8000/
HOẶC
	b. http://localhost/
	
# Thư mục third-party : Chứa dữ liệu bên thứ 3 như plugins, css, less, sass, ... mục đích là thiết kế giao diện là chính
