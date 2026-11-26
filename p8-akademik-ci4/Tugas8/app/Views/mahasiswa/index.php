<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <a href="/mahasiswa/tambah">Tambah Mahasiswa</a>
    <br><br>

    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>IPK</th>
            <th>Email</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?= esc($mhs['nim']); ?></td>
            <td><?= esc($mhs['nama']); ?></td>
            <td><?= esc($mhs['prodi']); ?></td>
            <td><?= esc($mhs['ipk']); ?></td>
            <td><?= esc($mhs['email']) ?></td>
            <td><?= esc($mhs['angkatan']) ?></td>
            <td>
                <a href="<?= site_url('mahasiswa/edit/' . $mhs['id']) ?>">Edit</a>
                <a href="<?= site_url('mahasiswa/hapus/' . $mhs['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
        </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>
