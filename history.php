<?php

declare(strict_types=1);

require __DIR__ . '/helpers.php';

$registrations = [
    ['name' => 'Dea Alfita', 'course' => 'Web Dasar', 'total' => 180000],
    ['name' => 'Sari', 'course' => 'PHP Dasar', 'total' => 212500],
    ['name' => 'Bunga', 'course' => 'Laravel Dasar', 'total' => 285000],
    ['name' => 'Deni', 'course' => 'Web Dasar', 'total' => 380000],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Pendaftaran Dummy - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* TEMA PINK MAGENTA */
        body {
            background: linear-gradient(135deg, #fdf2f8 0%, #fce4ec 100%);
        }
        .eyebrow {
            color: #be185d;
            background: #fce4ec;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            display: inline-block;
            margin-bottom: 0.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        h1 {
            color: #be185d;
            margin-bottom: 0.5rem;
        }
        .utility-card {
            background: #ffffff;
            border: 2px solid #fbcfe8;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(216, 27, 96, 0.15);
        }
        .course-table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin: 1.5rem 0;
        }
        .course-table thead {
            background: linear-gradient(135deg, #fce4ec 0%, #fbcfe8 100%);
        }
        .course-table th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 700;
            color: #be185d;
            border-bottom: 2px solid #f06292;
        }
        .course-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #fbcfe8;
            color: #4a0424;
        }
        .course-table tbody tr:hover {
            background: #fff0f6;
        }
        .course-table tbody tr:last-child td {
            border-bottom: none;
        }
        .compact-table td:last-child {
            text-align: right;
            font-weight: 600;
            color: #be185d;
        }
        .button-row {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }
        .button {
            display: inline-block;
            background: #d81b60;
            color: #ffffff;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .button:hover {
            background: #ad1457;
            transform: translateY(-2px);
        }
        .button-secondary {
            background: transparent;
            color: #d81b60;
            border: 2px solid #d81b60;
        }
        .button-secondary:hover {
            background: #fce4ec;
        }
        .button-secondary.active {
            background: #fce4ec;
            border-bottom: 3px solid #d81b60;
        }
    </style>
</head>
<body class="utility-page">
<main class="utility-card wide-card">
    <span class="eyebrow">MILESTONE 6 · FOREACH</span>
    <h1>History Pendaftaran Dummy</h1>
    <p style="color: #831843; margin-bottom: 1.5rem;">Data ini adalah latihan array + looping, bukan database dan bukan CRUD.</p>

    <div class="table-wrap">
        <table class="course-table compact-table">
            <thead>
            <tr><th>No.</th><th>Nama</th><th>Kursus</th><th>Total</th></tr>
            </thead>
            <tbody>
            <?php foreach ($registrations as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= e($item['name']) ?></td>
                    <td><?= e($item['course']) ?></td>
                    <td><?= formatRupiah($item['total']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="button-row">
        <a class="button" href="register.php">Daftar Kursus</a>
        <a class="button button-secondary active" href="history.php">History Dummy</a>
        <a class="button button-secondary" href="index.php">Beranda</a>
    </div>
</main>
</body>
</html>
