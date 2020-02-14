<!DOCTYPE html>
<html>

<head>
    <title>Export Semua Simpanan yg sudah Ditransfer</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Simpanan ke saldo(" . new_date() . ").xls");

    ?>

    <center>
        <h3>Semua Simpanan yg sudah Ditransfer ke saldo</h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>No. Anggota</th>
            <th>Nama Anggota</th>
            <th>No. Ref Transfer</th>
            <th>No. Ref Simpanan</th>
            <th>Jumlah</th>
            <th>Tipe</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($simpanan as $r) { ?>
            <?php
            $kode = $r->tipe;
            if ($kode == "SW") {
                $desc = "Simpanan wajib";
            } elseif ($kode == "SP") {
                $desc = "Simpanan pokok";
            } elseif ($kode == "SS") {
                $desc = "Simpanan sukarela";
            }
            ?>
            <tr>
                <td><?= $no; ?>.</td>
                <td><?= $r->no_anggota; ?></td>
                <td><?= $r->nama; ?></td>
                <td><?= $r->kode_tr; ?></td>
                <td><?= $r->kode_tr_simp; ?></td>
                <td><?= $r->amount; ?></td>
                <td><?= $desc; ?></td>
                <td><?= $r->date; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>