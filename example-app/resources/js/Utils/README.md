# Utils

Thư mục này chứa các utility functions và helper functions.

## Mục đích:

-   Chứa các hàm tiện ích có thể tái sử dụng
-   Xử lý logic không liên quan đến UI
-   Format data, validation, calculations, etc.

## Quy tắc:

-   Đặt tên file theo camelCase hoặc kebab-case
-   Mỗi file nên chứa các functions liên quan đến nhau
-   Export named functions
-   Pure functions (không side effects) được ưu tiên

## Ví dụ Utils phổ biến:

-   `formatters.js` - Format date, currency, numbers
-   `validators.js` - Validation functions
-   `helpers.js` - General helper functions
-   `constants.js` - Application constants
-   `api.js` - API helper functions

## Ví dụ:

```javascript
// formatters.js
export const formatCurrency = (amount) => {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(amount);
};

export const formatDate = (date) => {
    return new Date(date).toLocaleDateString("vi-VN");
};

// validators.js
export const isValidEmail = (email) => {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
};

export const isValidPhone = (phone) => {
    const regex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
    return regex.test(phone);
};
```

## Sử dụng:

```jsx
import { formatCurrency, formatDate } from "@/Utils/formatters";
import { isValidEmail } from "@/Utils/validators";

const price = formatCurrency(100000); // "100.000 ₫"
const valid = isValidEmail("test@example.com"); // true
```
