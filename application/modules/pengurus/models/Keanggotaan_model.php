<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keanggotaan_model extends CI_Model
{
    function anggota($status = "1")
    {
        $this->db->select("username, nama, no_anggota, join_date, status, is_active, email, id_parent");
        $this->db->where("status", $status);
        $this->db->from("tb_anggota");
        $this->db->order_by("join_date", "DESC");
        return $this->db->get()->result();
    }

    function calonanggotadarireferral()
    {
        $this->db->select("nama, no_anggota, join_date, status");
        $this->db->where("id_parent", "0");
        $this->db->from("tb_anggota");
        $this->db->order_by("join_date", "DESC");
        return $this->db->get()->result();
    }

    function mutasi_anggota($id_anggota)
    {
        $this->db->select("kode_tr, debit, credit, saldo, deskripsi, date");
        $this->db->where("id_anggota", $id_anggota);
        $this->db->from("tb_report");
        $this->db->order_by("date", "DESC");
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

    function dataLengkapAnggota($id_anggota)
    {
        $query = $this->db->query(' SELECT no_anggota, username, nama, email, tempat_lahir, tanggal_lahir, no_ktp, no_hp, alamat, kecamatan, kelurahan, kota, provinsi, kode_pos, pekerjaan, jabatan, perusahaan, alamat_perusahaan, kota_perusahaan, pendidikan, join_date, is_active
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        return $query->row_array();
    }

    function semuaTransaksi()
    {
        $this->db->select("tb_anggota.no_anggota, tb_anggota.nama, tb_report.kode_tr, tb_report.debit, tb_report.credit, tb_report.saldo, tb_report.deskripsi, tb_report.date");
        $this->db->where("tb_report.id_anggota = tb_anggota.id_anggota");
        $this->db->from("tb_report, tb_anggota");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    // ##############################

    function daftarAnggotaBaru($data)
    {
        $biaya_admin = $this->Helper->setting('BIAYA_PENDAFTARAN');

        // Cek apabila saldo >= 25000

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
        $data['id_parent'] = "0";
        $data['no_anggota'] = $NO_ANGGOTA;
        $this->db->insert('tb_anggota', $data);
        $id_child = $this->db->insert_id();

        // biaya pendaftaran
        $data1 = array(
            'id_anggota' => NULL,
            'kode_tr' => $kode_tr_BP,
            'id_child' => $id_child,
            'amount' => $biaya_admin,
            'date' => $date
        );
        $this->db->insert('tb_biaya_pendaftaran', $data1);
        // $id_daftar = $this->db->insert_id();
        // report transaksi pendaftaran
        // $report_tr1 = array(
        //     'id_anggota' => $id_parent,
        //     'id' => $id_daftar,
        //     'kode_tr' => $kode_tr_BP,
        //     'debit' => $biaya_admin,
        //     'credit' => 0,
        //     'saldo' => $balance_anggota - $biaya_admin,
        //     'deskripsi' => "Membayar biaya pendaftaran [" . $NO_ANGGOTA . "]",
        //     'tipe' => "biaya_pendaftaran",
        //     'date' => $date
        // );
        // $this->db->insert('tb_report', $report_tr1);

        // report activity
        $report_act = array(
            'id_user' => $id_parent,
            'user' => "pengurus",
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
            redirect('pengurus/keanggotaan/pendaftaran');
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
                        Berhasil menambah anggota baru. ' . $msg . '
                        </div>'
            );
            redirect('pengurus/dashboard');
        }
    }

    function daftarAnggotaBaruReferral($no_anggota, $data)
    {
        $biaya_admin = $this->Helper->setting('BIAYA_PENDAFTARAN');

        $id_parent = $this->session->userdata('id_user');
        $currency = $this->Helper->setting('CURRENCY');
        $kode_tr_BP = $this->Helper->generate_kodeTR("BP");
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
        $email_penerima = $result['email'];

        // biaya pendaftaran
        $data1 = array(
            'id_anggota' => NULL,
            'kode_tr' => $kode_tr_BP,
            'id_child' => $id_child,
            'amount' => $biaya_admin,
            'date' => $date
        );
        $this->db->insert('tb_biaya_pendaftaran', $data1);

        // report activity
        $report_act = array(
            'id_user' => $id_parent,
            'user' => "pengurus",
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
            redirect('pengurus/keanggotaan/pendaftaranreferral');
        } else {
            $this->load->helper('send_email_helper');
            $template['nama_penerima'] = $data['nama'];
            $template['username'] = $username;
            $template['pass'] =  $random;
            $template['pass_tr'] = $random;
            $email['pesan'] = $this->template_email_daftarAnggotaBaru($template);
            $email['email'] = $email_penerima;
            $email['subjek'] = "Pendaftaran sukses!";
            $msg = send_email($email);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil menambah anggota baru. ' . $msg . '.
                        </div>'
            );
            redirect('pengurus/dashboard');
        }
    }

    public function updateDataAnggota($no_anggota, $data)
    {
        //Start database transaction
        $this->db->trans_start();

        // Update
        $this->db->update('tb_anggota', $data, "no_anggota = '" . $no_anggota . "'");

        // report activity
        $id_pengurus = $this->session->userdata('id_user');
        $report_act = array(
            'id_user' => $id_pengurus,
            'user' => "pengurus",
            'keterangan' => "Update data anggota [" . $no_anggota . "]",
            'date' => new_date()
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
            redirect('pengurus/keanggotaan/anggota');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Update berhasil.
                        </div>'
            );
            redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota);
        }
    }

    public function updateNoAnggota($data)
    {
        //Start database transaction
        $this->db->trans_start();

        $no_anggota_full = $data['no_anggota'];
        $no_anggota = ltrim($no_anggota_full, "0"); 
        $input_anggota_baru = $data['no_anggota_baru'];
        $no_anggota_baru = ltrim($input_anggota_baru, "0"); 

        $karakter = strlen($no_anggota_baru);
        if ($karakter == 1) {
            $no_anggota_baru_full = "000000" . $no_anggota_baru;
        } elseif ($karakter == 2) {
            $no_anggota_baru_full = "00000" . $no_anggota_baru;
        } elseif ($karakter == 3) {
            $no_anggota_baru_full = "0000" . $no_anggota_baru;
        } elseif ($karakter == 4) {
            $no_anggota_baru_full = "000" . $no_anggota_baru;
        } elseif ($karakter == 5) {
            $no_anggota_baru_full = "00" . $no_anggota_baru;
        } elseif ($karakter == 6) {
            $no_anggota_baru_full = "0" . $no_anggota_baru;
        } else {
            $no_anggota_baru_full = $no_anggota_baru;
        }
        
        $this->db->update('tb_anggota', ['id_anggota' => $no_anggota_baru], "id_anggota = '" . $no_anggota . "'");
        $this->db->update('tb_anggota', ['id_parent' => $no_anggota_baru], "id_parent = '" . $no_anggota . "'");
        $this->db->update('tb_anggota', ['no_anggota' => $no_anggota_baru_full], "no_anggota = '" . $no_anggota_full . "'");
        $this->db->update('login_history', ['id_user' => $no_anggota_baru], "id_user = '" . $no_anggota . "' AND keterangan ='anggota'");
        $this->db->update('tb_biaya_pendaftaran', ['id_anggota' => $no_anggota_baru], "id_anggota = '" . $no_anggota . "'");
        $this->db->update('tb_bonus_sponsor', ['id_child' => $no_anggota_baru], "id_child = '" . $no_anggota . "'");
        $this->db->update('tb_report_activity', ['id_user' => $no_anggota_baru], "id_user = '" . $no_anggota . "' AND user ='anggota'");
        $this->db->query("UPDATE tb_report_activity SET keterangan = replace(keterangan, '[".$no_anggota_full."]', '[".$no_anggota_baru_full."]')");
        $this->db->query("UPDATE tb_report SET deskripsi = replace(deskripsi, '[".$no_anggota_full."]', '[".$no_anggota_baru_full."]')");

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
            redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota_full);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Ganti Nomor Anggota berhasil.
                        </div>'
            );
            redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota_baru_full);
        }
    }
    
    public function updatePassword($tipe, $data)
    {
        //Start database transaction
        $this->db->trans_start();

        $no_anggota = $data['no_anggota'];

        if ($tipe == "pass") {
            $ket = "password";
            // Update
            $update = ['password' => password_hash($data['pass'], PASSWORD_BCRYPT)];
        } else {
            $ket = "password transaksi";
            // Update
            $update = ['pass_tr' => password_hash($data['passtr'], PASSWORD_BCRYPT)];
        }

        $this->db->update('tb_anggota', $update, "no_anggota = '" . $no_anggota . "'");

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
            redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Ganti ' . $ket . ' berhasil.
                        </div>'
            );
            redirect('pengurus/keanggotaan/dataanggota/' . $no_anggota);
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
