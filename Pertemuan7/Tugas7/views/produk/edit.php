<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk</title>
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

<h2>Edit Produk</h2>

<form action="index.php?action=update" method="POST">

    <input type="hidden" name="id_produk"
           value="<?= (int)$produk['id_produk']; ?>">

    <label for="nama_produk">Nama Produk</label>
    <input type="text" id="nama_produk" name="nama_produk"
           maxlength="100"
           value="<?= htmlspecialchars($produk['nama_produk']); ?>"
           required>

    <label for="harga">Harga (Rp)</label>
    <input type="number" id="harga" name="harga"
           min="0" step="0.01"
           value="<?= htmlspecialchars((string)$produk['harga']); ?>"
           required>

    <label for="stok">Stok</label>
    <input type="number" id="stok" name="stok"
           min="0" step="1"
           value="<?= (int)$produk['stok']; ?>"
           required>

    <button type="submit">Simpan Perubahan</button>
    <a class="kembali" href="index.php">Kembali</a>

</form>

</body>
</html>
