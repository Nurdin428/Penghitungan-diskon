<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Aplikasi Perhitungan Diskon</h3>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="harga">Harga Barang (Rp)</label>
                        <input type="text" name="harga" id="harga" class="form-input" required placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <label for="diskon">Persentase Diskon (%)</label>
                        <input type="text" name="diskon" id="diskon" class="form-input" required placeholder="Masukkan Diskon">
                    </div>
                    <button type="submit" name="hitung" class="btn">Hitung Diskon</button>
                </form>

                <?php
if (isset($_POST['hitung'])) {
    
    $hargaInput = $_POST['harga'];
    $diskonInput = $_POST['diskon'];
    
    
    $hargaInput = preg_replace('/[^0-9]/', '', $hargaInput);
    $diskonInput = str_replace(',', '.', $diskonInput); 
    
    $harga = floatval($hargaInput);
    $diskon = floatval($diskonInput);

    echo '<div class="alert">';
    
    if ($harga <= 0) {
        echo "Harga harus lebih dari 0.";
    } elseif ($diskon < 0 || $diskon > 100) {
        echo "Diskon harus antara 0 - 100%.";
    } else {
       
        $nilaiDiskon = $harga * ($diskon / 100);
        $totalHarga = $harga - $nilaiDiskon;
       
        echo "<strong>Nilai Diskon:</strong> Rp " . number_format($nilaiDiskon, 0, ',', '.');
        echo "<br><strong>Total Harga Setelah Diskon:</strong> Rp " . number_format($totalHarga, 0, ',', '.');
    }
    echo '</div>';
}
?>

            </div>
        </div>
    </div>
</body>
</html>
