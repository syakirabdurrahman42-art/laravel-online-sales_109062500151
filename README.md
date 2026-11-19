# Laravel Online Sales

Aplikasi penjualan online berbasis Laravel dengan dua peran: **Admin** dan **Pelanggan**.
Dikembangkan bertahap per milestone (M0 sampai M8) dengan Git branch, commit, merge, dan tag.

- Nama: [Ahmad Syakir Abdurrahman]
- NIM: [109062500151]

## Fitur

- Registrasi, login, logout, dan pembagian role (admin / customer)
- Admin: kategori, produk (upload gambar), barang masuk (stok), ekspedisi, transaksi
- Pelanggan: katalog dengan filter dan pagination, detail produk, keranjang (session), checkout, riwayat pesanan
- Checkout memakai DB transaction dan `lockForUpdate()`, stok berkurang aman dan tercatat di `stock_movements`
- Admin dapat validasi, mengubah status, dan membatalkan order (stok dikembalikan otomatis)

## Kebutuhan

- PHP dan Composer
- MySQL (XAMPP)
- Git

## Instalasi

```bash
git clone https://github.com/syakirabdurrahman42-art/laravel-online-sales_109062500151.git
cd laravel-online-sales_109062500151
composer install
cp .env.example .env
php artisan key:generate
```

Buat database kosong `laravel_online_sales` di phpMyAdmin, lalu atur `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_online_sales
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi, seeder, dan link storage:

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

Buka `http://127.0.0.1:8000`.

Catatan: CSS ada di `public/css/store.css`. Foto produk tersimpan di `storage/app/public/products` dan tidak ikut di repository, jadi unggah ulang lewat menu admin Produk.

## Akun bawaan

| Peran | Email | Password |
|---|---|---|
| Admin | admin@example.com | Admin12345! |
| Pelanggan | daftar lewat halaman /register | - |

## Panduan pengujian

1. Daftar sebagai pelanggan. Cek role = customer dan langsung login.
2. Sebagai pelanggan, buka `/admin`. Hasil: 403.
3. Login admin. Tambah kategori dan produk (dengan gambar).
4. Catat barang masuk 10 unit. Stok +10 dan movement IN tercatat.
5. Di katalog, uji cari, kategori, rentang harga, stok tersedia, dan urutan.
6. Tambah ke keranjang melebihi stok. Hasil: ditolak.
7. Checkout 2 unit. Order pending dibuat, stok -2, movement OUT tercatat.
8. Admin validasi order (confirmed), lalu ubah berurutan processed, shipped, completed.
9. Buat order lain lalu batalkan dari status pending. Stok kembali dan movement IN (`CANCEL-kode`) tercatat.
10. Coba batalkan order completed atau ubah status di luar urutan. Hasil: ditolak.

## Pemeriksaan

```bash
php artisan route:list
php artisan migrate:status
php artisan model:show Product
php artisan model:show Order
php artisan about
```

## Riwayat milestone (tag Git)

| Milestone | Tag |
|---|---|
| M0 Setup | m0-setup |
| M1 Auth dan role | m1-auth-role |
| M2 Kategori dan produk | m2-master-product |
| M3 Stok dan ekspedisi | m3-inventory-shipping |
| M4 Katalog | m4-storefront |
| M5 Keranjang | m5-cart |
| M6 Checkout | m6-checkout |
| M7 Admin transaksi | m7-order-admin |
| M8 QA dan dokumentasi | m8-final |