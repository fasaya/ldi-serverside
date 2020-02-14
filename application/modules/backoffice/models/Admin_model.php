<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function view($view, $main)
    {
        $id_user = $this->session->userdata('id_user');
        $query = $this->db->query(' SELECT 
                                            username,
                                            keterangan
                                        FROM tb_login 
                                        WHERE id_user = "' . $id_user . '" ');
        $header['user'] = $query->row_array();

        $this->load->view('v_header', $header);
        $this->load->view($view, $main);
        $this->load->view('v_footer');
    }

    function cek_login()
    {
        $id_user = $this->session->userdata('id_user');
        $log_stat = $this->session->userdata('log_stat');
        $ket = $this->session->userdata('keterangan');

        if (empty($id_user) || $id_user == "" || $log_stat != TRUE || $ket != 'backoffice') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda tidak valid. Mohon melakukan login terlebih dahulu!</div>');
            redirect('webadmin/login');
        }
    }

    // ###############################################
    // HOME

    // Update halaman HOME

    public function updateHome($data)
    {

        $tipe = $data['tipe'];

        if ($tipe == "1" || $tipe == "2") {

            //Start database transaction
            $this->db->trans_start();

            if ($_FILES['gambar']['name'] != NULL) {

                $fileName = $_FILES['gambar']['name'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

                // Set preference 
                $config['upload_path'] = './template/img/isi';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
                $config['file_name'] = $fileNameNew;

                // Load upload library 
                $this->load->library('upload', $config);

                // File upload
                if ($this->upload->do_upload('gambar')) {
                    $fotolama = $this->Helper->isi_web('home_' . $tipe . '_img');
                    $path = "./template/images/isi/" . $fotolama;
                    if (!unlink($path)) {
                        // echo "Error hapus gambar.";
                    }

                    //upload
                    $uploadData = $this->upload->data();

                    // Get data about the file
                    $filename = $uploadData['file_name'];

                    //insert into table
                    if ($tipe == "1") {
                        $this->db->update('isi_web', ['isi' => $filename], "kode = 'home_1_img'");
                        $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_1_judul1'");
                        $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'home_1_judul2'");
                        $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'home_1_isi1'");
                        $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'home_1_isi2'");
                    } elseif ($tipe == "2") {
                        $this->db->update('isi_web', ['isi' => $filename], "kode = 'home_2_img'");
                        $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_2_judul1'");
                        $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'home_2_judul2'");
                        $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'home_2_isi1'");
                        $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'home_2_isi2'");
                    }


                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message_' . $tipe,
                            '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal!
                            </div>'
                        );
                        redirect('backoffice/adminpanel/halamanhome');
                    } else {
                        $this->session->set_flashdata(
                            'message_' . $tipe,
                            '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                        );
                        redirect('backoffice/adminpanel/halamanhome');
                    }
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(
                        'message_' . $tipe,
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                }
            } else {
                //insert into table
                if ($tipe == "1") {
                    $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_1_judul1'");
                    $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'home_1_judul2'");
                    $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'home_1_isi1'");
                    $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'home_1_isi2'");
                } elseif ($tipe == "2") {
                    $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_2_judul1'");
                    $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'home_2_judul2'");
                    $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'home_2_isi1'");
                    $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'home_2_isi2'");
                }

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message_' . $tipe,
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                } else {
                    $this->session->set_flashdata(
                        'message_' . $tipe,
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                }
            }
        } elseif ($tipe == "4a") {

            //Start database transaction
            $this->db->trans_start();
            //insert into table

            $this->db->update('isi_web', ['isi' => $data['title1a']], "kode = 'home_4_title1a'");
            $this->db->update('isi_web', ['isi' => $data['title1b']], "kode = 'home_4_title1b'");
            $this->db->update('isi_web', ['isi' => $data['title1c']], "kode = 'home_4_title1c'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_4a',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Gagal!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            } else {
                $this->session->set_flashdata(
                    'message_4a',
                    '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        } elseif ($tipe == "5a") {

            //Start database transaction
            $this->db->trans_start();
            //insert into table

            $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_5a_judul1'");
            $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'home_5a_judul2'");
            $this->db->update('isi_web', ['isi' => $data['judul3']], "kode = 'home_5a_judul3'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_5a',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Update gagal!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            } else {
                $this->session->set_flashdata(
                    'message_5a',
                    '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        } elseif ($tipe == "5b") {

            //Start database transaction
            $this->db->trans_start();
            //insert into table

            $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'home_5b_judul1'");
            $this->db->update('isi_web', ['isi' => $data['judul2a']], "kode = 'home_5b_judul2a'");
            $this->db->update('isi_web', ['isi' => $data['judul2b']], "kode = 'home_5b_judul2b'");
            $this->db->update('isi_web', ['isi' => $data['judul2c']], "kode = 'home_5b_judul2c'");
            $this->db->update('isi_web', ['isi' => $data['judul3']], "kode = 'home_5b_judul3'");
            $this->db->update('isi_web', ['isi' => $data['keterangan']], "kode = 'home_5b_keterangan'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_5b',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Update gagal!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            } else {
                $this->session->set_flashdata(
                    'message_5b',
                    '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        } elseif ($tipe == "5c") {

            //Start database transaction
            $this->db->trans_start();
            //insert into table

            $this->db->update('isi_web', ['isi' => $data['5c_1a']], "kode = 'home_5c_1a'");
            $this->db->update('isi_web', ['isi' => $data['5c_1b']], "kode = 'home_5c_1b'");
            $this->db->update('isi_web', ['isi' => $data['5c_1c']], "kode = 'home_5c_1c'");

            $this->db->update('isi_web', ['isi' => $data['5c_2a']], "kode = 'home_5c_2a'");
            $this->db->update('isi_web', ['isi' => $data['5c_2b']], "kode = 'home_5c_2b'");
            $this->db->update('isi_web', ['isi' => $data['5c_2c']], "kode = 'home_5c_2c'");

            $this->db->update('isi_web', ['isi' => $data['5c_3a']], "kode = 'home_5c_3a'");
            $this->db->update('isi_web', ['isi' => $data['5c_3b']], "kode = 'home_5c_3b'");
            $this->db->update('isi_web', ['isi' => $data['5c_3c']], "kode = 'home_5c_3c'");

            $this->db->update('isi_web', ['isi' => $data['5c_4a']], "kode = 'home_5c_4a'");
            $this->db->update('isi_web', ['isi' => $data['5c_4b']], "kode = 'home_5c_4b'");
            $this->db->update('isi_web', ['isi' => $data['5c_4c']], "kode = 'home_5c_4c'");

            $this->db->update('isi_web', ['isi' => $data['5c_5a']], "kode = 'home_5c_5a'");
            $this->db->update('isi_web', ['isi' => $data['5c_5b']], "kode = 'home_5c_5b'");
            $this->db->update('isi_web', ['isi' => $data['5c_5c']], "kode = 'home_5c_5c'");

            $this->db->update('isi_web', ['isi' => $data['5c_6a']], "kode = 'home_5c_6a'");
            $this->db->update('isi_web', ['isi' => $data['5c_6b']], "kode = 'home_5c_6b'");
            $this->db->update('isi_web', ['isi' => $data['5c_6c']], "kode = 'home_5c_6c'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_5c',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Update gagal!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            } else {
                $this->session->set_flashdata(
                    'message_5c',
                    '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        } elseif ($tipe == "5d") {

            //Start database transaction
            $this->db->trans_start();
            //insert into table

            $this->db->update('isi_web', ['isi' => $data['5d_1a']], "kode = 'home_5d_1a'");
            $this->db->update('isi_web', ['isi' => $data['5d_1b']], "kode = 'home_5d_1b'");
            $this->db->update('isi_web', ['isi' => $data['5d_1c']], "kode = 'home_5d_1c'");

            $this->db->update('isi_web', ['isi' => $data['5d_2a']], "kode = 'home_5d_2a'");
            $this->db->update('isi_web', ['isi' => $data['5d_2b']], "kode = 'home_5d_2b'");
            $this->db->update('isi_web', ['isi' => $data['5d_2c']], "kode = 'home_5d_2c'");

            $this->db->update('isi_web', ['isi' => $data['5d_3a']], "kode = 'home_5d_3a'");
            $this->db->update('isi_web', ['isi' => $data['5d_3b']], "kode = 'home_5d_3b'");
            $this->db->update('isi_web', ['isi' => $data['5d_3c']], "kode = 'home_5d_3c'");

            $this->db->update('isi_web', ['isi' => $data['5d_4a']], "kode = 'home_5d_4a'");
            $this->db->update('isi_web', ['isi' => $data['5d_4b']], "kode = 'home_5d_4b'");
            $this->db->update('isi_web', ['isi' => $data['5d_4c']], "kode = 'home_5d_4c'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_5d',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Update gagal!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            } else {
                $this->session->set_flashdata(
                    'message_5d',
                    '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        }
    }

    public function updateHomeGambar($tipe)
    {

        //Start database transaction
        $this->db->trans_start();

        //insert into table
        if ($tipe == "3a" || $tipe == "3b" || $tipe == "3c" || $tipe == "3d" || $tipe == "3e") {
            $msg = "message_3";
        } elseif ($tipe == "4b1") {
            $msg = "message_4b";
        } elseif ($tipe == "4b2") {
            $msg = "message_4b";
        }

        if ($_FILES['gambar']['name'] != NULL) {

            $fileName = $_FILES['gambar']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/isi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('gambar')) {

                //insert into table
                if ($tipe == "3a" || $tipe == "3b" || $tipe == "3c" || $tipe == "3d" || $tipe == "3e") {
                    $fotolama = $this->Helper->isi_web('home_3_gbr' . $tipe);
                } elseif ($tipe == "4b1") {
                    $fotolama = $this->Helper->isi_web('home_4_img1' . $tipe);
                } elseif ($tipe == "4b2") {
                    $fotolama = $this->Helper->isi_web('home_4_img2' . $tipe);
                }

                $path = "./template/img/isi/" . $fotolama;
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //insert into table
                if ($tipe == "3a" || $tipe == "3b" || $tipe == "3c" || $tipe == "3d" || $tipe == "3e") {
                    $this->db->update('isi_web', ['isi' => $filename], "kode = 'home_3_gbr" . $tipe . "'");
                } elseif ($tipe == "4b1") {
                    $this->db->update('isi_web', ['isi' => $filename], "kode = 'home_4_img1'");
                } elseif ($tipe == "4b2") {
                    $this->db->update('isi_web', ['isi' => $filename], "kode = 'home_4_img2'");
                }

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        $msg,
                        '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal menambahkan!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                } else {
                    $this->session->set_flashdata(
                        $msg,
                        '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                }
            } else {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    $msg,
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                );
                redirect('backoffice/adminpanel/halamanhome');
            }
        } else {
            $this->session->set_flashdata(
                $msg,
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Belum ada gambar yang dipilih!
                    </div>'
            );
            redirect('backoffice/adminpanel/halamanhome');
        }
    }

    // ########################################
    // TENTANG

    public function updateTentang($data)
    {
        $tipe = $data['tipe'];

        if ($tipe = "1") {
            //Start database transaction
            $this->db->trans_start();

            if ($_FILES['gambar']['name'] != NULL) {

                $fileName = $_FILES['gambar']['name'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

                // Set preference 
                $config['upload_path'] = './template/img/isi';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
                $config['file_name'] = $fileNameNew;

                // Load upload library 
                $this->load->library('upload', $config);

                // File upload
                if ($this->upload->do_upload('gambar')) {
                    $fotolama = $this->Helper->isi_web('tentang_1_img');
                    $path = "./template/images/isi/" . $fotolama;
                    if (!unlink($path)) {
                        // echo "Error hapus gambar.";
                    }

                    //upload
                    $uploadData = $this->upload->data();

                    // Get data about the file
                    $filename = $uploadData['file_name'];

                    //insert into table

                    $this->db->update('isi_web', ['isi' => $filename], "kode = 'tentang_1_img'");
                    $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'tentang_1_judul1'");
                    $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'tentang_1_judul2'");
                    $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'tentang_1_isi1'");
                    $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'tentang_1_isi2'");


                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message_1',
                            '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal!
                            </div>'
                        );
                        redirect('backoffice/adminpanel/halamantentang');
                    } else {
                        $this->session->set_flashdata(
                            'message_1',
                            '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                        );
                        redirect('backoffice/adminpanel/halamantentang');
                    }
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(
                        'message_' . $tipe,
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamanhome');
                }
            } else {
                //insert into table
                $this->db->update('isi_web', ['isi' => $filename], "kode = 'tentang_1_img'");
                $this->db->update('isi_web', ['isi' => $data['judul1']], "kode = 'tentang_1_judul1'");
                $this->db->update('isi_web', ['isi' => $data['judul2']], "kode = 'tentang_1_judul2'");
                $this->db->update('isi_web', ['isi' => $data['isi1']], "kode = 'tentang_1_isi1'");
                $this->db->update('isi_web', ['isi' => $data['isi2']], "kode = 'tentang_1_isi2'");

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message_1',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamantentang');
                } else {
                    $this->session->set_flashdata(
                        'message_1',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/halamantentang');
                }
            }
        }
    }

    // ############################################
    // TENTANG

    public function updateVisimisi($data)
    {
        //Start database transaction
        $this->db->trans_start();

        $this->db->update('isi_web', ['isi' => $data['title1']], "kode = 'visimisi_1_title1'");
        $this->db->update('isi_web', ['isi' => $data['title2']], "kode = 'visimisi_1_title2'");
        $this->db->update('isi_web', ['isi' => $data['visi']], "kode = 'visimisi_1_visi'");
        $this->db->update('isi_web', ['isi' => $data['misi']], "kode = 'visimisi_1_misi'");
        $this->db->update('isi_web', ['isi' => $data['quote1']], "kode = 'visimisi_1_quotes1'");
        $this->db->update('isi_web', ['isi' => $data['quote2']], "kode = 'visimisi_1_quotes2'");

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message_1',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Update gagal!
                </div>'
            );
            redirect('backoffice/adminpanel/halamanvisimisi');
        } else {
            $this->session->set_flashdata(
                'message_1',
                '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update!
                </div>'
            );
            redirect('backoffice/adminpanel/halamanvisimisi');
        }
    }

    public function updateVisimisiGambar($tipe)
    {
        if ($_FILES['gambar']['name'] != NULL) {

            //Start database transaction
            $this->db->trans_start();

            $fileName = $_FILES['gambar']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/isi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('gambar')) {
                $fotolama = $this->Helper->isi_web('visimisi_2_img' . $tipe);
                $path = "./template/img/isi/" . $fotolama;
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //insert into table

                $this->db->update('isi_web', ['isi' => $filename], "kode = 'visimisi_2_img" . $tipe . "'");

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal menambahkan!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/halamanvisimisi#gambar');
                } else {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/halamanvisimisi#gambar');
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'message_2',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                );
                redirect('backoffice/adminpanel/halamanvisimisi#gambar');
            }
        } else {
            $this->session->set_flashdata(
                'message_2',
                '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Pilih gambar terlebih dahulu!
                    </div>'
            );
            redirect('backoffice/adminpanel/halamanvisimisi#gambar');
        }
    }

    // ###################################
    // Struktur

    public function updateStrukturOrgGambar($data)
    {
        $tipe = $data['tipe'];

        if ($tipe == "a" || $tipe == "b" || $tipe == "c" || $tipe == "d" || $tipe == "e") {

            //Start database transaction
            $this->db->trans_start();

            $fileName = $_FILES['gambar']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/isi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('gambar')) {
                $fotolama = $this->Helper->isi_web('struktur_' . $tipe . '2');
                $path = "./template/img/isi/" . $fotolama;
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //insert into table
                $this->db->update('isi_web', ['isi' => $filename], "kode = 'struktur_" . $tipe . "2'");

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal menambahkan!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/strukturorg');
                } else {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/strukturorg');
                }
            } else {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'message_2',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                );
                redirect('backoffice/adminpanel/strukturorg');
            }
        } elseif ($tipe == "f") {
            //Start database transaction
            $this->db->trans_start();

            //insert into table
            $this->db->update('isi_web', ['isi' => $data['nama_a']], "kode = 'struktur_a1'");
            $this->db->update('isi_web', ['isi' => $data['nama_b']], "kode = 'struktur_b1'");
            $this->db->update('isi_web', ['isi' => $data['nama_c']], "kode = 'struktur_c1'");
            $this->db->update('isi_web', ['isi' => $data['nama_d']], "kode = 'struktur_d1'");
            $this->db->update('isi_web', ['isi' => $data['nama_e']], "kode = 'struktur_e1'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_1',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal menambahkan!
                        </div>'
                );
                redirect('backoffice/adminpanel/strukturorg');
            } else {
                $this->session->set_flashdata(
                    'message_1',
                    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
                );
                redirect('backoffice/adminpanel/strukturorg');
            }
        }
    }

    // Update kontak

    public function editKontak($data)
    {
        //Start database transaction
        $this->db->trans_start();

        $this->db->update('tb_setting', ['nilai' => $data['nowa']], "kode = 'NOWA'");
        $this->db->update('tb_setting', ['nilai' => $data['nohp']], "kode = 'NOHP'");
        $this->db->update('tb_setting', ['nilai' => $data['email']], "kode = 'EMAIL'");
        $this->db->update('tb_setting', ['nilai' => $data['alamat']], "kode = 'ALAMAT'");

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
            redirect('backoffice/adminpanel/kontak');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Berhasil update Kontak.
                </div>'
            );
            redirect('backoffice/adminpanel/kontak');
        }
    }


    // LAINNYA

    public function updateLainnyaGambarHeader()
    {

        //Start database transaction
        $this->db->trans_start();

        $fileName = $_FILES['gambar']['name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

        // Set preference 
        $config['upload_path'] = './template/img/isi';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
        $config['file_name'] = $fileNameNew;

        // Load upload library 
        $this->load->library('upload', $config);

        // File upload
        if ($this->upload->do_upload('gambar')) {
            $fotolama = $this->Helper->isi_web('lain_header');
            $path = "./template/img/isi/" . $fotolama;
            if (!unlink($path)) {
                // echo "Error hapus gambar.";
            }

            //upload
            $uploadData = $this->upload->data();

            // Get data about the file
            $filename = $uploadData['file_name'];

            //insert into table

            $this->db->update('isi_web', ['isi' => $filename], "kode = 'lain_header'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_1',
                    '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal menambahkan!
                            </div>'
                );
                redirect('backoffice/adminpanel/lainnya');
            } else {
                $this->session->set_flashdata(
                    'message_1',
                    '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                );
                redirect('backoffice/adminpanel/lainnya');
            }
        } else {

            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata(
                'message_1',
                '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
            );
            redirect('backoffice/adminpanel/lainnya');
        }
    }

    public function updateLainnyaFooter($data)
    {

        //Start database transaction
        $this->db->trans_start();

        if ($_FILES['gambar']['name'] != NULL) {

            $fileName = $_FILES['gambar']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "isi_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/isi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('gambar')) {
                $fotolama = $this->Helper->isi_web('lain_footer_img');
                $path = "./template/img/isi/" . $fotolama;
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //insert into table
                $this->db->update('isi_web', ['isi' => $filename], "kode = 'lain_footer_img'");
                $this->db->update('isi_web', ['isi' => $data['keterangan']], "kode = 'lain_footer_ket'");

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Gagal update!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/lainnya');
                } else {
                    $this->session->set_flashdata(
                        'message_2',
                        '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Berhasil update!
                            </div>'
                    );
                    redirect('backoffice/adminpanel/lainnya');
                }
            } else {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'message_2',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                );
                redirect('backoffice/adminpanel/lainnya');
            }
        } else {
            //insert into table
            $this->db->update('isi_web', ['isi' => $data['keterangan']], "kode = 'lain_footer_ket'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message_2',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal update!
                        </div>'
                );
                redirect('backoffice/adminpanel/lainnya');
            } else {
                $this->session->set_flashdata(
                    'message_2',
                    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
                );
                redirect('backoffice/adminpanel/lainnya');
            }
        }
    }
} //end model
