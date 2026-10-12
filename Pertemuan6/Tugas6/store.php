
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: create.php");
    exit;
}

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$no_hp = trim($_POST["no_hp"] ?? "");
$prodi = trim($_POST["prodi"] ?? "");

$angkatan = filter_var(
    $_POST["angkatan"] ?? null,
    FILTER_VALIDATE_INT
);

$ipk = filter_var(
    $_POST["ipk"] ?? null,
    FILTER_VALIDATE_FLOAT
);

if (
    $nim === "" ||
    $nama === "" ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !preg_match('/^[0-9+ -]{8,15}$/', $no_hp) ||
    $prodi === "" ||
    $angkatan === false ||
    $angkatan < 2000 ||
    $angkatan > (int) date("Y") ||
    $ipk === false ||
    $ipk < 0 ||
    $ipk > 4
) {
    exit(
        "Data tidak valid. Periksa email, nomor telepon, " .
        "angkatan, dan IPK (0 sampai 4). " .
        "<a href='create.php'>Kembali</a>"
    );
}

$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, no_hp, prodi, angkatan, ipk)
    VALUES (?, ?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssssid",
    $nim,
    $nama,
    $email,
    $no_hp,
    $prodi,
    $angkatan,
    $ipk
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Data mahasiswa berhasil disimpan');
        window.location.href='index.php';
    </script>";
} else {
    echo "Data gagal disimpan. Pastikan NIM belum terdaftar.";
}

mysqli_stmt_close($stmt);
?>
