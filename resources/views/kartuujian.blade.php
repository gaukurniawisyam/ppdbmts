<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Ujian Semester Ganjil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .card {
            width: 600px;
            border: 2px solid #000;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .kop-surat img {
            width: 60px;
            vertical-align: middle;
            margin-left: 20px;
            margin-right: 20px;
        }

        .kop-surat h1, .kop-surat h2, .kop-surat h3 {
            margin: 0;
            font-weight: normal;
        }

        .kop-surat h1 {
            font-size: 20px;
        }

        .kop-surat h2 {
            font-size: 18px;
        }

        .kop-surat h3 {
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 18px;
            margin: 0;
        }

        .header h3 {
            font-size: 16px;
            margin: 5px 0;
        }

        .content {
            margin-bottom: 20px;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .content table td {
            padding: 5px;
            vertical-align: top;
        }

        .note {
            font-weight: bold;
            text-align: center;
            color: red;
        }

        .footer {
            text-align: right;
        }

        .footer p {
            margin: 0;
        }

        .footer .sign {
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="kop-surat">
            <img src="https://via.placeholder.com/60" alt="Logo 1">
            <div style="display:inline-block; text-align:left;">
                <h1>YAYASAN LOREM IPSUM</h1>
                <h4>MADRASAH TSANAWIYAH DDI BOWONG CINDEA BUNGORO</h4>
                <h3>Jl. Lorem Ipsum</h3>
            </div>
            <img src="https://via.placeholder.com/60" alt="Logo 2">
        </div>
        <div class="header">
            <h2>KARTU PESERTA SELEKSI</h2>
            <h3>PPDB MTs DDI Bowong Cindea</h3>
            <h3></h3>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: [Nama Siswa]</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>: [NISN]</td>
                </tr>
                <tr>
                    <td>Tanggal Ujian</td>
                    <td>: [Tanggal Ujian]</td>
                </tr>
                <tr>
                    <td>Sesi</td>
                    <td>: [Sesi]</td>
                </tr>
            </table>
            <p class="note">NB: KARTU UJIAN DIBAWA SELAMA SELEKSI BERLANGSUNG</p>
            <p class="note">SESI 1 : 07:30-08:30, SESI 2 : 09:00-11:00 </p>
        </div>
        <div class="footer">
            <p></p>
            <p>Kepala Madrasah</p>
            <div class="sign">[Tanda Tangan]</div>
            <p>Erna.S.Pd</p>
        </div>
    </div>
</body>
</html>
