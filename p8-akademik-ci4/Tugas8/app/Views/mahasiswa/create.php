<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>

    <h2>Tambah Data Mahasiswa</h2>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('mahasiswa/simpan') ?>" method="post">
        <?= csrf_field() ?>

        <table cellpadding="5">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?= old('nim') ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= old('nama') ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?= old('email') ?>"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><input type="text" name="no_hp" value="<?= old('no_hp') ?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><input type="text" name="prodi" value="<?= old('prodi') ?>"></td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td><input type="number" name="angkatan" value="<?= old('angkatan') ?>"></td>
            </tr>
            <tr>
                <td>IPK</td>
                <td><input type="number" name="ipk" step="0.01" min="0" max="4" value="<?= old('ipk') ?>"></td>
            </tr>
            <tr>
                <td>Status Mahasiswa</td>
                <td>
                    <select name="status_mahasiswa">
                        <option value="Aktif">Aktif</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Lulus">Lulus</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Simpan</button>
                    <a href="<?= site_url('mahasiswa') ?>">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
