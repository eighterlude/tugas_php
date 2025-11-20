## **Aplikasi CRUD Produk (PHP Native + PDO)**



Aplikasi ini merupakan sistem CRUD sederhana yang dibangun menggunakan PHP Native dan MySQL/MariaDB dengan koneksi PDO. Aplikasi ini menyediakan fitur untuk menambah, menampilkan, mengedit, dan menghapus data produk, serta mendukung upload gambar.



---



**1. Deskripsi Aplikasi**



Aplikasi ini dibuat untuk mengelola **data produk**. Setiap produk memiliki atribut tertentu seperti nama, kategori, harga, stok, status, dan gambar. Aplikasi ini berjalan menggunakan PHP Native tanpa framework dan menyimpan data ke dalam database MySQL/MariaDB.



Entitas Utama: Produk

Atribut:

* *name* : nama produk (teks)
* *category* : kategori produk (teks/pilihan)
* *price* : harga (numerik)
* *stock* : jumlah stok (numerik)
* *image\_path*: lokasi file gambar yang diunggah
* *status* : *active / inactive*



---



**2. Spesifikasi**



* Bahasa Pemrograman : PHP 8.x
* DBMS: MySQL/MariaDB (melalui XAMPP)
* Driver Database: PDO (PHP Data Objects)
* Server: PHP Built-in Server (`php -S`)
* Tampilan : HTML dasar tanpa framework front-end



A) **Struktur Folder Aplikasi**

&nbsp;	tugas-php/

&nbsp;		public/

&nbsp;			uploads/

&nbsp;			index.php

&nbsp;			create.php

&nbsp;			edit.php

&nbsp;			delete.php

&nbsp;		src/

&nbsp;			Database.php

&nbsp;			Product.php

&nbsp;			ProductRepo.php

&nbsp;		schema.sql

&nbsp;		README.md

&nbsp;	

B) **Penjelasan Class**

* Database.php: Mengatur koneksi database menggunakan PDO.
* Product.php: Representasi entitas Product dalam bentuk class.
* ProductRepo.php : Mengelola seluruh operasi CRUD (Create, Read, Update, Delete).



---



**3. Cara Menjalankan Aplikasi**



3.1 Import Database

&nbsp;	1. Buat database baru : (di MySQL/MariaDB)

&nbsp; 		 ```sql

&nbsp; 		 CREATE DATABASE tugas\_php;

&nbsp;	2. Import file **schema.sql** ke dalam database tersebut.



3.2 Konfigurasi Database

Pastikan file Database.php berisi konfigurasi berikut :

&nbsp;	private $host = 'localhost';

&nbsp;	private $db   = 'tugas\_php';

&nbsp;	private $user = 'root';

&nbsp;	private $pass = '';



3.3 Menjalankan Server

Masuk ke folder public melalui terminal :

&nbsp;	**cd C:\\xampp\\htdocs\\tugas\_php\\public**



Jalankan aplikasi :

	**php -S localhost:8000**



3.4 Akses Aplikasi

Buka browser :

	**http://localhost:8000**



**4. CONTOH SCENARIO UJI SINGKAT** 



1\. Tambah 1 Data

* Akses halaman create.php.
* Isi semua field produk : nama, kategori, harga, stok, status.
* Upload gambar produk.
* Klik tombol Save.
* Pastikan data yang baru ditambahkan muncul pada tabel di halaman utama (index.php).



2\. Tampilkan Daftar Data

* Buka halaman utama aplikasi (index.php).
* Pastikan seluruh data produk tampil dalam tabel beserta atributnya:

&nbsp;	- ID

&nbsp;	- Name

&nbsp;	- Category

&nbsp;	- Price

&nbsp;	- Stock

&nbsp;	- Status

&nbsp;	- Image

* Pastikan gambar tampil dengan benar di kolom *image*.



3\. Ubah Data Tertentu

* Pada halaman index.php, klik tombol Edit pada salah satu produk.
* Form edit menampilkan data lama (pre-filled).
* Ubah beberapa field (misal : harga atau kategori).
* Simpan perubahan.
* Pastikan data yang telah diubah tampil sesuai di tabel.



4\. Hapus Data

* Pada halaman index.php, klik tombol Delete pada salah satu produk.
* Sistem menghapus data dari database.
* Pastikan baris produk yang dihapus tidak muncul lagi pada tabel.
