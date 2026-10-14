
<?php
declare(strict_types=1);

// Mendefinisikan flag izin
$READ = 1;    // 001
$WRITE = 2;   // 010
$DELETE = 4;  // 100

// Menggabungkan izin READ dan WRITE
$permission = $READ | $WRITE;

// Memeriksa apakah izin DELETE aktif
$canDelete = ($permission & $DELETE) === $DELETE;

// Menampilkan hasil pengujian
echo "<h2>Pengujian Bitwise PHP</h2>";
echo "READ = " . $READ . "<br>";
echo "WRITE = " . $WRITE . "<br>";
echo "DELETE = " . $DELETE . "<br>";
echo "Permission = " . $permission . "<br>";
echo "Can Delete = " . var_export($canDelete, true);
?>
