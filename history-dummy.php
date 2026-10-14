<?php
/* ===== DATA DUMMY ===== */
$history = [
    ['id' => 1, 'name' => 'Mardatul Rahmi', 'course' => 'Web Dasar',    'total' => 180000],
    ['id' => 2, 'name' => 'Cika',             'course' => 'PHP Dasar',   'total' => 212500],
    ['id' => 3, 'name' => 'Nur',              'course' => 'Laravel Dasar', 'total' => 285000],
    ['id' => 4, 'name' => 'Gani',             'course' => 'Web Dasar',   'total' => 380000],
];

function rupiah(int $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Dummy - KursusKu</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #fce4ec;
            color: #333;
            line-height: 1.6;
            padding: 32px 20px;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
        }

        .eyebrow {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #e91e63;
            margin-bottom: 8px;
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            color: #c2185b;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #666;
            font-size: 15px;
            margin-bottom: 24px;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border: 2px solid #f8bbd0;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(233, 30, 99, 0.08);
        }

        /* ===== TABEL ===== */
        .history-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #f8bbd0;
            border-radius: 8px;
            overflow: hidden;
        }

        .history-table thead {
            background: #fce4ec;
        }

        .history-table th {
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
            font-weight: 700;
            color: #c2185b;
            border-bottom: 2px solid #f8bbd0;
        }

        .history-table td {
            padding: 12px 16px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #fce4ec;
        }

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        .history-table tbody tr:hover {
            background: #fff5f8;
        }

        .history-table .id-col {
            font-weight: 600;
            color: #666;
            width: 60px;
        }

        .history-table .name-col {
            font-weight: 600;
            color: #333;
        }

        .history-table .total-col {
            font-weight: 700;
            color: #e91e63;
        }

        .history-table th.total-col {
            text-align: right;
        }

        .history-table td.total-col {
            text-align: right;
        }

        /* ===== TOMBOL ===== */
        .actions {
            margin-top: 24px;
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-solid {
            display: inline-block;
            background: #e91e63;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: background 0.2s;
        }

        .btn-solid:hover {
            background: #c2185b;
        }

        .btn-link {
            color: #e91e63;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e91e63;
            padding-bottom: 2px;
        }

        .btn-link:hover {
            color: #c2185b;
            border-color: #c2185b;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .card { padding: 16px; }
            .history-table,
            .history-table thead,
            .history-table tbody,
            .history-table th,
            .history-table td,
            .history-table tr {
                display: block;
            }
            .history-table thead { display: none; }
            .history-table tbody tr {
                background: #fce4ec;
                border-radius: 8px;
                margin-bottom: 12px;
                padding: 12px;
            }
            .history-table td {
                padding: 6px 4px;
                border-bottom: none;
                display: flex;
                justify-content: space-between;
            }
            .history-table td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #c2185b;
            }
            .history-table td.total-col {
                text-align: right;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <p class="eyebrow">Milestone 6 · Foreach</p>
    <h1>History Pendaftaran Dummy</h1>
    <p class="subtitle">Data ini adalah latihan array + looping, bukan database dan bukan CRUD.</p>

    <div class="card">

        <table class="history-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kursus</th>
                    <th class="total-col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $row): ?>
                    <tr>
                        <td class="id-col" data-label="No.:"><?= $row['id'] ?></td>
                        <td class="name-col" data-label="Nama:"><?= htmlspecialchars($row['name']) ?></td>
                        <td data-label="Kursus:"><?= htmlspecialchars($row['course']) ?></td>
                        <td class="total-col" data-label="Total:"><?= rupiah($row['total']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="actions">
            <a href="registration.php" class="btn-solid">Daftar Kursus</a>
            <a href="index.php" class="btn-link">Beranda</a>
        </div>

    </div>

</div>

</body>
</html>
