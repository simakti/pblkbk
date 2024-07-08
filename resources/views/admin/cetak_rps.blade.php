html
<! DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Berita Acara RPS</title>
        <style>
            .header-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .header-table,
            .header-table td,
            .header-table th {
                border: 1px solid black;
            }

            .header-table td,
            .header-table th {
                padding: 8px;
                text-align: center;
            }

            .header-logo {
                width: 100px;
            }

            .header-title {
                font-size: 16px;
                font-weight: bold;
            }

            body {
                font-family: 'Times New Roman', Times, serif;
                margin: 0.5cm 1.5cm 1cm 1.5cm;
            }

            .title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .details {
                margin-top: 15px;
                margin-bottom: 20px;
            }

            .details p {
                margin: 0;
                line-height: 1.6;
            }

            .details .label {
                font-weight: bold;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                page-break-inside: auto;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                vertical-align: top;
            }

            .table-info th {
                text-align: center;
            }

            .signatures {
                display: flex;
                justify-content: space-between;
                margin-top: 40px;
                page-break-inside: avoid;
            }

            .signatures table {
                border: none;
            }

            .signatures .left,
            .signatures .right {
                width: 50%;
                text-align: center;
                border: none;
                page-break-inside: avoid;
            }

            .signatures .center {
                width: 100%;
                text-align: center;
                margin-top: 20px;
                page-break-inside: avoid;
            }

            .signatures .center p {
                margin-bottom: 60px;
                page-break-after: avoid;
            }

            .kepala {
                margin: 0;
                padding: 0;
                width: 100%;
                border-spacing: 0;
            }

            .kepala td {
                padding: 0;
            }
        </style>
    </head>

    <body>
        <div class="kepala">
            <table class="header-table">
                <tr>
                    <td rowspan="2"><img
                            src="https://th.bing.com/th/id/OIP.gys9HQ3QdfNcnJPEz6O85wHaHa?rs=1&pid=ImgDetMain"
                            alt="Logo PNP" class="header-logo">
                    </td>
                    <td class="header-title">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</td>
                </tr>
                <tr>
                    <td class="header-title">POLITEKNIK NEGERI PADANG</td>
                </tr>
                <tr>
                    <td colspan="2" class="header-title">PUSAT PENINGKATAN DAN PENGEMBANGAN AKTIVITAS INSTRUKSIONAL
                        (P3AI)</td>
                </tr>
                <tr>
                    <td colspan="2">FORMULIR</td>
                </tr>
                <tr>
                    <td colspan="2">VERIFIKASI RENCANA PEMBELAJARAN SEMESTER</td>
                </tr>
                <tr>
                    <td colspan="2">JURUSAN : TEKNOLOGI INFORMASI PROGRAM STUDI : TRPL</td>
                </tr>
            </table>
        </div>

        <div class="details">
            <p>Telah dilaksanakan rapat Peninjauan materi RPS bersama KBK dan Kaprodi yang dilaksanakan pada :</p>
            <p>Hari / Tanggal : Selasa / 14 Februari 2023</p>
            <p>Tempat : Ruang TUK / E305</p>
            <p>Dengan hasil sebagai berikut :</p>
        </div>

        <table>
            <thead>
                <tr class="table-info">
                    <th>No</th>
                    <th>Semester</th>
                    <th>Nama Matkul</th>
                    <th>Evaluasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_verif_rps as $index => $data)
                    <tr class="table-Light">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->repoRps->matakuliah->semester }}</td>
                        <td>{{ $data->repoRps->matakuliah->nama_matakuliah }}</td>
                        <td>{{ $data->catatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="signatures">
            <table style="width: 100%;">
                <tr>
                    <td class="left">
                        <p>Kaprodi</p>
                        <br><br><br><br>
                        <p>Meri Azmi, S.T., M.Sc</p>
                    </td>
                    <td class="right">
                        <p>Ketua KBK</p>
                        <br><br><br><br>
                        <p>Yulherniwati, S.Kom., M.T</p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="signatures">
            <div class="center">
                <p>Mengetahui,</p>
                <br><br><br><br>
                <p>Ronal Hadi, S.T., M.Kom</p>
            </div>
        </div>

    </body>

    </html>
