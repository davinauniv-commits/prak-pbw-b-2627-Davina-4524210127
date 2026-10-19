<?php

// Memanggil koneksi database
require_once __DIR__ . '/koneksi.php';

// Memanggil controller
require_once __DIR__ . '/controllers/ProdukController.php';

// Membuat objek controller
$controller = new ProdukController($koneksi);

// Menentukan proses yang dijalankan
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store();
        } else {
            header("Location: index.php");
            exit;
        }
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update();
        } else {
            header("Location: index.php");
            exit;
        }
        break;

    case 'index':
    default:
        $controller->index();
        break;
}

?>
