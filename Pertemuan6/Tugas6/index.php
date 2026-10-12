<?php
include "koneksi.php";

$cari = trim($_GET["cari"] ?? "");

if ($cari !== "") {
    $kata = "%" . $cari . "%";

    $stmt = mysqli_prepare(
        $koneksi,
        "SELECT * FROM mahasiswa
         WHERE nim LIKE ? OR nama LIKE ?
         ORDER BY nama ASC"
    );

    mysqli_stmt_bind_param($stmt, "ss", $kata, $kata);
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);
} else {
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM mahasiswa ORDER BY nama ASC"
    );
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
    <title>Data Mahasiswa</title>
</head>

<body class="min-h-screen bg-slate-100 p-4 md:p-8 text-slate-800">
<main class="mx-auto max-w-6xl rounded-2xl bg-white p-5 shadow-lg md:p-8">

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Data Mahasiswa</h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola informasi mahasiswa dengan mudah.
            </p>
        </div>

        <a href="create.php"
           class="rounded-lg bg-blue-600 px-4 py-2 text-center font-semibold text-white hover:bg-blue-700">
            + Tambah Mahasiswa
        </a>
    </div>

    <form method="GET" class="mb-5 flex flex-col gap-2 sm:flex-row">
        <input
            type="search"
            name="cari"
            value="<?= e($cari) ?>"
            placeholder="Cari berdasarkan NIM atau nama..."
            class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-blue-500 focus:outline-none"
        >

        <button type="submit"
                class="rounded-lg bg-slate-800 px-5 py-2 font-semibold text-white hover:bg-slate-700">
            Cari
        </button>

        <?php if ($cari !== ""): ?>
            <a href="index.php"
               class="rounded-lg border border-slate-300 px-5 py-2 text-center hover:bg-slate-50">
                Reset
            </a>
        <?php endif; ?>
    </form>

    <div class="overflow-x-auto rounded-lg border border-slate-200">
        <table class="w-full border-collapse text-left text-sm">
            <thead class="bg-slate-100 text-slate-700">
                <tr>
                    <th class="p-3">NIM</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Nomor Telepon</th>
                    <th class="p-3">Prodi</th>
                    <th class="p-3">Angkatan</th>
                    <th class="p-3">IPK</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($query && mysqli_num_rows($query) > 0): ?>
                    <?php while ($data = mysqli_fetch_assoc($query)): ?>
                        <tr class="border-t border-slate-200 odd:bg-white even:bg-slate-50 hover:bg-blue-50">
                            <td class="p-3"><?= e($data["nim"]) ?></td>
                            <td class="p-3 font-medium"><?= e($data["nama"]) ?></td>
                            <td class="p-3"><?= e($data["email"]) ?></td>
                            <td class="p-3"><?= e($data["no_hp"] ?? "") ?></td>
                            <td class="p-3"><?= e($data["prodi"]) ?></td>
                            <td class="p-3"><?= e($data["angkatan"]) ?></td>
                            <td class="p-3"><?= e(number_format((float)$data["ipk"], 2)) ?></td>

                            <td class="whitespace-nowrap p-3 text-center">
                                <a href="edit.php?nim=<?= rawurlencode($data["nim"]) ?>"
                                   class="font-semibold text-blue-600 hover:underline">
                                    Edit
                                </a>

                                <span class="px-1 text-slate-300">|</span>

                                <a href="delete.php?nim=<?= rawurlencode($data["nim"]) ?>"
                                   onclick="return confirm('Yakin ingin menghapus data mahasiswa ini?')"
                                   class="font-semibold text-red-600 hover:underline">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="p-8 text-center text-slate-500">
                            Data mahasiswa tidak ditemukan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <p class="mt-3 text-sm text-slate-500">
        Jumlah data yang ditampilkan:
        <?= $query ? mysqli_num_rows($query) : 0 ?>
    </p>

</main>
</body>
</html>
