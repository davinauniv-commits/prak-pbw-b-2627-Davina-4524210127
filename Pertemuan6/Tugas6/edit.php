
<?php
include "koneksi.php";

$nim = trim($_GET["nim"] ?? "");

if ($nim === "") {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    exit("Data mahasiswa tidak ditemukan. <a href='index.php'>Kembali</a>");
}

function e($value) {
    return htmlspecialchars((string)($value ?? ""), ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Data Mahasiswa</title>
</head>

<body class="min-h-screen bg-slate-100 p-4 md:p-8 text-slate-800">
<main class="mx-auto max-w-xl rounded-2xl bg-white p-6 shadow-lg md:p-8">

    <h1 class="mb-1 text-2xl font-bold">Edit Data Mahasiswa</h1>
    <p class="mb-6 text-sm text-slate-500">
        Perbarui informasi mahasiswa, lalu simpan perubahan.
    </p>

    <form action="update.php" method="POST" class="flex flex-col gap-2">

        <label for="nim" class="text-sm font-semibold">NIM</label>
        <input id="nim" name="nim" value="<?= e($data["nim"]) ?>"
               readonly class="mb-3 rounded-lg border border-slate-200 bg-slate-100 p-3">

        <label for="nama" class="text-sm font-semibold">Nama</label>
        <input id="nama" name="nama" value="<?= e($data["nama"]) ?>"
               maxlength="100" required class="mb-3 rounded-lg border border-slate-300 p-3">

        <label for="email" class="text-sm font-semibold">Email</label>
        <input id="email" name="email" type="email"
               value="<?= e($data["email"]) ?>" maxlength="100" required
               class="mb-3 rounded-lg border border-slate-300 p-3">

        <label for="no_hp" class="text-sm font-semibold">Nomor Telepon</label>
        <input id="no_hp" name="no_hp" type="tel"
               value="<?= e($data["no_hp"] ?? "") ?>"
               maxlength="15" pattern="[0-9+ -]{8,15}" required
               class="mb-3 rounded-lg border border-slate-300 p-3">

        <label for="prodi" class="text-sm font-semibold">Program Studi</label>
        <input id="prodi" name="prodi" value="<?= e($data["prodi"]) ?>"
               maxlength="100" required class="mb-3 rounded-lg border border-slate-300 p-3">

        <label for="angkatan" class="text-sm font-semibold">Angkatan</label>
        <input id="angkatan" name="angkatan" type="number"
               min="2000" max="<?= date('Y') ?>"
               value="<?= e($data["angkatan"]) ?>" required
               class="mb-3 rounded-lg border border-slate-300 p-3">

        <label for="ipk" class="text-sm font-semibold">IPK</label>
        <input id="ipk" name="ipk" type="number"
               min="0" max="4" step="0.01"
               value="<?= e($data["ipk"]) ?>" required
               class="mb-5 rounded-lg border border-slate-300 p-3">

        <div class="flex flex-col gap-2 sm:flex-row">
            <button type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700">
                Simpan Perubahan
            </button>

            <a href="index.php"
               class="rounded-lg border border-slate-300 px-5 py-3 text-center font-semibold hover:bg-slate-50">
                Batal
            </a>
        </div>

    </form>
</main>
</body>
</html>
