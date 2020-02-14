<!DOCTYPE html>
<html>

<head>
    <title>Export Data Withdraw</title>
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
    header("Content-Disposition: attachment; filename=Data Withdraw (" . new_date() . ").xls");

    ?>

    <center>
        <h3>Data Withdraw</h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Biaya Admin</th>
            <th>Total Withdraw</th>
            <th>Transfer ke</th>
            <th>Tanggal</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($withdraw as $r) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r->no_anggota ?></td>
                <td><?= $r->nama ?></td>
                <td><?= $r->amount; ?></td>
                <td><?= $r->biaya_admin; ?></td>
                <td><?= $r->amount_request; ?></td>
                <td><?= $r->gateway; ?> - <?= $r->no_rek; ?></td>
                <td><?= $r->date; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>