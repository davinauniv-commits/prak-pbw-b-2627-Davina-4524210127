<?php

require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new ProdukModel($koneksi);
    }

    // Menampilkan daftar produk
    public function index() {
        $dataProduk = $this->model->getAllProduk();

        require __DIR__ . '/../Views/produk/index.php';
    }

    // Menampilkan form tambah produk
    public function create() {
        require __DIR__ . '/../Views/produk/create.php';
    }

    // Memproses penyimpanan produk baru
    public function store() {
        $nama = trim($_POST['nama_produk'] ?? '');
        $hargaInput = $_POST['harga'] ?? '';
        $stokInput = $_POST['stok'] ?? '';

        if (
            $nama === '' ||
            !is_numeric($hargaInput) ||
            !is_numeric($stokInput) ||
            (float)$hargaInput < 0 ||
            (int)$stokInput < 0 ||
            (string)(int)$stokInput !== (string)$stokInput
        ) {
            header("Location: index.php?action=create&error=1");
            exit;
        }

        $harga = (float)$hargaInput;
        $stok = (int)$stokInput;

        if ($this->model->tambahProduk($nama, $harga, $stok)) {
            header("Location: index.php?status=tambah");
            exit;
        }

        die("Gagal menambahkan produk.");
    }

    // Menampilkan form edit produk
    public function edit() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            header("Location: index.php");
            exit;
        }

        $produk = $this->model->getProdukById($id);

        if (!$produk) {
            header("Location: index.php");
            exit;
        }

        require __DIR__ . '/../Views/produk/edit.php';
    }

    // Memproses perubahan data produk
    public function update() {
        $id = filter_input(INPUT_POST, 'id_produk', FILTER_VALIDATE_INT);
        $nama = trim($_POST['nama_produk'] ?? '');
        $hargaInput = $_POST['harga'] ?? '';
        $stokInput = $_POST['stok'] ?? '';

        if (
            !$id || $id < 1 ||
            $nama === '' ||
            !is_numeric($hargaInput) ||
            !is_numeric($stokInput) ||
            (float)$hargaInput < 0 ||
            (int)$stokInput < 0 ||
            (string)(int)$stokInput !== (string)$stokInput
        ) {
            header("Location: index.php");
            exit;
        }

        $harga = (float)$hargaInput;
        $stok = (int)$stokInput;

        if ($this->model->updateProduk($id, $nama, $harga, $stok)) {
            header("Location: index.php?status=edit");
            exit;
        }

        die("Gagal memperbarui produk.");
    }
}
?>
