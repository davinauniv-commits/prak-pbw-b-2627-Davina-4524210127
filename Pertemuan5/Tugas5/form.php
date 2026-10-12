<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #07286b;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #01243b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Data Mahasiswa</h2>

    <form action="simpan.php" method="post">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim"
               maxlength="20" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"
               maxlength="100" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
               maxlength="100" required>

        <label for="no_hp">Nomor Telepon:</label>
        <input type="tel" id="no_hp" name="no_hp"
               maxlength="15" required>

        <label for="prodi">Program Studi:</label>
        <input type="text" id="prodi" name="prodi"
               maxlength="100" required>

        <label for="angkatan">Angkatan:</label>
        <input type="number" id="angkatan" name="angkatan"
               min="2000" max="2099" required>

        <label for="ipk">IPK:</label>
        <input type="number" id="ipk" name="ipk"
               min="0" max="4" step="0.01" required>

        <button type="submit">Simpan Data</button>
    </form>
</div>

</body>
</html>