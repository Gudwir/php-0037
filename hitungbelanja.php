<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Total Pembelian</title>
    <style>
        body {
           
            text-align: center;
        }
    </style>
</head>
<body>

<h1>BAGUS SHOP</h1>
<h2>Hitung Total Pembelian</h2>

<form method="post">
    <label for="jumlah_pembelian">Total Pembelian:</label>
    <input type="number" id="jumlah_pembelian" name="jumlah_pembelian" step="0.01" required>
    <br><br>
    
    <label>Apakah Anda member?</label>
    <input type="radio" name="is_member" value="ya" required> Ya
    <input type="radio" name="is_member" value="tidak"> Tidak
    <br><br>

    <input type="submit" name="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_pembelian = floatval($_POST['jumlah_pembelian']);
    $is_member = $_POST['is_member'] === 'ya';

    // diskon
    $diskon_member = $is_member ? 0.10 : 0;

    // Hitung diskon tambahan berdasarkan total pembelian
    if ($jumlah_pembelian >= 500000) {
        $diskon_tambahan = 0.10; // 10% tambahan untuk pembelian >= 500.000
    } elseif ($jumlah_pembelian >= 300000) {
        $diskon_tambahan = 0.05; // 5% tambahan untuk pembelian >= 300.000
    } else {
        $diskon_tambahan = 0; // Tidak ada tambahan diskon
    }

    // Hitung total diskon
    $total_diskon = $diskon_member + $diskon_tambahan;

    // Hitung total setelah diskon
    $total_setelah_diskon = $jumlah_pembelian * (1 - $total_diskon);

    // Tampilkan hasil
    echo "<h3>Total Setelah Diskon: " . number_format($total_setelah_diskon, 2, ',', '.') . "</h3>";
    //Salam hangat dari pemilik toko
    echo "<br/>";
    echo "DISKON AKAN BERLAKU JIKA ANDA MEMBER ATAU KELIPATAN";
    echo "<br/>";
    echo "TERIMA KASIH TELAH BERBELANJA DISINI :)";

}
?>

</body>
</html>
