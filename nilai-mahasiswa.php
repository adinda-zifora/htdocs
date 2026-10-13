<?php
// 1. FUNCTION
function cekStatusKelulusan($nilaiAkhir) {
    if ($nilaiAkhir >= 60) {
        return "LULUS";
    } else {
        return "TIDAK LULUS";
    }
}

// Menyiapkan variabel
$nim = "";
$nama = "";
$prodi = "";
$semester = 0;      
$isAktif = true;    
$nilai = 0.0;       
$predikat = "";
$status = "";
$dataTampil = [];

// Mengecek apakah form sudah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"] ?? "";
    $nama = $_POST["nama"] ?? "";
    $prodi = $_POST["prodi"] ?? "";
    $semester = (int)($_POST["semester"] ?? 0);
    
    // Mengganti koma (,) menjadi titik (.) agar PHP bisa membaca angka desimal
    $nilaiInput = $_POST["nilai"] ?? "0";
    $nilai = (float) str_replace(',', '.', $nilaiInput);

    // List data untuk perulangan for
    $dataTampil = [
        "NIM: " . $nim,
        "Nama: " . $nama,
        "Program Studi: " . $prodi,
        "Semester: " . $semester
    ];

    // 2. PERCABANGAN
    if ($nilai >= 85) { 
        $predikat = "Sangat Baik (A)"; 
    } elseif ($nilai >= 75) { 
        $predikat = "Baik (B)"; 
    } elseif ($nilai >= 60) { 
        $predikat = "Cukup (C)"; 
    } else { 
        $predikat = "Perlu Perbaikan (D)"; 
    } 

    // Memanggil function
    $status = cekStatusKelulusan($nilai);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program Perhitungan Nilai Mahasiswa</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f6f9; 
            margin: 0; 
            padding: 30px; 
        }
        .container { 
            width: 600px; 
            margin: auto; 
            background: white; 
            padding: 25px; 
            border-radius: 10px; 
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
            transition: all 0.3s ease;
        }
        
        .container:focus-within {
            box-shadow: 0 0 20px rgba(35, 79, 125, 0.6);
            border: 1px solid #163652;
        }
        h1 {
            text-align: center; 
            color: #0f0f0f;
            font-size: 25px;     
            font-weight: bold;   
            margin-bottom: 25px;
            line-height: 1.3;
        }
        label { 
            display: block; 
            margin-top: 15px; 
            font-weight: bold; 
        }
        input, select { 
            width: 100%; 
            padding: 10px; 
            margin-top: 5px; 
            box-sizing: border-box; 
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button { 
            margin-top: 20px; 
            width: 100%; 
            padding: 12px; 
            background: #234f7d; 
            color: white; 
            border: none; 
            border-radius: 5px;
            cursor: pointer; 
            font-size: 16px;
        }
        button:hover { 
            background: #163652; 
        }
        .hasil { 
            margin-top: 30px; 
            padding: 20px; 
            background: #eef5fa; 
            border-radius: 8px; 
            border: 1px solid transparent;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .hasil:focus {
            box-shadow: 0 0 20px rgba(35, 79, 125, 0.6);
            border: 1px solid #234f7d;
            background-color: #ffffff;
        }
        .hasil h3 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #0f0f0f;
            text-align: center; 
        }
        .hasil p {
            margin: 8px 0;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>DATA MAHASISWA FAKULTAS SAINS DAN TEKNOLOGI ANGKATAN 2025</h1>
    
    <form method="POST" action="">
        <label>NIM:</label>
        <input type="text" name="nim" required value="<?= htmlspecialchars($nim) ?>">

        <label>Nama Mahasiswa:</label>
        <input type="text" name="nama" required value="<?= htmlspecialchars($nama) ?>">

        <label>Program Studi:</label>
        <select name="prodi" required>
            <option value="">-- Pilih Program Studi --</option>
            <option value="Teknik Informatika" <?= ($prodi == "Teknik Informatika") ? 'selected' : '' ?>>Teknik Informatika</option>
            <option value="Teknik Sipil" <?= ($prodi == "Teknik Sipil") ? 'selected' : '' ?>>Teknik Sipil</option>
            <option value="Kimia" <?= ($prodi == "Kimia") ? 'selected' : '' ?>>Kimia</option>
        </select>

        <label>Semester:</label>
        <select name="semester" required>
           <option value="">-- Pilih Semester --<option>
           <option value="1">Semester 1</option>
           <option value="2">Semester 2</option>
           <option value="3">Semester 3</option>
           <option value="4">Semester 4</option>
           <option value="5">Semester 5</option>
           <option value="6">Semester 6</option>
           <option value="7">Semester 7</option>
           <option value="8">Semester 8</option>
        </select>

        <label>Nilai:</label>
        <input type="text" name="nilai" required value="<?= isset($_POST['nilai']) ? htmlspecialchars($_POST['nilai']) : '' ?>">

        <button type="submit">Simpan Data</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="hasil" tabindex="0">
            <h3>PENILAIAN MAHASISWA FAKULTAS SAINS DAN TEKNOLOGI</h3>
            
            <?php 
            // 3. PERULANGAN FOR
            for ($i = 0; $i < count($dataTampil); $i++) {
                echo "<p><b>" . $dataTampil[$i] . "</b></p>";
            }
            
            // Menampilkan status aktif, nilai, predikat, dan status kelulusan
            echo "<p><b>Status Aktif:</b> " . ($isAktif ? "Aktif" : "Tidak Aktif") . "</p>";
            echo "<p><b>Nilai Angka:</b> " . number_format($nilai, 2, ',', '.') . "</p>";
            echo "<p><b>Predikat:</b> " . $predikat . "</p>";
            echo "<p><b>Status Kelulusan:</b> " . $status . "</p>";
            ?>
        </div>
    <?php } ?>
</div>

</body>
</html>