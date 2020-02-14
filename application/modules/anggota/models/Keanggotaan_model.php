<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keanggotaan_model extends CI_Model
{
    function anggota()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("id_parent, nama, no_anggota, join_date, status");
        $this->db->from("tb_anggota");
        $this->db->where("id_parent", $id_anggota);
        $this->db->where("status = '1'");
        $this->db->order_by("join_date", "DESC");
        return $this->db->get()->result();
    }

    function calonanggotadarireferral()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("nama, no_anggota, join_date, status");
        $this->db->where("id_parent", $id_anggota);
        $this->db->from("tb_anggota");
        $this->db->order_by("join_date", "DESC");
        return $this->db->get()->result();
    }

    function dataAnggota()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT username, nama, email
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        return $query->row_array();
    }

    function dataLengkapAnggota($no_anggota)
    {
        $query = $this->db->query(' SELECT no_anggota, username, nama, email, tempat_lahir, tanggal_lahir, no_ktp, no_hp, alamat, kecamatan, kelurahan, kota, provinsi, kode_pos, pekerjaan, pendidikan, join_date
                                    FROM tb_anggota 
                                    WHERE no_anggota = "' . $no_anggota . '" ');
        return $query->row_array();
    }

    // ##############################

    function daftarAnggotaBaru($data)
    {
        $biaya_admin = $this->Helper->setting('BIAYA_PENDAFTARAN');
        $balance_anggota = $this->Balance->total_balance();

        // Cek apabila saldo >= 25000
        if ($balance_anggota >= $biaya_admin) {

            $id_parent = $this->session->userdata('id_user');
            $currency = $this->Helper->setting('CURRENCY');
            $kode_tr_BP = $this->Helper->generate_kodeTR("BP");
            $kode_tr_BS = $this->Helper->generate_kodeTR("BS");
            $NO_ANGGOTA = $this->Helper->generate_NO_ANGGOTA();
            $date = new_date();

            //Start database transaction
            $this->db->trans_start();

            // Update
            $random = substr(md5(mt_rand()), 0, 5);
            $passHASH = password_hash($random, PASSWORD_BCRYPT);
            $data['pass_tr'] = $passHASH;
            $data['password'] = $passHASH;
            $data['id_parent'] = $id_parent;
            $data['no_anggota'] = $NO_ANGGOTA;
            $this->db->insert('tb_anggota', $data);
            $id_child = $this->db->insert_id();

            // biaya pendaftaran
            $data1 = array(
                'id_anggota' => $id_parent,
                'kode_tr' => $kode_tr_BP,
                'id_child' => $id_child,
                'amount' => $biaya_admin,
                'date' => $date
            );
            $this->db->insert('tb_biaya_pendaftaran', $data1);
            $id_daftar = $this->db->insert_id();
            // report transaksi pendaftaran
            $report_tr1 = array(
                'id_anggota' => $id_parent,
                'id' => $id_daftar,
                'kode_tr' => $kode_tr_BP,
                'debit' => $biaya_admin,
                'credit' => 0,
                'saldo' => $balance_anggota - $biaya_admin,
                'deskripsi' => "Membayar biaya pendaftaran [" . $NO_ANGGOTA . "]",
                'tipe' => "biaya_pendaftaran",
                'date' => $date
            );
            $this->db->insert('tb_report', $report_tr1);

            // bonus_sponsor
            // cek apabila parent betul terdaftar sbg anggota
            if ($id_parent != "0" || $id_parent != 0) { // jika didaftarkan melalui kode referral

                $balance_parent = $this->Balance->total_balance($id_parent);

                $nama = $this->Helper->getNoAnggotaById($id_child);
                $bs = $biaya_admin / 2;
                $data2 = array(
                    'kode_tr' => $kode_tr_BS,
                    'id_anggota' => $id_parent,
                    'id_child' => $id_child,
                    'amount' => $bs,
                    'date' => $date
                );
                $this->db->insert('tb_bonus_sponsor', $data2);
                $id_roy = $this->db->insert_id();
                // report transaksi bonus_sponsor
                $report_tr2 = array(
                    'id_anggota' => $id_parent,
                    'id' => $id_roy,
                    'kode_tr' => $kode_tr_BS,
                    'debit' => 0,
                    'credit' => $bs,
                    'deskripsi' => "Mendapatkan royalti referral dari anggota [" . $NO_ANGGOTA . "]",
                    'saldo' => $balance_parent + $bs,
                    'tipe' => "royalti_pendaftaran",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr2);
            }

            // report activity
            $report_act = array(
                'id_user' => $id_parent,
                'user' => "anggota",
                'keterangan' => "Mendaftarkan anggota [" . $NO_ANGGOTA . "]",
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
                        Error!
                        </div>'
                );
                redirect('anggota/keanggotaan/pendaftaran');
            } else {

                $this->load->helper('send_email_helper');
                $template['nama_penerima'] = $data['nama'];
                $template['username'] = $data['username'];
                $template['pass'] = $random;
                $template['pass_tr'] = $random;
                $email['pesan'] = $this->template_email_daftarAnggotaBaru($template);
                $email['email'] = $data['email'];
                $email['subjek'] = "Pendaftaran sukses!";
                $msg = send_email($email);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pendaftaran Berhasil. ' . $msg . '
                        </div>'
                );
                redirect('anggota/dashboard');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Saldo Anda tidak cukup untuk membayar biaya administrasi. Silahkan melakukan <a href="' . base_url() . 'anggota/deposit">deposit</a> terlebih dahulu.
                    </div>'
            );
            redirect('anggota/keanggotaan/pendaftaran');
        }
    }

    function daftarAnggotaBaruReferral($no_anggota, $data)
    {
        $biaya_admin = $this->Helper->setting('BIAYA_PENDAFTARAN');
        $balance_anggota = $this->Balance->total_balance();

        // Cek apabila saldo >= 25000
        if ($balance_anggota >= $biaya_admin) {

            $id_parent = $this->session->userdata('id_user');
            $currency = $this->Helper->setting('CURRENCY');
            $kode_tr_BP = $this->Helper->generate_kodeTR("BP");
            $kode_tr_BS = $this->Helper->generate_kodeTR("BS");
            $date = new_date();

            //Start database transaction
            $this->db->trans_start();

            // Update

            $random = substr(md5(mt_rand()), 0, 5);
            $passHASH = password_hash($random, PASSWORD_BCRYPT);
            $data['pass_tr'] = $passHASH;
            $data['password'] = $passHASH;

            $this->db->update('tb_anggota', $data, "no_anggota = '" . $no_anggota . "'");

            $query = $this->db->query(' SELECT id_anggota, username, email
                                    FROM tb_anggota 
                                    WHERE no_anggota = "' . $no_anggota . '" ');
            $result = $query->row_array();
            $id_child = $result['id_anggota'];
            $username = $result['username'];
            $alamat_email = $result['email'];

            // biaya pendaftaran
            $data1 = array(
                'id_anggota' => $id_parent,
                'kode_tr' => $kode_tr_BP,
                'id_child' => $id_child,
                'amount' => $biaya_admin,
                'date' => $date
            );
            $this->db->insert('tb_biaya_pendaftaran', $data1);
            $id_daftar = $this->db->insert_id();
            // report transaksi pendaftaran
            $report_tr1 = array(
                'id_anggota' => $id_parent,
                'id' => $id_daftar,
                'kode_tr' => $kode_tr_BP,
                'debit' => $biaya_admin,
                'credit' => 0,
                'saldo' => $balance_anggota - $biaya_admin,
                'deskripsi' => "Membayar biaya pendaftaran [" . $no_anggota . "]",
                'tipe' => "biaya_pendaftaran",
                'date' => $date
            );
            $this->db->insert('tb_report', $report_tr1);

            // bonus_sponsor
            // cek apabila parent betul terdaftar sbg anggota
            if ($id_parent != "0" || $id_parent != 0) { // jika didaftarkan melalui kode referral

                $balance_parent = $this->Balance->total_balance($id_parent);

                $nama = $this->Helper->getNoAnggotaById($id_child);
                $bs = $biaya_admin / 2;
                $data2 = array(
                    'kode_tr' => $kode_tr_BS,
                    'id_anggota' => $id_parent,
                    'id_child' => $id_child,
                    'amount' => $bs,
                    'date' => $date
                );
                $this->db->insert('tb_bonus_sponsor', $data2);
                $id_roy = $this->db->insert_id();
                // report transaksi bonus_sponsor
                $report_tr2 = array(
                    'id_anggota' => $id_parent,
                    'id' => $id_roy,
                    'kode_tr' => $kode_tr_BS,
                    'debit' => 0,
                    'credit' => $bs,
                    'deskripsi' => "Mendapatkan royalti referral dari anggota [" . $no_anggota . "]",
                    'saldo' => $balance_parent + $bs,
                    'tipe' => "royalti_pendaftaran",
                    'date' => $date
                );
                $this->db->insert('tb_report', $report_tr2);
            }

            // report activity
            $report_act = array(
                'id_user' => $id_parent,
                'user' => "anggota",
                'keterangan' => "Mendaftarkan anggota [" . $no_anggota . "]",
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
                        Error!
                        </div>'
                );
                redirect('anggota/keanggotaan/pendaftaranreferral');
            } else {
                $this->load->helper('send_email_helper');
                $template['nama_penerima'] = $data['nama'];
                $template['username'] = $username;
                $template['pass'] = $random;
                $template['pass_tr'] = $random;
                $email['pesan'] = $this->template_email_daftarAnggotaBaru($template);
                $email['email'] = $alamat_email;
                $email['subjek'] = "Pendaftaran sukses!";
                $msg = send_email($email);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Pendaftaran ' . $alamat_email . ' sukses. ' . $msg . '
                        </div>'
                );
                redirect('anggota/dashboard');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Saldo Anda tidak cukup untuk membayar biaya administrasi. Silahkan melakukan <a href="' . base_url() . 'anggota/deposit">deposit</a> terlebih dahulu.
                    </div>'
            );
            redirect('anggota/keanggotaan/pendaftaranreferral');
        }
    }

    // ###############################################

    private function template_email_daftarAnggotaBaru($data = "")
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
                    Registrasi akun Lentera Digital Indonesia berhasil.
                </div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
                                        <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Registrasi Sukses</h1>
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
                                        <p style="margin: 0;">' . $data['nama_penerima'] . ', selamat bergabung di ' . $webname . '! Terima kasih telah melakukan registrasi.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;">Berikut data login Anda:</p>
                                        <p style="margin: 0;"><strong>
                                        Username: ' . $data['username'] . '<br>
                                        Password: ' . $data['pass'] . '<br>
                                        Password Transaksi: ' . $data['pass_tr'] . '<strong><br><br>
                                        Anda dapat mengubah password dan password transaksi akun anda.
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
} //end model
