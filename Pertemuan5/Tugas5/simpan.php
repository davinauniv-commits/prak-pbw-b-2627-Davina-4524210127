<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

$query = mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa (nim, nama, email, no_hp, prodi, angkatan, ipk) 
    VALUES
    ('$nim', '$nama', '$email', '$no_hp', '$prodi', '$angkatan', '$ipk')"
);

if ($query) {
    echo "Data berhasil disimpan";
} else {
    echo "Data gagal disimpan";
}
?>