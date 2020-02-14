<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('send_email')) {
    // lokal
    function send_email($data = "")
    {
        if ($data != "") {

            $ci = &get_instance();

            //DATA
            $email_penerima = $data['email'];
            $subjek = $data['subjek'];
            $pesan = $data['pesan'];

            // $email_penerima = "andifasaya@gmail.com";
            // $subjek = "Test email lokal";
            // $pesan = "test";

            // Load Helper model
            $ci->load->model('Helper_model', 'Helper');
            $nama_web = $ci->Helper->setting_web('WEBNAME');
            $email_cs = $ci->Helper->setting_web('CS');

            // Load PHPMailer library
            $ci->load->library('phpmailer_lib');

            // PHPMailer object
            $mail = $ci->phpmailer_lib->load();

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host     = 'ssl://smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fasayayaqhsya@gmail.com';
            $mail->Password = 'aydeco12';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;

            $mail->setFrom($email_cs,  $nama_web);
            $mail->addReplyTo($email_cs, $nama_web);

            // Add a recipient
            $mail->addAddress($email_penerima);

            // Add cc or bcc 
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Email subject
            $mail->Subject = $subjek;

            // Set email format to HTML
            $mail->isHTML(true);

            // Email body content
            $mail->Body = $pesan;

            // Send email
            if (!$mail->send()) {
                // return 'Email tidak dapat dikirim.';
                return 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                return 'Email berhasil dikirim.';
            }
        }
    }

    // hosting
    // function send_email($data = "")
    // {
    //     if ($data != "") {

    //         $ci = &get_instance();

    //         //DATA
    //         $email_penerima = $data['email'];
    //         $subjek = $data['subjek'];
    //         $pesan = $data['pesan'];

    //         // $email_penerima = "andifasaya@gmail.com";
    //         // $subjek = "Test email lokal";
    //         // $pesan = "test";

    //         // Load Helper model
    //         $ci->load->model('Helper_model', 'Helper');
    //         $nama_web = $ci->Helper->setting_web('WEBNAME');
    //         $email_cs = $ci->Helper->setting_web('CS');

    //         // Load PHPMailer library
    //         $ci->load->library('phpmailer_lib');

    //         // PHPMailer object
    //         $mail = $ci->phpmailer_lib->load();

    //         // SMTP configuration
    //         $mail->isSMTP();
    //         $mail->Host     = 'srv89.niagahoster.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'admin@lenteradigitalindonesia.com';
    //         $mail->Password = 'Makassar01';
    //         $mail->SMTPSecure = 'ssl';
    //         $mail->Port     = 465;

    //         $mail->setFrom($email_cs,  $nama_web);
    //         $mail->addReplyTo($email_cs, $nama_web);

    //         // Add a recipient
    //         $mail->addAddress($email_penerima);

    //         // Add cc or bcc 
    //         // $mail->addCC('cc@example.com');
    //         // $mail->addBCC('bcc@example.com');

    //         // Email subject
    //         $mail->Subject = $subjek;

    //         // Set email format to HTML
    //         $mail->isHTML(true);

    //         // Email body content
    //         $mail->Body = $pesan;

    //         // Send email
    //         if (!$mail->send()) {
    //             // return 'Email tidak dapat dikirim.';
    //             return 'Mailer Error: ' . $mail->ErrorInfo;
    //         } else {
    //             return 'Email berhasil dikirim.';
    //         }
    //     }
    // }
}
