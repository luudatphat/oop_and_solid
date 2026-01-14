# 📖 PROJECT SETUP GUIDE

## Laravel + Inertia.js + React + Tailwind CSS

Dự án này sử dụng **Laravel** làm backend, **Inertia.js** làm cầu nối, và **React** làm frontend với cấu trúc **Next.js-style**.

---

## 🚀 Quick Start

### 1. Clone và cài đặt dependencies:

```bash
# Cài đặt PHP dependencies
composer install

# Cài đặt Node dependencies
npm install

# Copy .env file
cp .env.example .env

# Generate app key
php artisan key:generate

# Chạy migrations
php artisan migrate

# (Optional) Seed data
php artisan db:seed
```

### 2. Start development servers:

**Terminal 1 - Backend:**

```bash
php artisan serve
```

**Terminal 2 - Frontend:**

```bash
npm run dev
```

### 3. Mở browser:

```
http://localhost:8000
```

---

## 📁 Cấu Trúc Dự Án

```
example-app/
├── app/                          # Laravel backend
│   ├── Http/
│   │   ├── Controllers/         # API & Inertia controllers
│   │   └── Middleware/
│   │       └── HandleInertiaRequests.php
│   └── Models/                  # Eloquent models
│
├── resources/
│   ├── js/                      # ⭐ React frontend (Next.js style)
│   │   ├── Components/          # Reusable components
│   │   ├── Layouts/             # Layout wrappers
│   │   ├── Pages/               # Inertia pages
│   │   ├── Hooks/               # Custom hooks
│   │   ├── Utils/               # Utilities
│   │   ├── Contexts/            # React contexts
│   │   ├── Services/            # API services
│   │   └── app.jsx              # Entry point
│   │
│   ├── views/
│   │   └── app.blade.php        # Root template
│   └── css/
│       └── app.css              # Tailwind CSS
│
├── routes/
│   └── web.php                  # Inertia routes
│
├── vite.config.js               # Vite configuration
├── tailwind.config.js           # Tailwind configuration
│
├── SETUP_COMPLETE.txt           # ✅ Setup summary
├── START.md                     # 📖 Detailed start guide
├── CHECKLIST.md                 # ✅ Quick checklist
└── PROJECT_README.md            # 📄 This file
```

---

## 📚 Documentation

### Quick References:

-   **[SETUP_COMPLETE.txt](./SETUP_COMPLETE.txt)** - Visual summary của setup
-   **[START.md](./START.md)** - Hướng dẫn chi tiết + troubleshooting
-   **[CHECKLIST.md](./CHECKLIST.md)** - Quick checklist

### Frontend Structure:

-   **[resources/js/README.md](./resources/js/README.md)** - Workflow & cấu trúc
-   **[resources/js/SUMMARY.md](./resources/js/SUMMARY.md)** - Files đã tạo
-   **[resources/js/STRUCTURE.md](./resources/js/STRUCTURE.md)** - Cấu trúc chi tiết

### Component Guides:

-   [Components/README.md](./resources/js/Components/README.md)
-   [Layouts/README.md](./resources/js/Layouts/README.md)
-   [Pages/README.md](./resources/js/Pages/README.md)
-   [Hooks/README.md](./resources/js/Hooks/README.md)
-   [Utils/README.md](./resources/js/Utils/README.md)
-   [Contexts/README.md](./resources/js/Contexts/README.md)
-   [Services/README.md](./resources/js/Services/README.md)

---

## 🛠️ Tech Stack

### Backend:

-   **Laravel 11** - PHP framework
-   **Inertia.js** - Server-side adapter
-   **MySQL** - Database

### Frontend:

-   **React 18** - UI library
-   **Inertia.js** - Client-side adapter
-   **Vite** - Build tool
-   **Tailwind CSS** - Styling

### Features:

