<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman_model extends CI_Model
{

    function get_permohonan()
    {
        $this->db->select("tb_anggota.no_anggota, tb_pinjaman.id_pinjaman, tb_pinjaman.kode_tr, tb_pinjaman.amount, tb_pinjaman.bunga, tb_pinjaman.periode, tb_pinjaman.angsuran, tb_pinjaman.date, tb_pinjaman.status");
        $this->db->from("tb_pinjaman, tb_anggota");
        $this->db->where("tb_pinjaman.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_pinjaman.status = '0'");
        $this->db->order_by("tb_pinjaman.date", "DESC");
        return $this->db->get()->result();
    }

    function get_pinjaman_sudah_bayar()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("tb_pinjaman_bayar.kode_tr AS kode_pb, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.tgl_bayar, tb_pinjaman_bayar.angsuran_ke, tb_pinjaman_bayar.date, tb_pinjaman_bayar.status, tb_pinjaman.kode_tr AS kode_pj, tb_anggota.no_anggota, tb_anggota.nama");
        $this->db->from("tb_pinjaman, tb_pinjaman_bayar, tb_anggota");
        $this->db->where("tb_pinjaman.id_pinjaman = tb_pinjaman_bayar.id_pinjaman");
        $this->db->where("tb_pinjaman.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_pinjaman_bayar.status", "1");
        $this->db->order_by("tb_pinjaman_bayar.tgl_bayar", "ASC");
        return $this->db->get()->result();
    }

    function get_semua_pinjaman()
    {
        $this->db->select("tb_anggota.no_anggota, tb_pinjaman.id_pinjaman, tb_pinjaman.kode_tr, tb_pinjaman.amount, tb_pinjaman.bunga, tb_pinjaman.periode, tb_pinjaman.angsuran, tb_pinjaman.date, tb_pinjaman.status");
        $this->db->from("tb_pinjaman, tb_anggota");
        $this->db->where("tb_pinjaman.id_anggota = tb_anggota.id_anggota");
        $this->db->order_by("tb_pinjaman.date", "DESC");
        return $this->db->get()->result();
    }

    function get_detail_pinjaman($id_pinjaman)
    {
        $this->db->select("tb_anggota.no_anggota, tb_pinjaman_bayar.amount, tb_pinjaman_bayar.angsuran_ke, tb_pinjaman_bayar.date, tb_pinjaman_bayar.status, tb_pinjaman_bayar.kode_tr");
        $this->db->from("tb_pinjaman_bayar, tb_pinjaman, tb_anggota");
        $this->db->where("tb_pinjaman_bayar.id_pinjaman = tb_pinjaman.id_pinjaman");
        $this->db->where("tb_pinjaman.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_pinjaman_bayar.id_pinjaman", $id_pinjaman);
        $this->db->order_by("tb_pinjaman_bayar.date", "DESC");
        return $this->db->get()->result();
    }

    function get_ket_pinjaman()
    {
        $this->db->select("id_setting_pinjaman, jangka_waktu, bunga");
        $this->db->where("status = '1'");
        $this->db->from("pinjaman");
        $this->db->order_by("jangka_waktu", "ASC");
        return $this->db->get()->result();
    }

    function dataPinjaman($kode_tr)
    {
        $query = $this->db->query(' SELECT id_anggota, kode_tr, amount, bunga, periode, angsuran, keterangan, date
                                    FROM tb_pinjaman
                                    WHERE kode_tr = "' . $kode_tr . '" ');
        return $query->row_array();
    }

    function dataAnggota($id_anggota)
    {
        $query = $this->db->query(' SELECT nama, no_anggota
                                    FROM tb_anggota
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        return $query->row_array();
    }

    // ############################################

    function update_permohonan($data)
    {
        $id_pinjaman = $data['id_pinjaman'];
        $status = $data['status'];
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT id_anggota, kode_tr, amount, bunga, periode, angsuran
                                    FROM tb_pinjaman 
                                    WHERE id_pinjaman = "' . $id_pinjaman . '" AND status = "0"');
        $result = $query->row_array();
        $kode_tr_PJ = $result['kode_tr'];
        $currency = $this->Helper->setting('CURRENCY');
        $date = new_date();
        $amount = $result['amount'];

        if ($status == "1") {

            if ($query->num_rows() > 0) {

                $id_anggota = $result['id_anggota'];
                $kode_tr_PB = $this->Helper->generate_kodeTR("PB");
                $balance = $this->Balance->total_balance($id_anggota);

                $bunga_persen = $result['bunga'];
                $periode = $result['periode'];
                $angsuran = $result['angsuran'];
                $bunga = (int) $amount * ($bunga_persen / 100);

                //Start database transaction
                $this->db->trans_start();

                $update = [
                    'jumlah_bunga' => $bunga * $periode,
                    'start_date' => $date,
                    'status' => $status
                ];
                $this->db->update('tb_pinjaman', $update, "id_pinjaman = '" . $id_pinjaman . "'");

                $hari = ($periode * 30) / $angsuran; // kali 30 hari
                $tgl_bayar = date("Y-m-d H:i:s", strtotime("+" . $hari . " day", strtotime($date)));

                for ($no = 1; $no <= $angsuran; $no++) {
                    if ($no < $angsuran) {

                        //insert into table
                        $data0 = [
                            'kode_tr' => $this->Helper->generate_kodeTR("PB"),
                            'id_pinjaman' => $id_pinjaman,
                            'amount' => $bunga,
                            'angsuran_ke' => $no,
                            'date' => $tgl_bayar,
                            'status' => "0"
                        ];
                        $this->db->insert('tb_pinjaman_bayar', $data0);
                    } else {
                        //insert into table
                        $data0 = [
                            'kode_tr' => $this->Helper->generate_kodeTR("PB"),
                            'id_pinjaman' => $id_pinjaman,
                            'amount' => $amount + $bunga,
                            'angsuran_ke' => $no,
                            'date' => $tgl_bayar,
                            'status' => "0"
                        ];
                        $this->db->insert('tb_pinjaman_bayar', $data0);
                    }

                    $tgl_bayar =  date("Y-m-d H:i:s", strtotime("+" . $hari . " day", strtotime($tgl_bayar)));
                }

                // report transaksi
                $report_tr1 = array(
                    'id_anggota' => $id_anggota,
                    'id' => $id_pinjaman,
                    'kode_tr' => $kode_tr_PJ,
                    'debit' => 0,
                    'credit' => $amount,
                    'saldo' => $balance + $amount,
                    'deskripsi' => "Pinjaman [" . $kode_tr_PJ . "] telah disetujui",
                    'tipe' => "pinjaman_disetujui",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr1);

                // report activity
                $report_act = array(
                    'id_user' => $id_pengurus,
                    'user' => "pengurus",
                    'keterangan' => "Menyetujui Pinjaman [" . $kode_tr_PJ . "] senilai " . $currency . " " . rupiah($amount),
                    'date' => $date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pinjaman [' . $kode_tr_PJ . '] berhasil disetujui.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/pinjaman/permohonan');
            }
        } elseif ($status == "9") {
            $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_pinjaman 
                                    WHERE id_pinjaman = "' . $id_pinjaman . '" AND status = "0"');
            if ($query->num_rows() > 0) {
                $result_id_angg = $query->row_array();
                $id_anggota = $result_id_angg['id_anggota'];

                $query_email = $this->db->query(' SELECT email, nama
                                                    FROM tb_anggota
                                                    WHERE id_anggota = "' . $id_anggota . '"');
                $result_email = $query_email->row_array();
                $email_penerima = $result_email['email'];
                // $nama_penerima = $result_email['nama'];
                //Start database transaction
                $this->db->trans_start();

                $update = [
                    'status' => $status
                ];
                $this->db->update('tb_pinjaman', $update, "id_pinjaman = '" . $id_pinjaman . "'");

                // report activity
                $report_act = array(
                    'id_user' => $id_pengurus,
                    'user' => "pengurus",
                    'keterangan' => "Menolak Pinjaman [" . $kode_tr_PJ . "] senilai " . $currency . " " . rupiah($amount),
                    'date' => $date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                } else {
                    $this->load->helper('send_email_helper');
                    $template['kode_tr'] = $kode_tr_PJ;
                    $template['nilai'] =  $currency . " " . rupiah($amount);
                    $email['pesan'] = $this->template_email_pinjaman_ditolak($template);
                    $email['email'] = $email_penerima;
                    $email['subjek'] = "Pengajuan pinjaman anda ditolak";
                    $msg = send_email($email);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pinjaman [' . $kode_tr_PJ . '] ditolak. ' . $msg . '
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/pinjaman/permohonan');
            }
        }
    }

    // ############################################

    private function template_email_pinjaman_ditolak($data = "")
    {
        if ($data != "") {
            $no_tlp = $this->Helper->setting_web('NOTLP');
            $website = $this->Helper->setting_web('WEBSITE');
            $webname = $this->Helper->setting_web('WEBNAME');
            $email_cs = $this->Helper->setting_web('CS');

            $pesan = '<!DOCTYPE html>
            <html>
            
            <head>
            
                <meta charset="utf-8">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <title>Password Reset</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style type="text/css">
                    /**
               * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
               */
                    @media screen {
                        @font-face {
                            font-family: "Source Sans Pro";
                            font-style: normal;
                            font-weight: 400;
                            src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
                        }
            
                        @font-face {
                            font-family: "Source Sans Pro";
                            font-style: normal;
                            font-weight: 700;
                            src: local("Source Sans Pro Bold"), local("Source Sans Pro Bold"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
                        }
                    }
            
                    /**
               * Avoid browser level font resizing.
               * 1. Windows Mobile
               * 2. iOS / OSX
               */
                    body,
                    table,
                    td,
                    a {
                        -ms-text-size-adjust: 100%;
                        /* 1 */
                        -webkit-text-size-adjust: 100%;
                        /* 2 */
                    }
            
                    /**
               * Remove extra space added to tables and cells in Outlook.
               */
                    table,
                    td {
                        mso-table-rspace: 0pt;
                        mso-table-lspace: 0pt;
                    }
            
                    /**
               * Better fluid images in Internet Explorer.
               */
                    img {
                        -ms-interpolation-mode: bicubic;
                    }
            
                    /**
               * Remove blue links for iOS devices.
               */
                    a[x-apple-data-detectors] {
                        font-family: inherit !important;
                        font-size: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                        color: inherit !important;
                        text-decoration: none !important;
                    }
            
                    /**
               * Fix centering issues in Android 4.4.
               */
                    div[style*="margin: 16px 0;"] {
                        margin: 0 !important;
                    }
            
                    body {
                        width: 100% !important;
                        height: 100% !important;
                        padding: 0 !important;
                        margin: 0 !important;
                    }
            
                    /**
               * Collapse table borders to avoid space between cells.
               */
                    table {
                        border-collapse: collapse !important;
                    }
            
                    a {
                        color: #1a82e2;
                    }
            
                    img {
                        height: auto;
                        line-height: 100%;
                        text-decoration: none;
                        border: 0;
                        outline: none;
                    }
                </style>
            
            </head>
            
            <body style="background-color: #fff2cb;">
            
                <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
                    Permohonan pengajuan pinjaman Anda ditolak.
                </div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
                                        <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Permohonan pinjaman ditolak</h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;">
                                        Mohon maaf, permintaan pengajuan pinjaman Anda dengan no. ref [' . $data['kode_tr'] . '] senilai ' . $data['nilai'] . ' ditolak.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #ffc107">
                                        <p style="margin: 0;">Salam,<br> Team ' . $webname . '</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff2cb" style="padding: 24px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="center" bgcolor="#fff2cb" style="padding: 12px 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                                        <p style="margin: 0;">Hubungi kami:
                                            <br>' . $no_tlp . ' | <a href="mailto:' . $email_cs . '" style="text-decoration: none; color: #fff">' . $email_cs . '</a>
                                            <br><a href="' . $website . '" style="text-decoration: none; color: #fff">' . $website . '</a></p>
                                    </td>
                                </tr>
            
                            </table>
                        </td>
                    </tr>
            
                </table>
            
            </body>
            
            </html>';

            return $pesan;
        }
    }

    private function update_permohonan_lama($data)
    {
        $id_pinjaman = $data['id_pinjaman'];
        $status = $data['status'];
        $id_pengurus = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT id_anggota, kode_tr, amount, bunga, periode, angsuran
                                    FROM tb_pinjaman 
                                    WHERE id_pinjaman = "' . $id_pinjaman . '" AND status = "0"');
        $result = $query->row_array();
        $kode_tr_PJ = $result['kode_tr'];
        $currency = $this->Helper->setting('CURRENCY');
        $date = new_date();

        if ($status == "1") {

            if ($query->num_rows() > 0) {

                $id_anggota = $result['id_anggota'];
                $kode_tr_PB = $this->Helper->generate_kodeTR("PB");
                $balance = $this->Balance->total_balance($id_anggota);

                $amount = $result['amount'];
                $bunga_persen = $result['bunga'];
                $periode = $result['periode'];
                $angsuran = $result['angsuran'];
                $bunga = (int) $amount * ($bunga_persen / 100);

                //Start database transaction
                $this->db->trans_start();

                $update = [
                    'jumlah_bunga' => $bunga * $periode,
                    'start_date' => $date,
                    'status' => $status
                ];
                $this->db->update('tb_pinjaman', $update, "id_pinjaman = '" . $id_pinjaman . "'");

                $nilai_angsuran = (int) ($amount + ($bunga * $periode)) / $angsuran;
                $hari = ($periode * 30) / $angsuran; // kali 30 hari
                $tgl_bayar = date("Y-m-d H:i:s", strtotime("+" . $hari . " day", strtotime($date)));

                for ($no = 1; $no <= $angsuran; $no++) {
                    $h1 = (int) ((int) $nilai_angsuran * $angsuran);
                    $h2 = (int) ($amount + ($bunga * $periode));
                    if ($h1 == $h2) {

                        //insert into table
                        $data0 = [
                            'kode_tr' => $this->Helper->generate_kodeTR("PB"),
                            'id_pinjaman' => $id_pinjaman,
                            'amount' => $nilai_angsuran,
                            'angsuran_ke' => $no,
                            'date' => $tgl_bayar,
                            'status' => "0"
                        ];
                        $this->db->insert('tb_pinjaman_bayar', $data0);
                    } else {
                        if ($no == $angsuran) {
                            $h3 = (int) ($amount + ($bunga * $periode));
                            $h4 = (int) ((int) $nilai_angsuran * $angsuran);
                            $nilai_angsuran2 = (int) $nilai_angsuran + ($h3 - $h4);
                            //insert into table
                            $data0 = [
                                'kode_tr' => $this->Helper->generate_kodeTR("PB"),
                                'id_pinjaman' => $id_pinjaman,
                                'amount' => $nilai_angsuran2,
                                'angsuran_ke' => $no,
                                'date' => $tgl_bayar,
                                'status' => "0"
                            ];
                            $this->db->insert('tb_pinjaman_bayar', $data0);
                        } else {
                            //insert into table
                            $data0 = [
                                'kode_tr' => $this->Helper->generate_kodeTR("PB"),
                                'id_pinjaman' => $id_pinjaman,
                                'amount' => $nilai_angsuran,
                                'angsuran_ke' => $no,
                                'date' => $tgl_bayar,
                                'status' => "0"
                            ];
                            $this->db->insert('tb_pinjaman_bayar', $data0);
                        }
                    }

                    $tgl_bayar =  date("Y-m-d H:i:s", strtotime("+" . $hari . " day", strtotime($tgl_bayar)));
                }

                // report transaksi
                $report_tr1 = array(
                    'id_anggota' => $id_anggota,
                    'id' => $id_pinjaman,
                    'kode_tr' => $kode_tr_PJ,
                    'debit' => 0,
                    'credit' => $amount,
                    'saldo' => $balance + $amount,
                    'deskripsi' => "Pinjaman [" . $kode_tr_PJ . "] telah disetujui",
                    'tipe' => "pinjaman_disetujui",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr1);

                // report activity
                $report_act = array(
                    'id_user' => $id_pengurus,
                    'user' => "pengurus",
                    'keterangan' => "Menyetujui Pinjaman [" . $kode_tr_PJ . "] senilai " . $currency . " " . rupiah($amount),
                    'date' => $date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pinjaman [' . $kode_tr_PJ . '] berhasil disetujui.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/pinjaman/permohonan');
            }
        } elseif ($status == "9") {
            $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_pinjaman 
                                    WHERE id_pinjaman = "' . $id_pinjaman . '" AND status = "0"');
            if ($query->num_rows() > 0) {

                //Start database transaction
                $this->db->trans_start();

                $update = [
                    'status' => $status
                ];
                $this->db->update('tb_pinjaman', $update, "id_pinjaman = '" . $id_pinjaman . "'");

                // report activity
                $report_act = array(
                    'id_user' => $id_pengurus,
                    'user' => "pengurus",
                    'keterangan' => "Menolak Pinjaman [" . $kode_tr_PJ . "] senilai " . $currency . " " . rupiah($amount),
                    'date' => $date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pinjaman [' . $kode_tr_PJ . '] ditolak.
                        </div>'
                    );
                    redirect('pengurus/pinjaman/permohonan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('pengurus/pinjaman/permohonan');
            }
        }
    }
} //end model
