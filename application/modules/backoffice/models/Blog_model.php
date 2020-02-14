<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    function get_blog()
    {
        $this->db->select("*");
        $this->db->where("is_deleted = '0'");
        $this->db->from("tb_blog");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    // ##############################################

    function tambahblog($data)
    {
        $fileName = $_FILES['gambarblog']['name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $fileNameNew = "blog_" . uniqid('', true) . "." . $fileActualExt;

        // Set preference 
        $config['upload_path'] = './template/img/blog';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
        $config['file_name'] = $fileNameNew;

        // Load upload library 
        $this->load->library('upload', $config);

        // File upload
        if ($this->upload->do_upload('gambarblog')) {

            //upload
            $uploadData = $this->upload->data();

            // Get data about the file
            $filename = $uploadData['file_name'];

            //Start database transaction
            $this->db->trans_start();

            //insert into table member
            $data_img = [
                'slug' => $this->Helper->textToSlug($data['judul']),
                'img' => $filename,
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'date' => new_date()
            ];
            $this->db->insert('tb_blog', $data_img);

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal menambahkan!
                        </div>'
                );
                redirect('backoffice/adminpanel/tambahprogram');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil menambahkan!
                        </div>'
                );
                redirect('backoffice/adminpanel/tambahprogram');
            }
        } else {

            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
            );
            redirect('backoffice/adminpanel/tambahprogram');
        }
    }

    function editBlog($data)
    {
        if ($_FILES['gambarblog']['name'] != NULL) {

            $fileName = $_FILES['gambarblog']['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileNameNew = "blog_" . uniqid('', true) . "." . $fileActualExt;

            // Set preference 
            $config['upload_path'] = './template/img/blog';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '1024'; // max_size in kb (1 mb = 1024 kb)
            $config['file_name'] = $fileNameNew;

            // Load upload library 
            $this->load->library('upload', $config);

            // File upload
            if ($this->upload->do_upload('gambarblog')) {

                $path = "./template/img/blog/" . $data["foto_lama"];
                if (!unlink($path)) {
                    // echo "Error hapus gambar.";
                }

                //upload
                $uploadData = $this->upload->data();

                // Get data about the file
                $filename = $uploadData['file_name'];

                //Start database transaction
                $this->db->trans_start();

                //insert into table member
                $data_update = [
                    'slug' => $this->Helper->textToSlug($data['judul']),
                    'img' => $filename,
                    'judul' => $data['judul'],
                    'isi' => $data['keterangan']
                ];
                $this->db->update('tb_blog', $data_update, "id_blog = '" . $data['id_blog'] . "'");

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal update!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/editprogram/' . $data['id_blog']);
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil upload!
                        </div>'
                    );
                    redirect('backoffice/adminpanel/editprogram/' . $data['id_blog']);
                }
            } else {

                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        ' . $error['error'] . '
                        </div>'
                );
                redirect('backoffice/adminpanel/editprogram/' . $data['id_blog']);
            }
        } else {
            //Start database transaction
            $this->db->trans_start();

            //insert into table member
            $data_update = [
                'slug' => $this->Helper->textToSlug($data['judul']),
                'judul' => $data['judul'],
                'isi' => $data['keterangan']
            ];
            $this->db->update('tb_blog', $data_update, "id_blog = '" . $data['id_blog'] . "' AND is_deleted='0'");

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Gagal update!
                    </div>'
                );
                redirect('backoffice/adminpanel/editprogram/' . $data['id_blog']);
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil update!
                    </div>'
                );
                redirect('backoffice/adminpanel/editprogram/' . $data['id_blog']);
            }
        }
    }

    function hapusBlog($id_blog)
    {

        //Start database transaction
        $this->db->trans_start();

        //insert into table member
        $data_update = [
            'is_deleted' => "1"
        ];
        $this->db->update('tb_blog', $data_update, "id_blog = '" . $id_blog . "'");

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal hapus!
                        </div>'
            );
            redirect('backoffice/adminpanel/program');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil hapus!
                        </div>'
            );
            redirect('backoffice/adminpanel/program');
        }
    }

    function updateStgBlog($data)
    {

        //Start database transaction
        $this->db->trans_start();

        //update
        $this->db->update('isi_web', ['isi' => $data['title']], "kode = 'blog_title'");
        $this->db->update('isi_web', ['isi' => $data['subtitle']], "kode = 'blog_subtitle'");

        //Start database transaction
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal update!
                        </div>'
            );
            redirect('backoffice/adminpanel/settingprogram');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil update!
                        </div>'
            );
            redirect('backoffice/adminpanel/settingprogram');
        }
    }
} //end model
