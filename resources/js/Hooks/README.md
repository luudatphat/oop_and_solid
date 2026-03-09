# Hooks

Thư mục này chứa các Custom React Hooks.

## Mục đích:

-   Tái sử dụng logic giữa các components
-   Tách logic phức tạp ra khỏi components
-   Quản lý state, side effects một cách có tổ chức

## Quy tắc:

-   Đặt tên hook bắt đầu bằng `use` (VD: `useAuth.js`, `useForm.js`)
-   Mỗi hook nên tập trung vào một nhiệm vụ cụ thể
-   Export default hoặc named export đều được

## Ví dụ Hooks phổ biến:

-   `useAuth.js` - Quản lý authentication state
-   `useForm.js` - Xử lý form validation và submission
-   `useDebounce.js` - Debounce input
-   `useLocalStorage.js` - Tương tác với localStorage
-   `useApi.js` - Gọi API
-   `useModal.js` - Quản lý modal state

## Ví dụ Custom Hook:

```jsx
// useAuth.js
import { usePage } from "@inertiajs/react";

export const useAuth = () => {
    const { auth } = usePage().props;

    return {
        user: auth?.user || null,
        isAuthenticated: !!auth?.user,
        isGuest: !auth?.user,
    };
};
```

## Sử dụng:

```jsx
import { useAuth } from "@/Hooks/useAuth";

const MyComponent = () => {
    const { user, isAuthenticated } = useAuth();

    return <div>{isAuthenticated ? `Hello ${user.name}` : "Please login"}</div>;
};
```
