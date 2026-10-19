<?php

class ProdukModel {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    // Mengambil seluruh data produk
    public function getAllProduk() {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk ORDER BY id_produk DESC"
        );

        return $query;
    }

    // Mengambil satu produk berdasarkan ID
    public function getProdukById($id) {
        $stmt = mysqli_prepare(
            $this->koneksi,
            "SELECT * FROM produk WHERE id_produk = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $produk = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $produk;
    }

    // Menambahkan produk baru
    public function tambahProduk($nama, $harga, $stok) {
        $stmt = mysqli_prepare(
            $this->koneksi,
            "INSERT INTO produk (nama_produk, harga, stok)
             VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "sdi", $nama, $harga, $stok);
        $hasil = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $hasil;
    }

    // Memperbarui data produk
    public function updateProduk($id, $nama, $harga, $stok) {
        $stmt = mysqli_prepare(
            $this->koneksi,
            "UPDATE produk
             SET nama_produk = ?, harga = ?, stok = ?
             WHERE id_produk = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sdii",
            $nama,
            $harga,
            $stok,
            $id
        );

        $hasil = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $hasil;
    }
}
?>
