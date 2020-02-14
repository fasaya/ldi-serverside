<!DOCTYPE html>
<html>

<head>
    <title>Export Bagi Untung</title>
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
    header("Content-Disposition: attachment; filename=Bagi untung (" . new_date() . ").xls");

    ?>

    <center>
        <h3>Data Bagi Untung</h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Tanggal</th>
            <th>No. Anggota</th>
            <th>No. Ref Bagi Untung</th>
            <th>No. Ref Simpanan Sukarela</th>
            <th>Persen bagi untung</th>
            <th>Jumlah</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($bagiuntung as $r) { ?>
            <tr>
                <td><?= $no; ?>.</td>
                <td><?= $r->id_bagi_untung; ?></td>
                <td><?= $r->date; ?></td>
                <td><?= $r->no_anggota; ?></td>
                <td><?= $r->kode_tr_bu; ?></td>
                <td><?= $r->kode_tr_ss; ?></td>
                <td><?= $r->persen; ?></td>
                <td><?= $r->amount; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>