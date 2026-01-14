# Services

Thư mục này chứa các service classes/functions để tương tác với API và business logic.

## Mục đích:

-   Tách biệt logic gọi API ra khỏi components
-   Centralize API calls
-   Dễ dàng test và maintain
-   Reusable API methods

## Quy tắc:

-   Đặt tên file theo camelCase kết thúc bằng `Service` (VD: `comicService.js`)
-   Mỗi service tương ứng với một resource/entity
-   Sử dụng Inertia.js router hoặc axios để gọi API
-   Return promises

## Ví dụ Services:

-   `authService.js` - Authentication APIs
-   `comicService.js` - Comic CRUD operations
-   `userService.js` - User management
-   `uploadService.js` - File upload handling

## Ví dụ:

```javascript
// comicService.js
import { router } from "@inertiajs/react";
import axios from "axios";

export const comicService = {
    // Get all comics
    getAll: async (params = {}) => {
        try {
            const response = await axios.get("/api/comics", { params });
            return response.data;
        } catch (error) {
            console.error("Error fetching comics:", error);
            throw error;
        }
    },

    // Get single comic
    getById: async (id) => {
        try {
            const response = await axios.get(`/api/comics/${id}`);
            return response.data;
        } catch (error) {
            console.error("Error fetching comic:", error);
            throw error;
        }
    },

    // Create comic (using Inertia)
    create: (data) => {
        router.post("/comics", data, {
            onSuccess: () => {
                // Handle success
            },
            onError: (errors) => {
                // Handle errors
            },
        });
    },

    // Update comic
    update: (id, data) => {
        router.put(`/comics/${id}`, data);
    },

    // Delete comic
    delete: (id) => {
        router.delete(`/comics/${id}`);
    },
};
```

## Sử dụng:

```jsx
import { comicService } from "@/Services/comicService";
import { useState, useEffect } from "react";

const ComicList = () => {
    const [comics, setComics] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchComics = async () => {
            try {
                const data = await comicService.getAll();
                setComics(data);
            } catch (error) {
                console.error(error);
            } finally {
                setLoading(false);
            }
        };

        fetchComics();
    }, []);

    const handleDelete = (id) => {
        if (confirm("Are you sure?")) {
            comicService.delete(id);
        }
    };

    return (
        <div>
            {loading
                ? "Loading..."
                : comics.map((comic) => (
                      <div key={comic.id}>
                          <h3>{comic.title}</h3>
                          <button onClick={() => handleDelete(comic.id)}>
                              Delete
                          </button>
                      </div>
                  ))}
        </div>
    );
};
```
