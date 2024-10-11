<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Kalkulator Sederhana dengan Segitiga Bilangan Prima</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>

    <form method="post">
        Input Pertama: <input type="number" name="input1" required value="<?php echo isset($_POST['input1']) ? $_POST['input1'] : ''; ?>"><br><br>
        Input Kedua: <input type="number" name="input2" required value="<?php echo isset($_POST['input2']) ? $_POST['input2'] : ''; ?>"><br><br>

        Pilih Operator: 
        <select name="operasi">
            <option value="tambah" <?php echo isset($_POST['operasi']) && $_POST['operasi'] == 'tambah' ? 'selected' : ''; ?>>Penjumlahan (+)</option>
            <option value="kurang" <?php echo isset($_POST['operasi']) && $_POST['operasi'] == 'kurang' ? 'selected' : ''; ?>>Pengurangan (-)</option>
            <option value="kali" <?php echo isset($_POST['operasi']) && $_POST['operasi'] == 'kali' ? 'selected' : ''; ?>>Perkalian (x)</option>
            <option value="bagi" <?php echo isset($_POST['operasi']) && $_POST['operasi'] == 'bagi' ? 'selected' : ''; ?>>Pembagian (:)</option>
        </select><br><br>

        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
    function isPrima($num) {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }

    function cetakSegitigaBintang($size) {
        for ($i = 1; $i <= $size; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    }

    if (isset($_POST['hitung'])) {
        $input1 = $_POST['input1'];
        $input2 = $_POST['input2'];
        $operasi = $_POST['operasi'];
        $hasil = 0;
        $symbol = '';

        switch ($operasi) {
            case 'tambah':
                $hasil = $input1 + $input2;
                $symbol = '+';
                break;
            case 'kurang':
                $hasil = $input1 - $input2;
                $symbol = '-';
                break;
            case 'kali':
                $hasil = $input1 * $input2;
                $symbol = '×';
                break;
            case 'bagi':
                if ($input2 != 0) {
                    $hasil = $input1 / $input2;
                    $symbol = '÷';
                } else {
                    $hasil = "Pembagian dengan nol tidak diperbolehkan!";
                    $symbol = ''; 
                }
                break;
            default:
                $hasil = "Operasi tidak valid!";
                $symbol = ''; 
                break;
        }

        
        echo "<h3>Hasil:</h3>";

        if ($symbol != '') {
            echo "<h3>$input1 $symbol $input2 = $hasil</h3>";
        } else {
            echo "<h3>$hasil</h3>";
        }

        if (is_numeric($hasil) && is_int($hasil + 0)) {
            $hasil = intval($hasil);
            if (isPrima($hasil)) {
                echo "<h3>Cetak Segitiga Bintang (karena hasilnya bilangan prima):</h3>";
                cetakSegitigaBintang($hasil);
            } else {
                echo "<h3>Hasil bukan bilangan prima, jadi segitiga tidak dicetak.</h3>";
            }
        }
    }
    ?>
</body>
</html>
