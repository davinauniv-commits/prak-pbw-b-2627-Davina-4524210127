<?php
// kalkulator.php
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;

        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator Sederhana</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 40px;
        }

        .container {
            width: 400px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hitung {
            background-color: #2563eb;
            color: white;
        }

        .reset {
            background-color: #777;
            color: white;
        }

        .hasil {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f0fe;
            border-radius: 5px;
            text-align: center;
        }

        .error {
            margin-top: 20px;
            padding: 15px;
            background-color: #ffe0e0;
            color: red;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Kalkulator Sederhana</h1>

    <form method="post">

        <input
            type="number"
            step="any"
            name="a"
            placeholder="Angka pertama"
            required
        >

        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input
            type="number"
            step="any"
            name="b"
            placeholder="Angka kedua"
            required
        >

        <button type="submit" class="hitung">
            Hitung
        </button>

        <button type="reset" class="reset">
            Reset
        </button>

    </form>

    <?php if ($pesan): ?>

        <div class="error">
            <?= htmlspecialchars($pesan) ?>
        </div>

    <?php elseif ($hasil !== null): ?>

        <div class="hasil">
            <strong>Hasil Perhitungan adalah</strong>
            <h2><?= htmlspecialchars((string)$hasil) ?></h2>
        </div>

    <?php endif; ?>

</div>

</body>

</html>