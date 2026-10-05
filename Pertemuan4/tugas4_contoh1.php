<?php
require_once 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');

$sqlInsert = "INSERT IGNORE INTO mahasiswa 
(nim, nama, email, no_hp, prodi, angkatan, ipk, status_mahasiswa) VALUES
('2026001', 'Andi Pratama', 'andi@kampus.ac.id', '081234567801', 'Teknik Informatika', 2026, 3.75, 'Aktif'),
('2026002', 'Siti Rahma', 'siti@kampus.ac.id', '081234567802', 'Sistem Informasi', 2026, 3.82, 'Aktif'),
('2026003', 'Budi Santoso', 'budi@kampus.ac.id', '081234567803', 'Teknik Informatika', 2026, 3.20, 'Cuti')";

if (mysqli_query($koneksi, $sqlInsert)) {
    echo "[INSERT] Data mahasiswa berhasil dimasukkan ke tabel. \n\n";
} else {
    echo "[ERROR] Gagal memasukkan data: " . mysqli_error($koneksi) . "\n\n";
}

$sqlSelect = "SELECT nim, nama, prodi, ipk, status_mahasiswa
              FROM mahasiswa
              WHERE ipk >= 3.50
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";

$result = mysqli_query($koneksi, $sqlSelect);

echo "--- HASIL QUERY SELECT ---\n";
// Cek apakah ada data yang memenuhi kriteria (IPK >= 3.50)
if (mysqli_num_rows($result) > 0) {
    // Karena menggunakan LIMIT 1, loop ini hanya akan berjalan 1 kali (menampilkan Siti Rahma)
    while ($row = mysqli_fetch_assoc($result)) {
    echo "NIM    : " . $row['nim'] . "\n";
    echo "Nama   : " . $row['nama'] . "\n";
    echo "Prodi  : " . $row['prodi'] . "\n";
    echo "IPK    : " . $row['ipk'] . "\n";
    echo "Status : " . $row['status_mahasiswa'] . "\n";
    echo "-------------------------\n";
    }
} else {
    echo "Tidak ada data mahasiswa dengan kriteria tersebut.\n";
}

mysqli_close($koneksi);