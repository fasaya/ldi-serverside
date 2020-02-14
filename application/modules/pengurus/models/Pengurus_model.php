<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus_model extends CI_Model
{
    function pengurus()
    {
        $this->db->select("nama, email, no_hp, alamat, no_pengurus");
        $this->db->from("tb_pengurus");
        $this->db->order_by("join_date", "DESC");
        return $this->db->get()->result();
    }

    // ##############################

    function daftarAnggotaBaru($data)
    {
        $biaya_admin = $this->Helper->setting('BIAYA_PENDAFTARAN');

        // Cek apabila saldo >= 25000

        $id_parent = $this->session->userdata('id_user');
        $no_pengurus = $this->Helper->generate_NO_PENGURUS();
        $date = new_date();

        //Start database transaction
        $this->db->trans_start();

        // Update
        $random = substr(md5(mt_rand()), 0, 5);
        $passHASH = password_hash($random, PASSWORD_BCRYPT);
        $data['pass_tr'] = $passHASH;
        $data['password'] = $passHASH;
        $data['no_pengurus'] = $no_pengurus;
        $this->db->insert('tb_anggota', $data);
        $id_child = $this->db->insert_id();

        // report activity
        $report_act = array(
            'id_user' => $id_parent,
            'user' => "pengurus",
            'keterangan' => "Mendaftarkan pengurus [" . $no_pengurus . "]",
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
            redirect('pengurus/pengurus/tambahpengurus');
        } else {

            $this->load->helper('send_email_helper');
            $template['nama_penerima'] = $data['nama'];
            $template['username'] = $data['username'];
            $template['pass'] = $random;
            $template['pass_tr'] = $random;
            $email['pesan'] = $this->template_email_daftarPengurusBaru($template);
            $email['email'] = $data['email'];
            $email['subjek'] = "Tambah pengurus sukses!";
            $msg = send_email($email);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil menambah pengurus. ' . $msg . '
                        </div>'
            );
            redirect('pengurus/pengurus/semuapengurus');
        }
    }

    // ###############################################

    private function template_email_daftarPengurusBaru($data = "")
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
                    Tambah akun pengurus Lentera Digital Indonesia berhasil.
                </div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
                                        <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Tambah Pengurus Sukses</h1>
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
                                        <p style="margin: 0;">' . $data['nama_penerima'] . ', selamat bergabung di ' . $webname . '!</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;">Berikut data login Anda:</p>
                                        <p style="margin: 0;"><strong>
                                        Username: ' . $data['username'] . '<br>
                                        Password: ' . $data['pass'] . '<br>
                                        Password Transaksi: ' . $data['pass_tr'] . '<strong><br><br>
                                        Anda dapat mengubah password dan password transaksi akun anda.<br>
                                        Silahkan login pada <a href="' . base_url() . 'pengurus">halaman pengurus</a>.
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
