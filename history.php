<?php
// history.php
session_start();

require_once __DIR__ . '/helpers.php';

// Data dummy bawaan sesuai petunjuk praktikum
$default_history = [
    ['nama' => 'Alya Putri', 'kursus' => 'Web Dasar', 'total' => 240000],
    ['nama' => 'Bima Saputra', 'kursus' => 'PHP Dasar', 'total' => 340000],
    ['nama' => 'Citra Rahma', 'kursus' => 'Laravel Dasar', 'total' => 500000],
    ['nama' => 'Dani Akbar', 'kursus' => 'Web Dasar', 'total' => 480000],
];

// Ambil data baru dari session (jika ada)
$session_history = $_SESSION['history'] ?? [];

// Gabungkan data dummy bawaan dengan data pendaftaran baru
$all_history = array_merge($default_history, $session_history);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Pendaftaran Dummy - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffe4f1, #f8d6ec);
            font-family: system-ui, -apple-system, sans-serif;
            color: #57123f;
            margin: 0;
            padding: 2rem 1rem;
            min-height: 100vh;
        }

        .history-container {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #f2b9d8;
            border-radius: 1.25rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(190, 24, 93, 0.15);
        }

        .eyebrow-text {
            display: inline-block;
            background-color: #fce0ef;
            color: #c21875;
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.4rem 0.8rem;
            border-radius: 999px;
            margin-bottom: 0.8rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #c21875;
            margin: 0 0 0.5rem 0;
        }

        .subtitle {
            color: #7a4968;
            font-size: 0.95rem;
            margin-bottom: 1.75rem;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            overflow: hidden;
            border-radius: 0.6rem;
        }

        .history-table th {
            background: linear-gradient(135deg, #d81b82, #ad1457);
            color: #ffffff;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.85rem 1.25rem;
            text-align: left;
        }

        .history-table th:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .history-table th:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .history-table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #f5d4e5;
            color: #633052;
            background-color: #fffafd;
        }

        .history-table tbody tr:hover td {
            background-color: #fff0f8;
        }

        .history-table tr:last-child td {
            border-bottom: none;
        }

        .action-group {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn-solid {
            background: linear-gradient(135deg, #d81b82, #ad1457);
            color: #ffffff;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
            box-shadow: 0 4px 10px rgba(216, 27, 130, 0.25);
            transition: 0.2s;
        }

        .btn-solid:hover {
            background: #a91468;
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: #fff;
            color: #c21875;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-size: 0.9rem;
            border: 1.5px solid #d81b82;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background-color: #fce0ef;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            .history-container {
                padding: 1.5rem;
            }

            .history-table {
                font-size: 0.8rem;
            }

            .history-table th,
            .history-table td {
                padding: 0.7rem;
            }
        }
    </style>
</head>

<body>

<main class="history-container">

    <div class="eyebrow-text">MILESTONE 6 • FOREACH</div>

    <h1 class="page-title">History Pendaftaran Dummy</h1>

    <p class="subtitle">
        Data ini adalah latihan array + looping, bukan database dan bukan CRUD.
    </p>

    <table class="history-table">
        <thead>
            <tr>
                <th style="width: 60px;">NO.</th>
                <th>NAMA</th>
                <th>KURSUS</th>
                <th>TOTAL</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($all_history as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kursus']) ?></td>
                    <td><?= rupiah($row['total']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="action-group">
        <a href="registration.php" class="btn-solid">
            Daftar Kursus
        </a>

        <a href="index.php" class="btn-outline">
            Beranda
        </a>
    </div>

</main>

</body>
</html>
