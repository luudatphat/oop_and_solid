# Layouts

Thư mục này chứa các layout components (tương tự như layout trong Next.js).

## Cấu trúc:

### `/Public`

-   Layout cho trang public (không cần đăng nhập)
-   Ví dụ: Homepage, About, Contact

### `/Dashboard`

-   Layout cho trang dashboard/admin
-   Có sidebar, header riêng cho admin

### `/Auth`

-   Layout cho trang authentication
-   Ví dụ: Login, Register, Forgot Password

## Quy tắc:

-   Layout component nhận `children` prop
-   Mỗi layout nên có cấu trúc rõ ràng: Header, Main Content, Footer
-   Sử dụng layout thông qua Inertia.js persistent layouts
-   Đặt tên file theo PascalCase (VD: `PublicLayout.jsx`, `DashboardLayout.jsx`)

## Ví dụ sử dụng:

```jsx
// In your Page component
import PublicLayout from "@/Layouts/Public/PublicLayout";

const HomePage = () => {
    return (
        <div>
            <h1>Welcome</h1>
        </div>
    );
};

HomePage.layout = (page) => <PublicLayout>{page}</PublicLayout>;

export default HomePage;
```
