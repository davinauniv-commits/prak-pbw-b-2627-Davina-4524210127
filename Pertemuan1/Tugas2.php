<?php

interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private string $email;
    protected float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        string $email,
        float $ipk
    ) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->email = $email;
        $this->setIPK($ipk);
    }

    public function setIPK(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException(
                'IPK harus 0 sampai 4.'
            );
        }

        $this->ipk = $ipk;
    }

    public function getIPK(): float
    {
        return $this->ipk;
    }

    public function getStatus(): string
    {
        if ($this->ipk >= 3.50) {
            return 'Sangat Baik';
        } elseif ($this->ipk >= 3.00) {
            return 'Baik';
        } elseif ($this->ipk >= 2.50) {
            return 'Cukup';
        } else {
            return 'Perlu Perbaikan';
        }
    }

    public function ringkasan(): string
    {
        return $this->nim . ' - '
            . $this->nama . ' - '
            . $this->prodi . ' - IPK: '
            . $this->ipk;
    }

    public function getNim(): string
    {
        return $this->nim;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getProdi(): string
    {
        return $this->prodi;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

$mhs = new Mahasiswa(
    '4524210127',
    'Davina Arthamevia',
    'Teknik Informatika',
    'davina@gmail.com',
    3.78
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0e0148;
            padding: 40px;
        }

        .card {
            width: 450px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .data {
            margin-bottom: 12px;
        }

        .label {
            font-weight: bold;
        }

        .status {
            margin-top: 20px;
            padding: 12px;
            background-color: #e8f0fe;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>Data Mahasiswa</h1>

    <div class="data">
        <span class="label">NIM:</span>
        <?= htmlspecialchars($mhs->getNim()) ?>
    </div>

    <div class="data">
        <span class="label">Nama:</span>
        <?= htmlspecialchars($mhs->getNama()) ?>
    </div>

    <div class="data">
        <span class="label">Program Studi:</span>
        <?= htmlspecialchars($mhs->getProdi()) ?>
    </div>

    <div class="data">
        <span class="label">Email:</span>
        <?= htmlspecialchars($mhs->getEmail()) ?>
    </div>

    <div class="data">
        <span class="label">IPK:</span>
        <?= htmlspecialchars((string)$mhs->getIPK()) ?>
    </div>

    <div class="status">
        Status Akademik:
        <?= htmlspecialchars($mhs->getStatus()) ?>
    </div>

</div>

</body>
</html>