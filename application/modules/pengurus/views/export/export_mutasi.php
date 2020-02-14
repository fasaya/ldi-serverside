<!DOCTYPE html>
<html>

<head>
    <title>Export Mutasi Anggota (<?= $title; ?>)</title>
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
    header("Content-Disposition: attachment; filename=Mutasi (" . $title . ").xls");

    ?>

    <center>
        <h3>Mutasi Anggota<br /> (<?= $title; ?>)</h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>No. Anggota</th>
            <th>No. Ref</th>
            <th>Debit</th>
            <th>Kredit</th>
            <th>Saldo</th>
            <th>Detail</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($mutasi as $r) { ?>
            <tr>
                <td><?= $no; ?>.</td>
                <td><?= $r->date; ?></td>
                <td><?= $r->no_anggota; ?></td>
                <td><?= $r->kode_tr; ?></td>
                <td><?= $r->debit; ?></td>
                <td><?= $r->credit; ?></td>
                <td><?= $r->saldo; ?></td>
                <td><?= $r->deskripsi; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>