-   ✅ Hot Module Replacement (HMR)
-   ✅ Import aliases (`@/`)
-   ✅ SPA navigation
-   ✅ Persistent layouts (Next.js style)
-   ✅ Shared auth data
-   ✅ Progress bar

---

## 💡 Development Workflow

### Tạo Page Mới:

1. **Tạo page component:**

```jsx
// resources/js/Pages/About.jsx
import PublicLayout from "@/Layouts/Public/PublicLayout";
import { Head } from "@inertiajs/react";

const About = () => {
    return (
        <>
            <Head title="About" />
            <div>About page content</div>
        </>
    );
};

About.layout = (page) => <PublicLayout>{page}</PublicLayout>;
export default About;
```

2. **Thêm route:**

```php
// routes/web.php
Route::get('/about', function () {
    return Inertia::render('About');
});
```

3. **Refresh browser** - Done! 🎉

### Tạo Component Mới:

1. **Tạo component:**

```jsx
// resources/js/Components/UI/Alert.jsx
const Alert = ({ children, variant = "info" }) => {
    return <div className={`alert alert-${variant}`}>{children}</div>;
};
export default Alert;
```

2. **Export trong index:**

```javascript
// resources/js/Components/UI/index.js
export { default as Alert } from "./Alert";
```

3. **Sử dụng:**

```jsx
import { Alert } from "@/Components/UI";
<Alert variant="success">Success message!</Alert>;
```

---

## 🎨 Example Code

### Button Component:

```jsx
import { Button } from '@/Components/UI';

<Button variant="primary" size="md">Click me</Button>
<Button variant="danger" onClick={handleDelete}>Delete</Button>
```

### Card Component:

```jsx
import { Card } from "@/Components/UI";

<Card title="My Card" hoverable>
    <p>Card content here</p>
</Card>;
```

### useAuth Hook:

```jsx
import { useAuth } from "@/Hooks/useAuth";

const { user, isAuthenticated, isGuest } = useAuth();
```

### Formatters:

```jsx
import { formatCurrency, formatDate } from "@/Utils/formatters";

formatCurrency(100000); // "100.000 ₫"
formatDate(new Date()); // "14 tháng 1, 2026"
```

---

## 🔧 Commands

### Development:

```bash
# Start backend
php artisan serve

# Start frontend (Vite)
npm run dev

# Watch mode
npm run dev -- --watch
```

### Database:

```bash
# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Fresh migrate with seed
php artisan migrate:fresh --seed
```

### Build:

```bash
# Build for production
npm run build

# Preview production build
npm run preview
```

### Clear Cache:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

---

## 🐛 Troubleshooting

### "Vite manifest not found"

```bash
npm run dev
```

Đảm bảo Vite dev server đang chạy!

### "Module not found: @/..."

Restart Vite dev server:

```bash
# Ctrl+C
npm run dev
```

### Cache issues

```bash
php artisan config:clear
php artisan cache:clear
rm -rf node_modules/.vite
npm run dev
```

---

## 📞 Support

Nếu gặp vấn đề:

1. Đọc [START.md](./START.md) - Troubleshooting section
2. Check console browser (F12)
3. Check terminal logs
4. Clear all cache và restart

---

## 📝 Notes

-   Import aliases `@/` trỏ đến `resources/js/`
-   Tất cả pages phải có layout (Next.js style)
-   Shared data (auth) available trong tất cả pages
-   HMR tự động reload khi sửa code

---

## ✨ Features Ready to Use

-   ✅ Button component (variants: primary, secondary, danger, success, outline)
-   ✅ Card component (hoverable, with title)
-   ✅ PublicLayout (header, footer, navigation)
-   ✅ Home page (hero, grid, features)
-   ✅ useAuth hook (user, isAuthenticated, isGuest)
-   ✅ Formatters (currency, date, number, text)

---

**Created by:** Antigravity AI  
**Date:** 2026-01-14  
**Status:** ✅ Production Ready

**Happy Coding! 🚀**
