<!DOCTYPE html>
<html>

<head>
    <title>Export Data Anggota</title>
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
    header("Content-Disposition: attachment; filename=Daftar Anggota (" . new_date() . ").xls");

    ?>

    <center>
        <h3>Data Anggota</h3>
        <p>Di export tanggal <?= new_date() ?></p>
    </center>

    <table border="1">
        <tr>
            <th>#</th>
            <th>ID Anggota</th>
            <th>ID Parent</th>
            <th>No. Anggota</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>No. KTP</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Kota/kabupaten</th>
            <th>Provinsi</th>
            <th>Kode Pos</th>
            <th>Pekerjaan</th>
            <th>Pendidikan</th>
            <th>Tanggal Bergabung</th>
            <th>Bank</th>
            <th>No. Rekening</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($anggota as $r) { ?>
            <tr>
                <td><?= $no; ?>.</td>
                <td><?= $r->id_anggota; ?></td>
                <td><?= $r->id_parent; ?></td>
                <td><?= $r->no_anggota; ?></td>
                <td><?= $r->username; ?></td>
                <td><?= $r->nama; ?></td>
                <td><?= $r->email; ?></td>
                <td><?= $r->tempat_lahir; ?></td>
                <td><?= $r->tanggal_lahir; ?></td>
                <td><?= $r->no_ktp; ?></td>
                <td><?= $r->no_hp; ?></td>
                <td><?= $r->alamat; ?></td>
                <td><?= $r->kecamatan; ?></td>
                <td><?= $r->kelurahan; ?></td>
                <td><?= $r->kota; ?></td>
                <td></td>
                <td></td>
                <td><?= $r->pekerjaan; ?></td>
                <td><?= $r->pendidikan; ?></td>
                <td><?= $r->join_date; ?></td>
                <td><?= $r->bank; ?></td>
                <td><?= $r->no_rekening; ?></td>
            </tr>
            <?php $no++; ?>
        <?php } ?>
    </table>
</body>

</html>