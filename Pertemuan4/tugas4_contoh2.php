<?php
require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');

// ==========================================
// 1. UPDATE: Mengubah data IPK dan Nomor HP
// ==========================================
echo "=== 1. PROSES UPDATE DATA ===\n";
$sqlUpdate = "UPDATE mahasiswa 
              SET ipk = 3.40, no_hp = '081234567899' 
              WHERE nim = '2026003'";

if (mysqli_query($koneksi, $sqlUpdate)) {
    echo "Data IPK mahasiswa dengan NIM 2026003 berhasil diubah menjadi 3.40.\n";
    echo "Nomor HP mahasiswa juga berhasil diperbarui.\n";
} else {
    echo "Gagal UPDATE : " . mysqli_error($koneksi) . "\n\n";
}

// ========================================================
// 2. SELECT & GROUP BY: Rekap jumlah mahasiswa per prodi
// ========================================================

echo "=== 2. REKAP MAHASISWA PER PRODI ===\n";
$sqlRekap = "SELECT prodi, COUNT(*) AS jumlah, ROUND(AVG(ipk),2) AS rata_ipk
FROM mahasiswa
GROUP BY prodi
ORDER BY jumlah DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if (mysqli_num_rows($resultRekap) > 0) {
    while ($row = mysqli_fetch_assoc($resultRekap)) {
        echo "Prodi        : " . $row['prodi'] . "\n";
        echo "Jumlah       : " . $row['jumlah'] . " Mahasiswa\n";
        echo "Rata-rata IPK : " . $row['rata_ipk'] . "\n";
        echo "----------------------------\n";
    }
} else {
    echo "Belum ada data rekap prodi.\n";
}


// ========================================
// 3. SELECT: Verifikasi sebelum penghapusan
// ========================================
echo "=== 3. VERIFIKASI DATA (NIM 2025003) ===\n";
$sqlVerifikasi = "SELECT * FROM mahasiswa WHERE nim = '2025003'";
$resultVerifikasi = mysqli_query($koneksi, $sqlVerifikasi);

// Cek apakah data yang mau dihapus benar-benar ada
if (mysqli_num_rows($resultVerifikasi) > 0) {
    $row = mysqli_fetch_assoc($resultVerifikasi);
    echo "Data Ditemukan!\n";
    echo "NIM   : " . $row['nim'] . "\n";
    echo "Nama  : " . $row['nama'] . "\n";
    echo "No HP : " . $row['no_hp'] . "\n";
    echo "IPK   : " . $row['ipk'] . "\n";

// ========================================
// 4. DELETE: Menghapus data
// ========================================
echo "=== 4. PROSES HAPUS DATA ===\n";
$sqlDelete = "DELETE FROM mahasiswa WHERE nim = '2026003'";

if (mysqli_query($koneksi, $sqlDelete)) {
    echo "[SUKSES] Data mahasiswa dengan NIM 2026003 berhasil dihapus dari database.\n";
} else {
    echo "[ERROR] Gagal menghapus data: " . mysqli_error($koneksi) . "\n";
}

} else {
    echo "Data mahasiswa dengan NIM 2026003 TIDAK DITEMUKAN (Mungkin sudah terhapus sebelumnya).\n";
}

mysqli_close($koneksi);
?>