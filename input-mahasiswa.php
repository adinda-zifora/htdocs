<?php
// Menyiapkan variabel
$nim = "";
$nama = "";
$fakultas = "";
$prodi = "";
$asal_sekolah = "";
$semester = "";
$hobi = "";
$alamat = "";

// Mengecek apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $fakultas = $_POST["fakultas"];
    $prodi = $_POST["prodi"];
    $asal_sekolah = $_POST["asal_sekolah"];
    $semester = $_POST["semester"];
    $hobi = $_POST["hobi"];
    $alamat = $_POST["alamat"];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef5fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .container:focus-within {
            box-shadow: 0 0 20px rgba(35, 79, 125, 0.6);
            border: 1px solid #234f7d;
        }

        h1 {
            text-align: center;
            color: #0f0f0f;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #163652;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #163652;
        }

        .hasil {
            margin-top: 30px;
            padding: 20px;
            background-color: #eef5fa;
            border-radius: 8px;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>DATA MAHASISWA UNIVERSITAS MUHAMMADIYAH SUKABUMI</h1>

    <form method="POST">

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Nama Mahasiswa</label>
        <input type="text" name="nama" required>

        <label>Fakultas</label>
        <select name="fakultas" required>
            <option value="">-- Pilih Fakultas --</option>
            <option value="Fakultas Sains dan Teknologi">Fakultas Sains dan Teknologi</option>
            <option value="Fakultas Pertanian">Fakultas Pertanian</option>
            <option value="Fakultas Ilmu Sosial">Fakultas Ilmu Sosial</option>
            <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
            <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
            <option value="Fakultas Kesehatan">Fakultas Kesehatan</option>
            <option value="Fakultas Hukum">Fakultas Hukum</option>
        </select>

        <label>Program Studi</label>
        <input type="text" name="prodi" required>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Semester</label>
        <select name="semester" required>
            <option value="">-- Pilih Semester --</option>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
            <option value="7">Semester 7</option>
            <option value="8">Semester 8</option>
        </select>

        <label>Hobi</label>
        <input type="text" name="hobi">

        <label>Alamat</label>
        <input type="text" name="alamat">

        <button type="submit">Simpan Data</button>

    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

        <div class="hasil">

            <h2>HASIL DATA MAHASISWA</h2>

            <p><strong>NIM:</strong>
                <?= htmlspecialchars($nim) ?>
            </p>

            <p><strong>Nama:</strong>
                <?= htmlspecialchars($nama) ?>
            </p>

            <p><strong>Fakultas:</strong>
                <?= htmlspecialchars($fakultas) ?>
            </p>

            <p><strong>Program Studi:</strong>
                <?= htmlspecialchars($prodi) ?>
            </p>

            <p><strong>Asal Sekolah:</strong>
                <?= htmlspecialchars($asal_sekolah) ?>
            </p>

            <p><strong>Semester:</strong>
                <?= htmlspecialchars($semester) ?>
            </p>

            <p><strong>Hobi:</strong>
                <?= htmlspecialchars($hobi) ?>
            </p>

        </div>

    <?php } ?>

</div>

</body>
</html>