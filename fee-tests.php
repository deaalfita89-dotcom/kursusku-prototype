
<?php
$fee = 2500000;
$peserta = 3;
$diskon = 10;
$admin = 50000;

$subtotal = $fee * $peserta;
$potongan = $subtotal * $diskon / 100;
$total = $subtotal - $potongan + $admin;

echo "<h2>Test Case ke-5</h2>";
echo "Fee per peserta: Rp" . number_format($fee, 0, ',', '.') . "<br>";
echo "Jumlah peserta: " . $peserta . "<br>";
echo "Subtotal: Rp" . number_format($subtotal, 0, ',', '.') . "<br>";
echo "Diskon 10%: Rp" . number_format($potongan, 0, ',', '.') . "<br>";
echo "Biaya admin: Rp" . number_format($admin, 0, ',', '.') . "<br>";
echo "<strong>Expected Total: Rp" . number_format($total, 0, ',', '.') . "</strong>";
?>
