<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Kas</title>
    <!-- <link rel="stylesheet" href=""> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td width="70px" align="left" valign="middle">
                <img src="<?= base_url() ?>assets/img/himatif-logo.png" style="width: 60px; height: auto;">
            </td>
            <td align="left">
                <span style="line-height: 1.6; font-weight: bold;">
                    HIMPUNAN MAHASISWA TEKNIK INFORMATIKA
                    <br>SEKOLAH TINGGI TEKNOLOGI BANDUNG
                    <br>PERIODE 2018/2019
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <!-- <p align="center">
        LAPORAN BULNANAN <br>
        <b>Periode Januari</b>
    </p> -->
    <table style="width: 100%;" rules="all">
        <thead align="center">
            <tr>
                <th style="width: 20px;">#</th>
                <th style="width: 150px;">Nama</th>
                <th style="width: 70px;">Bulan</th>
                <th style="width: 70px;">Tahun</th>
                <th>Nominal (Rp)</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($row->result() as $key => $data) : ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td style="text-align: left;"><?= ucfirst($data->user_id); ?></td>
                    <td><?= $data->bulan_name; ?></td>
                    <td><?= $data->tahun; ?></td>
                    <td><?= number_format($data->nominal); ?></td>
                    <td><?= $data->created_at; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th colspan="3"><i>Jumlah</i></th>
                <th>Rp. <?= number_format($sum_jumlah->jumlah); ?></th>
                <th>Created</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>