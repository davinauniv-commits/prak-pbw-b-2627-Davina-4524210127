
<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
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
        "Data tidak valid. Periksa kembali isian. " .
        "<a href='index.php'>Kembali</a>"
    );
}

$stmt = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, no_hp = ?, prodi = ?,
         angkatan = ?, ipk = ?
     WHERE nim = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssssids",
    $nama,
    $email,
    $no_hp,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Data mahasiswa berhasil diperbarui');
        window.location.href='index.php';
    </script>";
} else {
    echo "Data gagal diperbarui.";
}

mysqli_stmt_close($stmt);
?>
