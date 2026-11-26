<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>
<body>

    <h2>Edit Data Mahasiswa</h2>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="post">
        <?= csrf_field() ?>

        <table cellpadding="5">
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"
                    value="<?= old('nim', $mahasiswa['nim']) ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"
                    value="<?= old('nama', $mahasiswa['nama']) ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"
                    value="<?= old('email', $mahasiswa['email']) ?>"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><input type="text" name="no_hp"
                    value="<?= old('no_hp', $mahasiswa['no_hp']) ?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><input type="text" name="prodi"
                    value="<?= old('prodi', $mahasiswa['prodi']) ?>"></td>
            </tr>
            <tr>
                <td>Angkatan</td>
                <td><input type="number" name="angkatan"
                    value="<?= old('angkatan', $mahasiswa['angkatan']) ?>"></td>
            </tr>
            <tr>
                <td>IPK</td>
                <td><input type="number" name="ipk" step="0.01" min="0" max="4"
                    value="<?= old('ipk', $mahasiswa['ipk']) ?>"></td>
            </tr>
            <tr>
                <td>Status Mahasiswa</td>
                <td>
                    <?php $status = old('status_mahasiswa', $mahasiswa['status_mahasiswa']); ?>
                    <select name="status_mahasiswa">
                        <option value="Aktif" <?= $status == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Cuti" <?= $status == 'Cuti' ? 'selected' : '' ?>>Cuti</option>
                        <option value="Lulus" <?= $status == 'Lulus' ? 'selected' : '' ?>>Lulus</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                    <a href="<?= site_url('mahasiswa') ?>">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
