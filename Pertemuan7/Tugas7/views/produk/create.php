<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 35px;
        }
        form {
            max-width: 450px;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
        label { display: block; margin-top: 15px; }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            box-sizing: border-box;
        }
        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background: #810355;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Tambah Produk</h2>

<?php if (isset($_GET['error'])): ?>
    <p style="color:red">
        Data tidak valid. Periksa kembali nama, harga, dan stok.
    </p>
<?php endif; ?>

<form action="index.php?action=store" method="POST">
    <label for="nama_produk">Nama Produk</label>
    <input type="text" id="nama_produk" name="nama_produk"
           maxlength="100" required>

    <label for="harga">Harga (Rp)</label>
    <input type="number" id="harga" name="harga"
           min="0" step="0.01" required>

    <label for="stok">Stok</label>
    <input type="number" id="stok" name="stok"
           min="0" step="1" required>

    <button type="submit">Simpan Produk</button>
    <a class="kembali" href="index.php">Kembali</a>
</form>

</body>
</html>
