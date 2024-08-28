<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 50px;
        }
        .header {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 50px;
        }
        .content {
            margin-bottom: 30px;
        }
        .signature {
            text-align: right;
            margin-top: 100px;
        }
        .stamp {
            text-align: center;
            margin-top: 50px;
        }
    </style>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="header">
        {{ $title }}
    </div>
    <div class="content">
        <p>Yang bertanda tangan dibawah ini :</p>
        <p>Nama: .....................................................</p>
        <p>Tempat dan Tanggal Lahir: .....................................................</p>
        <p>Agama: .....................................................</p>
        <p>Alamat: .....................................................</p>
        <p>Dengan ini menyatakan sesungguhnya, bahwa saya tidak sedang terikat kontrak kerja dengan instansi/lembaga lain atau tidak berkedudukan sebagai Calon PNS, PNS, prajurit Tentara Nasional Indonesia, atau anggota Kepolisian Negara Republik Indonesia.</p>
        <p>Demikian pernyataan ini saya buat dengan sesungguhnya, dan saya bersedia dituntut di pengadilan serta bersedia menerima segala tindakan yang diambil oleh Instansi Pemerintah, apabila dikemudian hari terbukti pernyataan saya ini tidak benar.</p>
    </div>
    <div class="signature">
        <p>.................., .................. 2022</p>
        <p>Yang membuat pernyataan,</p>
        <br><br><br>
        <p>...........................................</p>
    </div>
    <div class="stamp">
        <p>Materai</p>
        <p>Rp. 10.000,-</p>
    </div>
</body>
</html>
