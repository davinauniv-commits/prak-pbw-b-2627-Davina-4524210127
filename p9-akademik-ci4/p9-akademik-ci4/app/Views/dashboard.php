<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Dashboard Akademik
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>
            Sistem Akademik
        </h1>
        <div class="dashboard">
            <div class="card">
                <h3>Mahasiswa</h3>
                <p>
                    <?= $jumlahMahasiswa; ?>
                </p>
            </div>
            <div class="card">
                <h3>Dosen</h3>
                <p>
                    <?= $jumlahDosen; ?>
                </p>
            </div>
            <div class="card">
                <h3>Mata Kuliah</h3>
                <p>
                    <?= $jumlahMK; ?>
                </p>
            </div>
            <div class="card">
                <h3>KRS</h3>
                <p>
                    <?= $jumlahKRS; ?>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>