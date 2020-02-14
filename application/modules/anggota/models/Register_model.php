<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{

    function add_calon_anggota($tipe, $data)
    {
        if ($tipe == 'ref') {
            $id_parent =  $this->Helper->getIdByUsername($data['kode_ref']);
            $keterangan = "Buat akun dengan kode referral [" . $data['kode_ref'] . "]";
        } else {
            $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_anggota 
                                    WHERE id_anggota = "26"');
            if ($query->num_rows() > 0) {
                $id_parent = 26;
            } else {
                $id_parent = 0;
            }
            $keterangan = "Buat akun baru";
        }
        //cek apakah bisa daftar
        if ($this->Helper->setting('DAFTAR_ANGGOTA', 'status') == '1') {
            $date = new_date();

            // $passHASH = password_hash($data['password'], PASSWORD_BCRYPT);
            $NO_ANGGOTA = $this->Helper->generate_NO_ANGGOTA();

            //Start database transaction
            $this->db->trans_start();

            $data1 = [
                'no_anggota' => $NO_ANGGOTA,
                'nama' => $data['nama'],
                'username' => $data['username'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                // 'password' => $passHASH,
                'id_parent' => $id_parent,
                'status' => "0",
                'join_date' => $date
            ];
            //insert into table
            $this->db->insert('tb_anggota', $data1);

            //get last inserted id (id_anggota)
            $id_anggota = $this->db->insert_id();

            //insert into table report
            $data_report = [
                'id_user' => $id_anggota,
                'user' => "anggota",
                'keterangan' => $keterangan,
                'date' => $date
            ];
            $this->db->insert('tb_report_activity', $data_report);

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan. Silahkan coba beberapa saat lagi.
                    </div>'
                );
                if ($tipe = 'ref') {
                    redirect('anggota/register/referral/.' . $data['kode_ref']);
                } else {
                    redirect('register');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil buat akun! Mohon untuk menunggu proses verifikasi untuk dapat masuk.
                    </div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Mohon maaf, saat ini pendaftaran sedang ditutup.
                </div>'
            );

            if ($tipe = 'ref') {
                redirect('anggota/register/referral/.' . $data['kode_ref']);
            } else {
                redirect('register');
            }
        }
    }
} //end model
