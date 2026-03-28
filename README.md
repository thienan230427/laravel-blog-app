# Đồ án: Tiệm Sách Nhà Gấu (Laravel Blog App)

Chào thầy, đây là source code đồ án website "Tiệm Sách Nhà Gấu" của em. 

Để giao diện (Tailwind CSS, hiệu ứng kính mờ Glassmorphism) hiển thị đúng và đầy đủ nhất, thầy vui lòng cài đặt và chạy các lệnh build frontend theo hướng dẫn chi tiết dưới đây giúp em ạ.

## Yêu cầu môi trường
- PHP >= 8.1
- Composer
- Node.js & npm (Bắt buộc để build CSS/JS)
- MySQL hoặc SQLite

## Hướng dẫn cài đặt và chạy dự án

**Bước 1: Clone source code về máy**
```bash
git clone https://github.com/thienan230427/laravel-blog-app.git
cd laravel-blog-app
```

**Bước 2: Cài đặt các thư viện**
```bash
composer install
npm install
```

**Bước 3: Cấu hình biến môi trường (.env)**
Thầy copy file `.env.example` thành `.env`:
```bash
cp .env.example .env
```
*(Thầy cấu hình thông tin database phù hợp trong file .env giúp em nhé).*

**Bước 4: Tạo App Key và Database**
```bash
php artisan key:generate
php artisan migrate
```

**Bước 5: Build giao diện (Rất quan trọng ⚠️)**
Vì đồ án em sử dụng Tailwind CSS và Vite, nên thầy cần chạy lệnh này để compile file CSS. Nếu bỏ qua bước này, giao diện sẽ bị mất style và không hiển thị đúng thiết kế:
```bash
npm run build
```
*(Hoặc thầy có thể chạy `npm run dev` và treo ở một terminal riêng cũng được ạ).*

**Bước 6: Khởi chạy server**
```bash
php artisan serve
```
Sau đó thầy truy cập vào đường dẫn `http://localhost:8000` để xem website.

---
Em cảm ơn thầy đã dành thời gian chấm đồ án của em ạ!
