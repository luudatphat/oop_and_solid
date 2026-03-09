# Components

Thư mục này chứa các React components có thể tái sử dụng.

## Cấu trúc:

### `/Common`

-   Components dùng chung trong toàn bộ ứng dụng
-   Ví dụ: Header, Footer, Navbar, Sidebar, Breadcrumb

### `/Forms`

-   Components liên quan đến form
-   Ví dụ: Input, Select, Checkbox, TextArea, FormGroup

### `/UI`

-   UI components cơ bản
-   Ví dụ: Button, Card, Modal, Alert, Badge, Spinner

## Quy tắc:

-   Mỗi component nên có file riêng
-   Đặt tên file theo PascalCase (VD: `Button.jsx`, `InputField.jsx`)
-   Component nên nhỏ, tập trung vào một nhiệm vụ duy nhất
-   Tránh logic phức tạp trong component, chuyển sang Hooks hoặc Utils
