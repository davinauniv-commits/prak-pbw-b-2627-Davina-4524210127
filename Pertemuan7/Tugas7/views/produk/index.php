<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 35px;
            background: #f4f7fb;
        }
        h2 { color: #1e0381; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th { background: #810355; color: white; }
        .tombol {
            display: inline-block;
            padding: 8px 12px;
            background: #c41369;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .pesan {
            padding: 12px;
            background: #d8f3dc;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<h2>Program Penjualan Produk</h2>
<p>Daftar produk yang tersimpan di database.</p>

<a class="tombol" href="index.php?action=create">
    + Tambah Produk
</a>

<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] === 'tambah'): ?>
        <div class="pesan">Produk berhasil ditambahkan.</div>
    <?php elseif ($_GET['status'] === 'edit'): ?>
        <div class="pesan">Produk berhasil diperbarui.</div>
    <?php endif; ?>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($dataProduk && mysqli_num_rows($dataProduk) > 0): ?>
            <?php $no = 1; ?>
            <?php while ($produk = mysqli_fetch_assoc($dataProduk)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?= htmlspecialchars($produk['nama_produk']); ?>
                    </td>
                    <td>
                        Rp <?= number_format((float)$produk['harga'], 0, ',', '.'); ?>
                    </td>
                    <td><?= (int)$produk['stok']; ?></td>
                    <td>
                        <a class="tombol"
                           href="index.php?action=edit&id=<?= (int)$produk['id_produk']; ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Belum ada data produk.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
