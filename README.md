# :books: Simple Library API

Simple RESTful API untuk manajemen buku, dibangun dengan **Laravel 12** dan **MySQL**.

---

## :rocket: Setup Project

1. Clone repository:
   ```bash
   git clone https://github.com/saulsanto22/simple_library_books.git
   cd simple_library_books
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   ```
   Edit `.env` sesuai konfigurasi database MySQL lokal.

4. Generate key:
   ```bash
   php artisan key:generate
   ```

5. Migrasi & seeder database:
   ```bash
   php artisan migrate --seed
   ```

6. Jalankan server:
   ```bash
   php artisan serve
   ```

---

## :link: API Endpoints

| Method | Endpoint         | Deskripsi                       |
|--------|-----------------|---------------------------------|
| GET    | /api/books      | List buku (search + pagination) |
| GET    | /api/books/{id} | Detail buku berdasarkan ID       |
| POST   | /api/books      | Tambah buku baru                |
| PUT    | /api/books/{id} | Update buku                     |
| DELETE | /api/books/{id} | Hapus buku                      |

---

## :mag: Query Parameters

- `search` → Cari berdasarkan title atau author.  
- `page` → Nomor halaman untuk pagination.  

Contoh:
```
GET /api/books?search=Laravel&page=2
```

---

## :hammer_and_wrench: Contoh Request & Response

### ➕ Tambah Buku
**Request**
```http
POST /api/books
Content-Type: application/json

{
  "title": "Clean Code",
  "author": "Robert C.",
  "year": 2024
}
```

**Response**
```json
{
  "status": "success",
  "message": "Book created successfully",
  "data": {
    "id": 6,
    "title": "Clean Code",
    "author": "Robert C.",
    "year": 2024,
    "created_at": "2025-09-30 15:02:00",
    "updated_at": "2025-09-30 15:02:00"
  }
}
```

---

## :package: Postman Collection

File Postman Collection tersedia di repo:  
`Simple_Library_API.postman_collection.json`

Import ke Postman untuk langsung mencoba endpoint.

---

## :man_technologist: Author

- **Saul Santo Anju**  
- Laravel Backend Developer
