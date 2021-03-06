<!DOCTYPE html>
<html>

<head>
    <title>Export Semua <?= $title ?></title>
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
    header("Content-Disposition: attachment; filename=" .  $title . " (" . new_date() . ").xls");

    ?>

    <center>
        <h3>Semua <?= $title ?></h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>No. Anggota</th>
            <th>Nama Anggota</th>
            <th>No. Ref</th>
            <th>Jumlah</th>
            <th>Transfer</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($simpanan as $r) { ?>
            <?php
            if ($r->is_in_saldo == "1") {
                $trf = "Ya";
            } else {
                $trf = "-";
            }
            ?>
            <tr>
                <td><?= $no; ?>.</td>
                <td><?= $r->no_anggota; ?></td>
                <td><?= $r->nama; ?></td>
                <td><?= $r->kode_tr; ?></td>
                <td><?= $r->amount; ?></td>
                <td><?= $trf; ?></td>
                <td><?= $r->date; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>