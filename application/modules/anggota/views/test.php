<!-- <!DOCTYPE html>
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
                        <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #ffc107;">
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
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
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
                                                    <a href="' . $url . '" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Reset password</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                            <p style="margin: 0;">Jika tombol tidak bekerja, salin and tempel tautan dibawah pada browser Anda:</p>
                            <p style="margin: 0;"><a href="' . $url . '" target="_blank">' . $url . '</a></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #ffc107">
                            <p style="margin: 0;">Salam,<br> Team Lentera Digital Indonesia</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" bgcolor="#fff2cb" style="padding: 24px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                    <tr>
                        <td align="center" bgcolor="#fff2cb" style="padding: 12px 24px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
                            <p style="margin: 0;">Anda menerima email ini karena kami meminta permintaan untuk mengubah kata sandi akun Anda. Jika Anda tidak mengirim permintaan pengaturan ulang kata sandi, Anda dapat mengabaikan pesan ini.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#fff2cb" style="padding: 12px 24px; font-family: " Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;">
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

</html>

<li class="nav-parent">
    <a class="nav-link" href="#">
        <i class="fas fa-chart-area" aria-hidden="true"></i>
        <span>Deposito</span>
    </a>
    <ul class="nav nav-children">
        <li>
            <a class="nav-link" href="<?= base_url() ?>anggota/deposito">
                Deposito
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= base_url() ?>anggota/deposito/deviden">
                Deviden
            </a>
        </li>
        <li>
            <a class="nav-link" href="<?= base_url() ?>anggota/deposito/royalti">
                Royalti
            </a>
        </li>
    </ul>
</li> -->