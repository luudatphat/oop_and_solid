# Resources/JS - Next.js Style Structure for Laravel + Inertia.js

Cấu trúc thư mục này được tổ chức theo phong cách Next.js để làm việc với Laravel và Inertia.js.

## 📁 Cấu trúc Thư Mục

```
resources/js/
├── Components/          # Reusable React components
│   ├── Common/         # Header, Footer, Navbar, Sidebar
│   ├── Forms/          # Input, Select, Checkbox, etc.
│   └── UI/             # Button, Card, Modal, Alert, etc.
│
├── Layouts/            # Layout components (Next.js style)
│   ├── Public/         # Public pages layout
│   ├── Dashboard/      # Dashboard/Admin layout
│   └── Auth/           # Authentication pages layout
│
├── Pages/              # Page components (Inertia.js pages)
│   ├── Home.jsx
│   ├── Auth/
│   ├── Dashboard/
│   └── Comics/
│
├── Hooks/              # Custom React Hooks
│   ├── useAuth.js
│   ├── useForm.js
│   └── useDebounce.js
│
├── Utils/              # Utility functions
│   ├── formatters.js
│   ├── validators.js
│   └── constants.js
│
├── Contexts/           # React Context for global state
│   ├── ThemeContext.jsx
│   └── LanguageContext.jsx
│
├── Services/           # API services
│   ├── comicService.js
│   ├── authService.js
│   └── userService.js
│
├── app.jsx             # Entry point
└── bootstrap.js        # Bootstrap file
```

## 🎯 Nguyên Tắc Chung

### 1. **Import Aliases**

Sử dụng `@/` để import từ thư mục `resources/js`:

```jsx
import Button from "@/Components/UI/Button";
import { useAuth } from "@/Hooks/useAuth";
import PublicLayout from "@/Layouts/Public/PublicLayout";
```

### 2. **Component Naming**

-   **PascalCase** cho components: `Button.jsx`, `UserCard.jsx`
-   **camelCase** cho utilities và services: `formatters.js`, `comicService.js`
-   **PascalCase** cho Contexts: `ThemeContext.jsx`

### 3. **File Extensions**

-   Sử dụng `.jsx` cho files có JSX
-   Sử dụng `.js` cho pure JavaScript (utils, services)

### 4. **Layout Pattern**

Sử dụng persistent layouts như Next.js:

```jsx
// In Page component
import PublicLayout from "@/Layouts/Public/PublicLayout";

const Home = () => {
    return <div>Content</div>;
};

Home.layout = (page) => <PublicLayout>{page}</PublicLayout>;

export default Home;
```

## 🚀 Workflow Làm Việc

### Khi tạo một trang mới:

1. Tạo Page component trong `Pages/`
2. Chọn hoặc tạo Layout phù hợp trong `Layouts/`
3. Tạo các components cần thiết trong `Components/`
4. Tạo service nếu cần gọi API trong `Services/`
5. Tạo custom hooks nếu có logic phức tạp trong `Hooks/`
6. Thêm route trong Laravel `routes/web.php`

### Ví dụ hoàn chỉnh:

**1. Tạo Service:**

```javascript
// Services/comicService.js
export const comicService = {
    getAll: async () => {
        const response = await axios.get("/api/comics");
        return response.data;
    },
};
```

**2. Tạo Component:**

```jsx
// Components/Comics/ComicCard.jsx
const ComicCard = ({ comic }) => {
    return (
        <div className="comic-card">
            <h3>{comic.title}</h3>
            <p>{comic.description}</p>
        </div>
    );
};

export default ComicCard;
```

**3. Tạo Page:**

```jsx
// Pages/Comics/Index.jsx
import PublicLayout from "@/Layouts/Public/PublicLayout";
import ComicCard from "@/Components/Comics/ComicCard";
import { Head } from "@inertiajs/react";

const ComicsIndex = ({ comics }) => {
    return (
        <>
            <Head title="Comics" />
            <div className="comics-grid">
                {comics.map((comic) => (
                    <ComicCard key={comic.id} comic={comic} />
                ))}
            </div>
        </>
    );
};

ComicsIndex.layout = (page) => <PublicLayout>{page}</PublicLayout>;

export default ComicsIndex;
```

**4. Laravel Route:**

```php
// routes/web.php
use Inertia\Inertia;

Route::get('/comics', function () {
    return Inertia::render('Comics/Index', [
        'comics' => Comic::all()
    ]);
});
```

## 📚 Tài Liệu Chi Tiết

Mỗi thư mục có file `README.md` riêng với hướng dẫn chi tiết:

-   [Components/README.md](./Components/README.md)
-   [Layouts/README.md](./Layouts/README.md)
-   [Pages/README.md](./Pages/README.md)
-   [Hooks/README.md](./Hooks/README.md)
-   [Utils/README.md](./Utils/README.md)
-   [Contexts/README.md](./Contexts/README.md)
-   [Services/README.md](./Services/README.md)

## 🔧 Next Steps

1. Cài đặt Inertia.js và React
2. Cấu hình Vite với React
3. Setup import aliases (`@/`)
4. Tạo layout đầu tiên
5. Tạo page đầu tiên
6. Bắt đầu code! 🎉
