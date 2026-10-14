<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe6f3, #f7d6ed);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #5b1648;
        }

        .container {
            width: 100%;
            max-width: 485px;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(190, 36, 128, 0.15);
            border: 1px solid #f0c4df;
        }

        .label-top {
            display: inline-block;
            background: #fce0f1;
            color: #c21875;
            font-size: 10px;
            font-weight: bold;
            padding: 5px 9px;
            border-radius: 15px;
            margin-bottom: 8px;
        }

        h1 {
            margin: 0 0 10px;
            color: #c21875;
            font-size: 22px;
        }

        .description {
            font-size: 11px;
            color: #666;
            margin-bottom: 12px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #8e2168;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #e7b9d6;
            border-radius: 7px;
            padding: 10px;
            outline: none;
            background: #fff;
            color: #5b1648;
            font-size: 12px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #d81b82;
            box-shadow: 0 0 0 2px rgba(216, 27, 130, 0.08);
        }

        select {
            cursor: pointer;
        }

        textarea {
            height: 84px;
            resize: vertical;
        }

        fieldset {
            border: 1px solid #d9a9cb;
            border-radius: 8px;
            padding: 10px;
            margin: 5px 0 12px;
            background: #fff8fc;
        }

        legend {
            padding: 0 6px;
            font-size: 11px;
            font-weight: bold;
            color: #a51d70;
        }

        .option {
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #edd0e3;
            background: #fff;
            border-radius: 6px;
            padding: 7px 9px;
            margin-bottom: 5px;
            font-size: 11px;
            color: #652052;
        }

        .option:last-child {
            margin-bottom: 0;
        }

        .option input {
            width: auto;
            accent-color: #d81b82;
        }

        .buttons {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }

        button {
            border: none;
            border-radius: 7px;
            padding: 10px 14px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #d81b82, #a91468);
            color: white;
            box-shadow: 0 4px 10px rgba(216, 27, 130, 0.25);
        }

        .btn-secondary {
            background: #f9e4f2;
            color: #9c216e;
            border: 1px solid #ecc6dc;
        }

        button:hover {
            transform: translateY(-1px);
            opacity: 0.9;
        }

        .fasilitas {
            margin-top: 14px;
            padding: 10px 12px;
            border: 1px solid #dcaed0;
            border-left: 3px solid #d81b82;
            border-radius: 5px;
            background: #fff7fc;
        }

        .fasilitas-title {
            font-size: 11px;
            font-weight: bold;
            color: #9d216f;
            margin-bottom: 6px;
        }

        ul {
            margin: 0;
            padding-left: 18px;
            font-size: 10px;
            line-height: 1.8;
            color: #633052;
        }

        @media (max-width: 500px) {
            .row {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <span class="label-top">MILESTONE 6 • FORM LANJUTAN</span>

    <h1>Daftar Kursus</h1>

    <div class="description">
        Alur: landing page → form → proses PHP → ringkasan.
        Belum memakai database.
    </div>

    <form action="proses.php" method="POST">

        <!-- Nama dan Email -->
        <div class="row">
            <div class="form-group">
                <label>Nama lengkap</label>
                <input type="text" name="name" placeholder="">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="">
            </div>
        </div>

        <!-- Pilih Kursus -->
        <div class="form-group">
            <label>Pilih kursus</label>
            <select name="course_code">
                <option value="">-- Pilih kursus --</option>
                <option value="WEB">Web Development</option>
                <option value="UIUX">UI/UX Design</option>
                <option value="DB">Database</option>
                <option value="PROGRAMMING">Programming</option>
            </select>
        </div>

        <!-- Tipe Peserta -->
        <fieldset>
            <legend>Tipe peserta</legend>

            <label class="option">
                <input type="radio" name="participant_type" value="mahasiswa">
                Mahasiswa
            </label>

            <label class="option">
                <input type="radio" name="participant_type" value="guru">
                Guru
            </label>

            <label class="option">
                <input type="radio" name="participant_type" value="umum">
                Umum
            </label>
        </fieldset>

        <!-- Minat Belajar -->
        <fieldset>
            <legend>Minat belajar</legend>

            <label class="option">
                <input type="checkbox" name="interest[]" value="frontend">
                Frontend
            </label>

            <label class="option">
                <input type="checkbox" name="interest[]" value="backend">
                Backend
            </label>

            <label class="option">
                <input type="checkbox" name="interest[]" value="database">
                Database
            </label>

            <label class="option">
                <input type="checkbox" name="interest[]" value="uiux">
                UI/UX
            </label>
        </fieldset>

        <!-- Metode dan Paket -->
        <div class="row">
            <div class="form-group">
                <label>Metode belajar</label>
                <select name="learning_method">
                    <option value="">-- Pilih metode --</option>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah paket</label>
                <select name="package">
                    <option value="1">1 paket</option>
                    <option value="2">2 paket</option>
                    <option value="3">3 paket</option>
                    <option value="4">4 paket</option>
                </select>
            </div>
        </div>

        <!-- Catatan -->
        <div class="form-group">
            <label>Catatan tambahan</label>
            <textarea name="notes"></textarea>
        </div>

        <!-- Tombol -->
        <div class="buttons">
            <button type="submit" class="btn-primary">
                Proses Pendaftaran
            </button>

            <button type="button" class="btn-secondary">
                History Dummy
            </button>

            <button type="button" class="btn-secondary">
                Loop Lab
            </button>
        </div>

    </form>

    <!-- Fasilitas -->
    <div class="fasilitas">
        <div class="fasilitas-title">Fasilitas</div>

        <ul>
            <li>Modul digital</li>
            <li>Sertifikat penyelesaian</li>
            <li>Forum diskusi kelas</li>
        </ul>
    </div>

</div>

</body>
</html>
