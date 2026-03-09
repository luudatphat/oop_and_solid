# Contexts

Thư mục này chứa các React Context cho state management toàn cục.

## Mục đích:

-   Quản lý global state (theme, language, user preferences)
-   Tránh prop drilling
-   Chia sẻ data giữa nhiều components

## Quy tắc:

-   Đặt tên file theo PascalCase kết thúc bằng `Context` (VD: `ThemeContext.jsx`)
-   Mỗi Context nên có Provider component riêng
-   Export cả Context và Provider
-   Nên tạo custom hook để sử dụng Context dễ dàng hơn

## Ví dụ Contexts phổ biến:

-   `ThemeContext.jsx` - Dark/Light mode
-   `LanguageContext.jsx` - Đa ngôn ngữ (i18n)
-   `NotificationContext.jsx` - Toast notifications
-   `ModalContext.jsx` - Global modal management

## Ví dụ:

```jsx
// ThemeContext.jsx
import { createContext, useContext, useState } from "react";

const ThemeContext = createContext();

export const ThemeProvider = ({ children }) => {
    const [theme, setTheme] = useState("light");

    const toggleTheme = () => {
        setTheme((prev) => (prev === "light" ? "dark" : "light"));
    };

    return (
        <ThemeContext.Provider value={{ theme, toggleTheme }}>
            {children}
        </ThemeContext.Provider>
    );
};

// Custom hook để sử dụng dễ dàng
export const useTheme = () => {
    const context = useContext(ThemeContext);
    if (!context) {
        throw new Error("useTheme must be used within ThemeProvider");
    }
    return context;
};
```

## Sử dụng:

```jsx
// app.jsx
import { ThemeProvider } from "@/Contexts/ThemeContext";

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob("./Pages/**/*.jsx")),
    setup({ el, App, props }) {
        return createRoot(el).render(
            <ThemeProvider>
                <App {...props} />
            </ThemeProvider>
        );
    },
});

// In component
import { useTheme } from "@/Contexts/ThemeContext";

const MyComponent = () => {
    const { theme, toggleTheme } = useTheme();

    return <button onClick={toggleTheme}>Current theme: {theme}</button>;
};
```
