<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #07286b;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
        }

        .tabel-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #0a1d66;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #eaf4fc;
        }

        .tombol {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .tombol:hover {
            background-color: #2980b9;
        }

        .kosong {
            text-align: center;
            color: #777;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Mahasiswa</h2>

    <a href="form.php" class="tombol">+ Tambah Mahasiswa</a>

    <div class="tabel-wrapper">
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Handphone</th>
                    <th>Program Studi</th>
                    <th>Angkatan</th>
                    <th>IPK</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($query) > 0): ?>
                    <?php while ($data = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= htmlspecialchars($data['nim']) ?></td>
                            <td><?= htmlspecialchars($data['nama']) ?></td>
                            <td><?= htmlspecialchars($data['email']) ?></td>
                            <td><?= htmlspecialchars($data['no_hp']) ?></td>
                            <td><?= htmlspecialchars($data['prodi']) ?></td>
                            <td><?= htmlspecialchars($data['angkatan']) ?></td>
                            <td><?= htmlspecialchars($data['ipk']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="kosong">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>