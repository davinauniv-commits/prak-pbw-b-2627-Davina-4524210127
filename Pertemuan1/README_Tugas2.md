# LAPORAN PRAKTIKUM 2
## PEMROGRAMAN BERBASIS WEB

**Disusun Oleh:**  
Davina Arthamevia Azahra  
4524210127

---

# HASIL MODIFIKASI

## 1. Menambahkan Prodi dan Email

Pada program ini saya memodifikasi dengan menambahkan data mahasiswa berupa prodi dan email agar data menjadi lebih lengkap.

![Menambahkan Prodi dan Email](screenshot2/modif1.png)

---

## 2. Menambahkan Kondisi Status Akademik

Pada program ini saya memodifikasi dengan menambahkan status akademik yang dilihat dari nilai IPK.

![Menambahkan Kondisi Status Akademik](screenshot2/modif2.png)

---

## 3. Menambahkan Styling

Agar tampilan program menarik saya memodifikasinya dengan menambahkan CSS sehingga output yang keluar lebih menarik.

![Menambahkan Styling](screenshot2/modif3.png)

---

# 5 BAGIAN PENTING

## 1. Interface Identitas

Interface termasuk dalam kode penting karena digunakan untuk menentukan method yang harus dimiliki oleh class yang mengimplementasikannya. Dalam program ini, class Mahasiswa mengimplementasikan interface Identitas, sehingga harus memiliki method `ringkasan()`.

![Interface Identitas](screenshot2/penting1.png)

---

## 2. Class Mahasiswa

Class Mahasiswa merupakan kode penting karena kode ini berperan dalam membuat objek mahasiswa. Class ini menyimpan data mahasiswa seperti NIM, nama, prodi, email, dan IPK. `implements Identitas` menunjukkan bahwa class ini menggunakan interface Identitas.

![Class Mahasiswa](screenshot2/penting2.png)

---

## 3. Constructor

Constructor merupakan kode penting karena berfungsi untuk memberikan nilai awal ketika objek Mahasiswa dibuat. Data NIM, nama, prodi, email, dan IPK langsung dimasukkan ketika objek dibuat.

![Constructor](screenshot2/penting3.png)

---

## 4. Validasi IPK

Kode ini penting karena digunakan untuk memastikan nilai IPK berada pada rentang 0 sampai 4. Jika pengguna memberikan IPK di luar rentang tersebut, program akan menghasilkan exception berupa pesan bahwa IPK harus 0 sampai 4.

![Validasi IPK](screenshot2/penting4.png)

---

## 5. Kondisi Status Akademik

Kode ini merupakan hasil modifikasi yang juga berperan penting untuk menampilkan status akademik dari mahasiswa. Program menggunakan kondisi if-elseif-else untuk menentukan status akademik berdasarkan IPK mahasiswa.

![Kondisi Status Akademik](screenshot2/penting5.png)

---

# ERROR YANG SEMPAT MUNCUL

Pada saat saya membuat IPK menjadi 5.00 output program setelah dijalankan menjadi eror.

![Error yang Sempat Muncul](screenshot2/error.png)

Hal tersebut terjadi karena nilai IPK yang diberikan tidak sesuai dengan kondisi validasi pada method `setIPK()`. Program memiliki kondisi `if ($ipk < 0 || $ipk > 4)` yang akan menghasilkan `InvalidArgumentException` apabila nilai IPK kurang dari 0 atau lebih dari 4.

Perbaikan dilakukan dengan mengganti nilai IPK yang salah menjadi nilai yang berada dalam rentang 0 sampai 4.

---

# HASIL SEBELUM MODIFIKASI

![Hasil Sebelum Modifikasi](screenshot2/sebelum.png)

---

# HASIL SESUDAH MODIFIKASI

![Hasil Sesudah Modifikasi](screenshot2/sesudah.png)