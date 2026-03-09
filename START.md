# 🚀 HƯỚNG DẪN START BACKEND + FRONTEND

## ✅ ĐÃ HOÀN THÀNH SETUP

### 1. Dependencies đã cài đặt:

-   ✅ `inertiajs/inertia-laravel` (Server-side)
-   ✅ `@inertiajs/react` (Client-side)
-   ✅ `react` và `react-dom`
-   ✅ `@vitejs/plugin-react`

### 2. Files đã tạo/cấu hình:

-   ✅ `vite.config.js` - Đã config React + import aliases
-   ✅ `resources/js/app.jsx` - Entry point cho React
-   ✅ `resources/views/app.blade.php` - Root template
-   ✅ `app/Http/Middleware/HandleInertiaRequests.php` - Inertia middleware
-   ✅ `bootstrap/app.php` - Đã register middleware
-   ✅ `routes/web.php` - Đã thêm test route

### 3. Cấu trúc thư mục:

-   ✅ Đã tạo đầy đủ cấu trúc Next.js-style
-   ✅ Đã có example components (Button, Card)
-   ✅ Đã có example layout (PublicLayout)
-   ✅ Đã có example page (Home)
-   ✅ Đã có example hook (useAuth)
-   ✅ Đã có example utils (formatters)

---

## 🎯 CÁCH START ỨNG DỤNG

### **Cách 1: Chạy riêng biệt (Recommended cho development)**

#### Terminal 1 - Backend (Laravel):

```bash
php artisan serve
```

Server sẽ chạy tại: `http://localhost:8000`

#### Terminal 2 - Frontend (Vite):

```bash
npm run dev
```

Vite dev server sẽ chạy tại: `http://localhost:5173`

**➡️ Truy cập:** `http://localhost:8000` (Laravel sẽ tự động load assets từ Vite)

---

### **Cách 2: Sử dụng Laravel Sail (nếu đã cài Docker)**

```bash
# Start tất cả services
./vendor/bin/sail up -d

# Start Vite dev server
./vendor/bin/sail npm run dev
```

---

### **Cách 3: Build production (chỉ khi deploy)**

```bash
# Build assets
npm run build

# Start Laravel
php artisan serve
```

---

## 📝 COMMANDS THƯỜNG DÙNG

### Development:

```bash
# Terminal 1: Laravel backend
php artisan serve

# Terminal 2: Vite frontend
npm run dev

# Hoặc watch mode
npm run dev -- --watch
```

### Database (nếu cần):

```bash
# Chạy migrations
php artisan migrate

# Seed data
php artisan db:seed
```

### Clear cache (nếu có lỗi):

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Build production:

```bash
npm run build
```

---

## 🧪 KIỂM TRA SETUP

### 1. Kiểm tra Backend:

```bash
php artisan route:list
```

Bạn sẽ thấy route `GET / ` với action `Closure`

### 2. Kiểm tra Frontend:

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Mở browser: `http://localhost:8000`

Bạn sẽ thấy:

-   ✅ Trang Home với hero section
-   ✅ Danh sách comics (nếu có data)
-   ✅ Features section
-   ✅ Header với navigation
-   ✅ Footer

---

## 🔧 TROUBLESHOOTING

### Lỗi: "Vite manifest not found"

**Giải pháp:**

```bash
npm run dev
```

Đảm bảo Vite dev server đang chạy!

### Lỗi: "Target class [HandleInertiaRequests] does not exist"

**Giải pháp:**

```bash
composer dump-autoload
php artisan config:clear
```

### Lỗi: "Module not found: Can't resolve '@/...'"

**Giải pháp:**

-   Kiểm tra `vite.config.js` đã có alias `@`
-   Restart Vite dev server: `Ctrl+C` rồi `npm run dev`

### Lỗi: React components không render

**Giải pháp:**

```bash
# Clear cache
rm -rf node_modules/.vite
npm run dev
```

---

## 📂 WORKFLOW LÀM VIỆC

### Khi tạo page mới:

1. **Tạo Page component:**

```bash
# Tạo file: resources/js/Pages/About.jsx
```

2. **Thêm route:**

```php
// routes/web.php
Route::get('/about', function () {
    return Inertia::render('About');
});
```

3. **Refresh browser** - Hot reload tự động!

### Khi tạo component mới:

1. **Tạo component:**

```bash
# Tạo file: resources/js/Components/UI/Modal.jsx
```

2. **Export trong index.js:**

```javascript
// resources/js/Components/UI/index.js
export { default as Modal } from "./Modal";
```

3. **Sử dụng:**

```jsx
import { Modal } from "@/Components/UI";
```

---

## 🎨 FEATURES ĐÃ CÓ

### Import Aliases:

```jsx
import Button from "@/Components/UI/Button";
import { useAuth } from "@/Hooks/useAuth";
import PublicLayout from "@/Layouts/Public/PublicLayout";
```

### Hot Module Replacement (HMR):

-   ✅ Tự động reload khi sửa code
-   ✅ Giữ state khi có thể
-   ✅ Fast refresh cho React

### Tailwind CSS:

-   ✅ Đã cài đặt và config
-   ✅ Sử dụng được ngay

### Inertia.js Features:

-   ✅ SPA navigation
-   ✅ Progress bar
-   ✅ Shared data (auth)
-   ✅ Layout persistence

---

## 📚 NEXT STEPS

1. ✅ **Start app:** `php artisan serve` + `npm run dev`
2. ✅ **Mở browser:** `http://localhost:8000`
3. ✅ **Xem Home page** đã được render
4. 🚀 **Bắt đầu code!**

### Tạo pages mới:

-   Tham khảo `resources/js/Pages/Home.jsx`
-   Đọc `resources/js/Pages/README.md`

### Tạo components:

-   Tham khảo `resources/js/Components/UI/Button.jsx`
-   Đọc `resources/js/Components/README.md`

### Tạo layouts:

-   Tham khảo `resources/js/Layouts/Public/PublicLayout.jsx`
-   Đọc `resources/js/Layouts/README.md`

---

## 🎯 QUICK START (TL;DR)

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev

# Browser
open http://localhost:8000
```

**That's it! Bạn đã sẵn sàng! 🎉**

---

## 📞 HELP

Nếu gặp vấn đề:

1. Đọc phần TROUBLESHOOTING ở trên
2. Check console browser (F12)
3. Check terminal logs
4. Clear all cache và restart

---

**Created by:** Antigravity AI  
**Date:** 2026-01-14  
**Status:** ✅ Ready to use!
