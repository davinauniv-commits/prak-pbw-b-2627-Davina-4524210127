# LAPORAN PRAKTIKUM 3

## PEMROGRAMAN BERBASIS WEB

**Disusun Oleh:**  
Davina Arthamevia Azahra (4524210127)

---

# BAGIAN YANG MODIFIKASI

## 1. Menambahkan Nomor HP dan Menambahkan Status Mahasiswa

Pada program ini saya memodifikasi tabel mahasiswa dengan menambahkan data nomor HP dan status mahasiswa agar informasi mahasiswa menjadi lebih lengkap.

### Dokumentasi

![Menambahkan Nomor HP](screenshot/modif1.png)

---

## 2. Menambahkan Tabel Nilai

Pada program ini saya memodifikasi database dengan menambahkan tabel nilai yang digunakan untuk menyimpan nilai mahasiswa berdasarkan mata kuliah yang terdapat pada KRS.

### Dokumentasi

![Menambahkan Tabel Nilai](screenshot/modif2.png)

---

# 5 BAGIAN PENTING

## 1. Koneksi PHP

Koneksi PHP termasuk dalam kode penting karena digunakan untuk menghubungkan program PHP dengan database MySQL melalui file `koneksi.php`. Dengan adanya koneksi ini, program dapat menjalankan query dan mengakses database.

### Dokumentasi

![Koneksi PHP](screenshot/penting1.png)

---

## 2. Membuat Database

Kode ini penting karena digunakan untuk membuat database `akademik`. Program akan mengecek terlebih dahulu apakah database sudah tersedia atau belum sebelum membuatnya.

### Dokumentasi

![Membuat Database](screenshot/penting2.png)

---

## 3. Membuat Tabel

Kode ini penting karena digunakan untuk membuat tabel yang dibutuhkan dalam database akademik, seperti tabel `mahasiswa`, `dosen`, `mata_kuliah`, `krs`, `mk_krs`, dan `nilai`.

### Dokumentasi

![Membuat Tabel](screenshot/penting3.png)

---

## 4. Menggunakan Foreign Key

Kode ini penting karena digunakan untuk menghubungkan tabel yang saling berhubungan. Salah satunya adalah tabel `nilai` yang menggunakan `mk_krs_id` sebagai foreign key yang terhubung dengan tabel `mk_krs`.

### Dokumentasi

![Menggunakan Foreign Key](screenshot/penting4.png)

---

## 5. Menjalankan Query dengan Foreach

Kode ini penting karena digunakan untuk menjalankan seluruh query pembuatan tabel yang terdapat dalam `$sqlCreateTables`. Dengan menggunakan `foreach`, setiap query tabel dapat dijalankan secara berurutan.

### Dokumentasi

![Menjalankan Query dengan Foreach](screenshot/penting5.png)

---

# ERROR YANG SEMPAT MUNCUL

### Dokumentasi Error

![Error yang sempat muncul](screenshot/errorkode.png)

Hal tersebut terjadi karena terdapat kesalahan pada penulisan kode, saya sempat keliru dalam menyalin kode dari materi sehingga terjadi error pada saat dijalankan

![Error yang sempat muncul](screenshot/output_eror.png)

## Setelah Perbaikan

Saya memperbaiki kesalahan dalam penulisan kode, sehingga kode menjadi bisa dijalankan

![Hasil Setelah Perbaikan](screenshot/kode_benar.png)

![Hasil Setelah Perbaikan](screenshot/output_sebelum_modif.png)

# HASIL SEBELUM MODIFIKASI
![Hasil Sebelum Modifikasi](screenshot/output_sebelum_modif.png)

![Hasil Sebelum Modifikasi](screenshot/tabel_sebelum_modif.png)

# HASIL SESUDAH MODIFIKASI
![Hasil Sesudah Modifikasi](screenshot/output_sesudah_modif.png)

![Hasil Sesudah Modifikasi](screenshot/tabel_setelah_modif.png)
