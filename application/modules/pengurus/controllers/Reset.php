<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Main_model', 'Main');
        $this->load->helper('send_email_helper');
    }

    public function test()
    {
        $this->load->view('test');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|callback_email_check|valid_email');
        if ($this->form_validation->run() == false) {
            $main['refcode'] = "";
            $this->load->view('reset_password', $main);
        } else {

            $selector = bin2hex(mt_rand());
            $token = mt_rand();
            $hashedToken = password_hash($token, PASSWORD_BCRYPT);
            $expires = date("U") + 1800;
            $url = base_url() . 'pengurus/reset/createnewpassword/' . $selector . '/' . bin2hex($token);
            $userEmail = $this->input->post('email');


            //Start database transaction
            $this->db->trans_start();

            $this->db->delete('pwdreset', array('resetEmail' => $userEmail));

            $data_reset = [
                'resetEmail' => $userEmail,
                'resetSelector' => $selector,
                'resetToken' => $hashedToken,
                'resetExpires' => $expires
            ];
            $this->db->insert('pwdreset', $data_reset);

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Please try again!
                    </div>'
                );
                redirect('pengurus/reset');
            } else {
                //kirim email invite
                // $template['nama_penerima'] = $data['nama'];
                $template['url'] = $url;
                $email['pesan'] = $this->template_email_reset_pass($template);
                $email['email'] = $userEmail;
                $email['subjek'] = "Reset password Anda untuk " . $this->Helper->setting_web('WEBNAME');
                $msg = send_email($email);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    ' . $msg . '
                    </div>'
                );
                redirect('pengurus/reset');
            }
        }
    }

    public function createnewpassword($selector = "", $validator = "")
    {
        $this->form_validation->set_rules('selector', 'selector', 'required');
        $this->form_validation->set_rules('validator', 'validator', 'required');
        $this->form_validation->set_rules('newpass', 'password', 'required');
        $this->form_validation->set_rules('newpass2', 'confirm password', 'required|matches[newpass]');

        if ($this->form_validation->run() == false) {

            if (ctype_xdigit($selector) && ctype_xdigit($validator)) {
                $main['selector'] = $selector;
                $main['validator'] = $validator;
                $this->load->view('createnewpassword', $main);
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Token tidak valid!
                        </div>'
                );
                redirect('pengurus');
            }
        } else {
            $selector = $this->input->post('selector');
            $validator = $this->input->post('validator');
            $pass = $this->input->post('newpass');

            $currentDate = date("U");

            $query = $this->db->query(' SELECT *
                                        FROM pwdreset 
                                        WHERE resetSelector = "' . $selector . '" 
                                            AND resetExpires >= "' . $currentDate . '"');
            if ($query->num_rows() > 0) {
                $result = $query->row_array();

                $rstTkn = $result['resetToken'];
                $tokenEmail = $result['resetEmail'];

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $rstTkn);

                if ($tokenCheck === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan!
                        </div>'
                    );
                    redirect('pengurus');
                } elseif ($tokenCheck === TRUE) {
                    $query2 = $this->db->query(' SELECT id_pengurus
                                                FROM tb_pengurus
                                                WHERE email = "' . $tokenEmail . '"');
                    if ($query2->num_rows() > 0) {
                        $result2 = $query2->row_array();
                        $id_pengurus = $result2['id_pengurus'];

                        //Start database transaction
                        $this->db->trans_start();

                        $input['password'] = password_hash($pass, PASSWORD_BCRYPT);

                        $this->db->update('tb_pengurus', $input, "id_pengurus = " . $id_pengurus);

                        $this->db->delete('pwdreset', array('resetEmail' => $tokenEmail));

                        //Start database transaction
                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE) {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Gagal untuk reset password!
                                </div>'
                            );
                            redirect('pengurus');
                        } else {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Password telah diubah!
                                </div>'
                            );
                            redirect('pengurus');
                        }
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Tidak ada akun terdaftar dengan email tersebut.
                            </div>'
                        );
                        redirect('pengurus');
                    }
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Token tidak valid!
                        </div>'
                );
                redirect('pengurus/reset/createnewpassword/' . $selector . '/' . $validator);
            }
        }
    }



    // #############################################################

    public function email_check($email)
    {
        $query = $this->db->query(' SELECT id_pengurus
                                        FROM tb_pengurus
                                        WHERE email = "' . $email . '" ');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('email_check', 'Email ' . $email . ' tidak terdaftar');
            return FALSE;
        }
    }

    // ##################################################################

    private function template_email_reset_pass($data = "")
    {
        if ($data != "") {
            $no_tlp = $this->Helper->setting_web('NOTLP');
            $website = $this->Helper->setting_web('WEBSITE');
            $webname = $this->Helper->setting_web('WEBNAME');
            $email_cs = $this->Helper->setting_web('CS');

            $url = $data['url'];

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
                    Reset Password untuk Lentera Digital Indonesia.
                </div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" bgcolor="#fff2cb">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
                                        <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset Password Anda</h1>
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
                                        <p style="margin: 0;">Klik tombol dibawah untuk mengubah kata sandi akun Anda. Jika Anda tidak mengirim permintaan pengaturan ulang kata sandi, Anda dapat mengabaikan pesan ini.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td align="center" bgcolor="#28a745" style="border-radius: 6px;">
                                                                <a href="' . $url . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Reset password</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                                        <p style="margin: 0;">Jika tombol tidak bekerja, salin and tempel tautan dibawah pada browser Anda:</p>
                                        <p style="margin: 0;"><a href="' . $url . '" target="_blank">' . $url . '</a></p>
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
                                        <p style="margin: 0;">Anda menerima email ini karena kami meminta permintaan untuk mengubah kata sandi akun Anda. Jika Anda tidak mengirim permintaan pengaturan ulang kata sandi, Anda dapat mengabaikan pesan ini.</p>
                                    </td>
                                </tr>
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
}
