# 📂 Cấu Trúc Thư Mục Resources/JS - Next.js Style

## ✅ Đã Tạo Thành Công!

```
resources/js/
│
├── 📄 README.md                    # Hướng dẫn tổng quan
├── 📄 app.js                       # Entry point (cần update thành app.jsx)
├── 📄 bootstrap.js                 # Bootstrap configuration
│
├── 📁 Components/                  # ⭐ Reusable Components
│   ├── 📄 README.md               # Hướng dẫn sử dụng Components
│   ├── 📁 Common/                 # Header, Footer, Navbar, Sidebar
│   ├── 📁 Forms/                  # Input, Select, Checkbox, TextArea
│   └── 📁 UI/                     # Button, Card, Modal, Alert, Badge
│
├── 📁 Layouts/                     # ⭐ Layout Components (Next.js style)
│   ├── 📄 README.md               # Hướng dẫn sử dụng Layouts
│   ├── 📁 Public/                 # Layout cho trang public
│   ├── 📁 Dashboard/              # Layout cho dashboard/admin
│   └── 📁 Auth/                   # Layout cho authentication
│
├── 📁 Pages/                       # ⭐ Page Components (Inertia.js)
│   └── 📄 README.md               # Hướng dẫn sử dụng Pages
│
├── 📁 Hooks/                       # ⭐ Custom React Hooks
│   └── 📄 README.md               # Hướng dẫn tạo Custom Hooks
│
├── 📁 Utils/                       # ⭐ Utility Functions
│   └── 📄 README.md               # Hướng dẫn sử dụng Utils
│
├── 📁 Contexts/                    # ⭐ React Context (Global State)
│   └── 📄 README.md               # Hướng dẫn sử dụng Contexts
│
└── 📁 Services/                    # ⭐ API Services
    └── 📄 README.md               # Hướng dẫn tạo Services
```

## 🎯 Mục Đích Từng Thư Mục

| Thư mục         | Mục đích               | Ví dụ                                     |
| --------------- | ---------------------- | ----------------------------------------- |
| **Components/** | Components tái sử dụng | `Button.jsx`, `Card.jsx`, `Navbar.jsx`    |
| **Layouts/**    | Layout wrappers        | `PublicLayout.jsx`, `DashboardLayout.jsx` |
| **Pages/**      | Inertia.js pages       | `Home.jsx`, `Comics/Index.jsx`            |
| **Hooks/**      | Custom React hooks     | `useAuth.js`, `useForm.js`                |
| **Utils/**      | Helper functions       | `formatters.js`, `validators.js`          |
| **Contexts/**   | Global state           | `ThemeContext.jsx`, `LanguageContext.jsx` |
| **Services/**   | API calls              | `comicService.js`, `authService.js`       |

## 📋 Checklist - Các Bước Tiếp Theo

### Bước 1: Setup Dependencies ⏳

-   [ ] Cài đặt Inertia.js server-side
-   [ ] Cài đặt Inertia.js client-side (React adapter)
-   [ ] Cài đặt React và ReactDOM
-   [ ] Cài đặt Vite hoặc Laravel Mix
-   [ ] Cài đặt Tailwind CSS (optional)

### Bước 2: Configuration ⏳

-   [ ] Cấu hình Vite cho React
-   [ ] Setup import aliases (`@/`)
-   [ ] Cấu hình Inertia middleware
-   [ ] Tạo root Blade template

### Bước 3: Create Base Files ⏳

-   [ ] Tạo `app.jsx` (entry point)
-   [ ] Tạo layout đầu tiên (PublicLayout)
-   [ ] Tạo page đầu tiên (Home)
-   [ ] Test routing

### Bước 4: Development 🚀

-   [ ] Bắt đầu code features!

## 🔗 Quick Links

-   [Components Guide](./Components/README.md)
-   [Layouts Guide](./Layouts/README.md)
-   [Pages Guide](./Pages/README.md)
-   [Hooks Guide](./Hooks/README.md)
-   [Utils Guide](./Utils/README.md)
-   [Contexts Guide](./Contexts/README.md)
-   [Services Guide](./Services/README.md)

## 💡 Tips

1. **Luôn đọc README** trong mỗi thư mục trước khi bắt đầu
2. **Sử dụng import aliases** `@/` thay vì relative paths
3. **Giữ components nhỏ** và focused
4. **Tách logic** ra khỏi components (dùng Hooks và Utils)
5. **Reuse, reuse, reuse!**

## 🎨 Naming Conventions

-   **Components**: `PascalCase.jsx` → `Button.jsx`, `UserCard.jsx`
-   **Pages**: `PascalCase.jsx` → `Home.jsx`, `About.jsx`
-   **Layouts**: `PascalCase.jsx` → `PublicLayout.jsx`
-   **Hooks**: `camelCase.js` → `useAuth.js`, `useForm.js`
-   **Utils**: `camelCase.js` → `formatters.js`, `validators.js`
-   **Services**: `camelCase.js` → `comicService.js`, `authService.js`
-   **Contexts**: `PascalCase.jsx` → `ThemeContext.jsx`

---

**Tạo bởi**: Antigravity AI  
**Ngày tạo**: 2026-01-14  
**Mục đích**: Next.js-style structure cho Laravel + Inertia.js + React
