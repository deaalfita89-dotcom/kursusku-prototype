<?php

declare(strict_types=1);

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

// Pengaman jika variabel dari data.php tidak terbaca
$interestOptions = $interestOptions ?? [];
$facilities = $facilities ?? [];

// ==========================================
// HALAMAN GET (Saat process.php dibuka langsung)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hasil Proses Pendaftaran - KursusKu</title>
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                background-color: #fdf2f8;
                font-family: 'Segoe UI', Tahoma, sans-serif;
                color: #4a0424;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 2rem;
            }
            .utility-card {
                background: #ffffff;
                border: 1px solid #fbcfe8;
                border-radius: 16px;
                padding: 2.5rem;
                max-width: 600px;
                width: 100%;
                box-shadow: 0 10px 25px rgba(216, 27, 96, 0.1);
            }
            h1 {
                color: #ad1457;
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }
            .alert-info {
                background-color: #fff0f6;
                border-left: 4px solid #d81b60;
                color: #831843;
                padding: 1rem 1.25rem;
                border-radius: 4px;
                margin-bottom: 2rem;
                line-height: 1.6;
            }
            .button {
                display: inline-block;
                background-color: #d81b60;
                color: #ffffff;
                text-decoration: none;
                padding: 0.85rem 1.75rem;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.2s ease;
                border: none;
                font-size: 1rem;
            }
            .button:hover {
                background-color: #ad1457;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(216, 27, 96, 0.3);
            }
        </style>
    </head>
    <body>
    <main class="utility-card">
        <h1>Hasil Proses Pendaftaran</h1>
        <div class="alert-info">
            Halaman process.php berhasil dibuka. Untuk memproses pendaftaran, silakan isi formulir terlebih dahulu.
        </div>
        <a class="button" href="register.php">Buka Form Pendaftaran</a>
    </main>
    </body>
    </html>
    <?php
    exit;
}

// ==========================================
// PROSES FORM (Saat diakses via POST)
// ==========================================
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$courseCode = (string) ($_POST['course_code'] ?? '');
$participantType = (string) ($_POST['participant_type'] ?? '');
$learningMode = (string) ($_POST['learning_mode'] ?? '');
$packageCount = (int) ($_POST['package_count'] ?? 1);
$notes = trim($_POST['notes'] ?? '');
$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}

$allowedInterestKeys = array_keys($interestOptions);
$interests = array_values(array_intersect($interests, $allowedInterestKeys));

$course = findCourse($courses, $courseCode);
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}
if ($course === null) {
    $errors[] = 'Kursus tidak valid.';
}
if (!in_array($participantType, ['mahasiswa', 'guru', 'umum'], true)) {
    $errors[] = 'Tipe peserta tidak valid.';
}
if (!in_array($learningMode, ['offline', 'online', 'hybrid'], true)) {
    $errors[] = 'Metode belajar tidak valid.';
}
if ($packageCount < 1 || $packageCount > 3) {
    $errors[] = 'Jumlah paket harus antara 1 sampai 3.';
}

// ==========================================
// HALAMAN ERROR (Jika Validasi Gagal)
// ==========================================
if ($errors !== []) {
    http_response_code(422);
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Belum Valid - KursusKu</title>
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                background-color: #fdf2f8;
                font-family: 'Segoe UI', Tahoma, sans-serif;
                color: #4a0424;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 2rem;
            }
            .utility-card {
                background: #ffffff;
                border: 1px solid #fbcfe8;
                border-radius: 16px;
                padding: 2.5rem;
                max-width: 600px;
                width: 100%;
                box-shadow: 0 10px 25px rgba(216, 27, 96, 0.1);
            }
            .eyebrow {
                display: inline-block;
                background-color: #fce4ec;
                color: #c2185b;
                font-size: 0.75rem;
                font-weight: 700;
                letter-spacing: 1.5px;
                padding: 0.4rem 1rem;
                border-radius: 999px;
                margin-bottom: 1.5rem;
                text-transform: uppercase;
            }
            h1 {
                color: #ad1457;
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }
            .alert-error {
                background-color: #fff0f6;
                border-left: 4px solid #d81b60;
                color: #831843;
                padding: 1rem 1.25rem;
                border-radius: 4px;
                margin-bottom: 2rem;
            }
            .alert-error ul { margin-left: 1.5rem; }
            .alert-error li { margin-bottom: 0.5rem; }
            .button {
                display: inline-block;
                background-color: #d81b60;
                color: #ffffff;
                text-decoration: none;
                padding: 0.85rem 1.75rem;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.2s ease;
                border: none;
            }
            .button:hover {
                background-color: #ad1457;
                transform: translateY(-2px);
            }
        </style>
    </head>
    <body>
    <main class="utility-card">
        <span class="eyebrow">VALIDASI FUNDAMENTAL</span>
        <h1>Data belum dapat diproses</h1>
        <div class="alert-error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= e((string) $error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a class="button" href="register.php">Kembali ke Form</a>
    </main>
    </body>
    </html>
    <?php
    exit;
}

