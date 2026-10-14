
<?php
declare(strict_types=1);

// Teks awal yang memiliki spasi di awal dan akhir
$teks = " Laravel Fundamental ";

// Menghapus spasi di awal dan akhir teks
$hasil = trim($teks);

// Menampilkan hasil pengujian
echo "<h2>Pengujian Fungsi trim() PHP</h2>";

echo "<p>Teks sebelum trim(): ["
    . htmlspecialchars($teks)
    . "]</p>";

echo "<p>Teks setelah trim(): ["
    . htmlspecialchars($hasil)
    . "]</p>";
?>
