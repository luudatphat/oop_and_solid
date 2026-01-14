# Pages

Thư mục này chứa các page components (tương tự như pages trong Next.js).

## Quy tắc:

-   Mỗi file trong thư mục này tương ứng với một route trong Laravel
-   Đặt tên file theo PascalCase (VD: `Home.jsx`, `About.jsx`, `UserProfile.jsx`)
-   Page components nhận props từ Laravel controller thông qua Inertia.js
-   Mỗi page nên được wrap trong một Layout component

## Cấu trúc đề xuất:

```
Pages/
  ├── Home.jsx              # Trang chủ
  ├── About.jsx             # Trang giới thiệu
  ├── Contact.jsx           # Trang liên hệ
  ├── Auth/
  │   ├── Login.jsx         # Trang đăng nhập
  │   ├── Register.jsx      # Trang đăng ký
  │   └── ForgotPassword.jsx
  ├── Dashboard/
  │   ├── Index.jsx         # Dashboard chính
  │   └── Profile.jsx       # Trang profile
  └── Comics/               # Ví dụ cho project của bạn
      ├── Index.jsx         # Danh sách comics
      ├── Show.jsx          # Chi tiết comic
      └── Create.jsx        # Tạo comic mới
```

## Ví dụ Page Component:

```jsx
import PublicLayout from "@/Layouts/Public/PublicLayout";
import { Head } from "@inertiajs/react";

const Home = ({ comics }) => {
    return (
        <>
            <Head title="Trang chủ" />
            <div>
                <h1>Danh sách Comics</h1>
                {/* Your content */}
            </div>
        </>
    );
};

Home.layout = (page) => <PublicLayout>{page}</PublicLayout>;

export default Home;
```

## Kết nối với Laravel Route:

```php
// routes/web.php
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'comics' => Comic::all()
    ]);
});
```
