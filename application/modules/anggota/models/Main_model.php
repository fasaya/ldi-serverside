<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    function view($view, $main = '')
    {
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Alert_model', 'Alert');

        $id_user = $this->session->userdata('id_user');
        $query = $this->db->query(' SELECT 
                                            username, status, nama, no_anggota
                                        FROM tb_anggota 
                                        WHERE id_anggota = "' . $id_user . '" ');
        $result = $query->row_array();
        $header['user'] = $result;
        $header['isSudahDaftar']  = $this->Helper->cek_biaya_pendaftaran();
        // $header['keterangan']  = ($result['status'] == '1') ? "Anggota" : "Calon Anggota";
        $header['keterangan']  = $result['no_anggota'];
        $header['balance']  = $this->Balance->total_balance();

        // $main['kosong'] = "";

        $header['alert_simp_wajib'] = $this->Alert->jumlah_belum_bayar_simpanan_wajib();
        $header['alert_simp_pokok'] = $this->Alert->jumlah_belum_bayar_simpanan_pokok();

        $this->load->view('v_header', $header);
        $this->load->view($view, $main);
        $this->load->view('v_footer');
    }

    function cek_login()
    {
        $id_user = $this->session->userdata('id_user');
        $log_stat = $this->session->userdata('log_stat');
        $ket = $this->session->userdata('keterangan');

        if (empty($id_user) || $id_user == "" || $log_stat != TRUE || $ket != 'anggota') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda tidak valid. Mohon melakukan login terlebih dahulu!</div>');
            redirect('anggota/login');
        }
    }
} //end model