// ==========================================
// PERHITUNGAN BIAYA
// ==========================================
$discountPercent = getDiscountPercent($participantType);
$grossTotal = $course['fee'] * $packageCount;
$discountAmount = (int) ($grossTotal * $discountPercent / 100);
$finalTotal = $grossTotal - $discountAmount;
$learningModeLabel = getLearningModeLabel($learningMode);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #fdf2f8;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #4a0424;
            min-height: 100vh;
            padding: 2rem;
        }
        .utility-card {
            background: #ffffff;
            border: 1px solid #fbcfe8;
            border-radius: 16px;
            padding: 2.5rem;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 10px 25px rgba(216, 27, 96, 0.1);
        }
        .eyebrow {
            display: inline-block;
            background-color: #fce4ec;
            color: #c2185b;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
        }
        h1 {
            color: #ad1457;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #f8bbd0;
            padding-bottom: 0.75rem;
        }
        h2 {
            color: #d81b60;
            font-size: 1.25rem;
            margin: 2rem 0 1rem;
        }
        .result-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .result-grid p {
            background: #fce4ec;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border-left: 4px solid #d81b60;
        }
        .result-grid b {
            color: #880e4f;
            font-size: 0.85rem;
            text-transform: uppercase;
            display: block;
            margin-bottom: 4px;
        }
        .table-wrap { overflow-x: auto; margin: 1rem 0; }
        .course-table { width: 100%; border-collapse: collapse; }
        .course-table td, .course-table th {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f8bbd0;
            text-align: left;
        }
        .compact-table td:first-child { color: #831843; font-weight: 500; }
        .total-row { background: #d81b60; color: #ffffff; }
        .total-row th { color: #ffffff; font-size: 1.05rem; }
        .chip-list { list-style: none; display: flex; flex-wrap: wrap; gap: 0.5rem; padding: 0; }
        .chip-list li {
            background: #fce4ec;
            color: #880e4f;
            border: 1px solid #f8bbd0;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            font-size: 0.9rem;
        }
        main ul:not(.chip-list) { list-style: none; padding: 0; }
        main ul:not(.chip-list) li {
            padding: 0.5rem 0 0.5rem 1.75rem;
            position: relative;
            border-bottom: 1px dashed #f8bbd0;
            color: #831843;
        }
        main ul:not(.chip-list) li::before {
            content: "✦";
            position: absolute;
            left: 0;
            color: #d81b60;
            font-weight: bold;
        }
        .button-row { display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: 2.5rem; }
        .button {
            display: inline-block;
            background-color: #d81b60;
            color: #ffffff;
            text-decoration: none;
            padding: 0.85rem 1.75rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
            border: none;
            text-align: center;
        }
        .button:hover {
            background-color: #ad1457;
            transform: translateY(-2px);
        }
        .button-secondary {
            background-color: transparent;
            color: #d81b60;
            border: 2px solid #d81b60;
        }
        .button-secondary:hover {
            background-color: #fce4ec;
            color: #880e4f;
        }
    </style>
</head>
<body>
<main class="utility-card">
    <span class="eyebrow">MILESTONE 6 · RINGKASAN</span>
    <h1>Pendaftaran Berhasil Diproses</h1>

    <div class="result-grid">
        <p><b>Nama:</b> <?= e($name) ?></p>
        <p><b>Email:</b> <?= e($email) ?></p>
        <p><b>Kursus:</b> <?= e((string) ($course['name'] ?? 'Tidak Diketahui')) ?></p>
        <p><b>Tipe peserta:</b> <?= e(ucfirst($participantType)) ?></p>
        <p><b>Metode:</b> <?= e((string) $learningModeLabel) ?></p>
        <p><b>Jumlah paket:</b> <?= $packageCount ?></p>
    </div>

    <h2>Rincian Biaya</h2>
    <div class="table-wrap">
        <table class="course-table compact-table">
            <tbody>
            <tr><td>Biaya satuan</td><td><?= formatRupiah((int) ($course['fee'] ?? 0)) ?></td></tr>
            <tr><td>Subtotal</td><td><?= formatRupiah((int) $grossTotal) ?></td></tr>
            <tr><td>Diskon <?= $discountPercent ?>%</td><td>-<?= formatRupiah((int) $discountAmount) ?></td></tr>
            <tr class="total-row"><th>Total akhir</th><th><?= formatRupiah((int) $finalTotal) ?></th></tr>
            </tbody>
        </table>
    </div>

    <h2>Minat</h2>
    <?php if ($interests === []): ?>
        <p style="color: #831843; font-style: italic;">Belum memilih minat.</p>
    <?php else: ?>
        <ul class="chip-list">
            <?php foreach ($interests as $interest): ?>
                <li><?= e((string) ($interestOptions[$interest] ?? $interest)) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2>Fasilitas</h2>
    <ul>
        <?php foreach ($facilities as $facility): ?>
            <li><?= e((string) $facility) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Catatan</h2>
    <p style="color: #831843;"><?= e($notes !== '' ? $notes : 'Tidak ada catatan tambahan.') ?></p>

    <div class="button-row">
        <a class="button" href="register.php">Daftar Lagi</a>
        <a class="button button-secondary" href="index.php">Beranda</a>
    </div>
</main>
</body>
</html>
