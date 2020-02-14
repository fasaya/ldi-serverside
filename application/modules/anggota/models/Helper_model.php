<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helper_model extends CI_Model
{

    function setting($kode = null, $ket = "nilai")
    {
        //$ket dapat berupa 'nilai' atau 'status'
        $query = $this->db->query(' SELECT nilai,status
                                    FROM tb_lentera_setting
                                    WHERE kode = "' . $kode . '" ');
        $result = $query->row_array();
        if ($result) {
            return $result[$ket];
        }
    }

    function setting_web($kode = null, $ket = "nilai")
    {
        //$ket dapat berupa 'nilai' atau 'status'
        $query = $this->db->query(' SELECT nilai
                                    FROM tb_setting
                                    WHERE kode = "' . $kode . '" ');
        $result = $query->row_array();
        if ($result) {
            return $result[$ket];
        }
    }

    function setting_isi_web($kode = null)
    {
        //$ket dapat berupa 'nilai' atau 'status'
        $query = $this->db->query(' SELECT isi
                                    FROM isi_web
                                    WHERE kode = "' . $kode . '" ');
        $result = $query->row_array();
        if ($result) {
            return $result['isi'];
        }
    }

    function get_username($id_anggota = "")
    {
        if ($id_anggota == "") {
            $id_anggota = $this->session->userdata('id_user');
        }
        $query = $this->db->query(' SELECT username
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        $result = $query->row_array();
        return $result['username'];
    }

    function getNoAnggotaById($id_anggota)
    {
        $query = $this->db->query(' SELECT no_anggota
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        $result = $query->row_array();
        return $result['no_anggota'];
    }

    function getIdByUsername($username = "")
    {
        $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_anggota 
                                    WHERE username = "' . $username . '" ');
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['id_anggota'];
        }
    }

    function getIdParentAnggota($id_anggota)
    {
        $query = $this->db->query(' SELECT id_parent
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return $result['id_parent'];
        }
    }


    // #####################################

    // CEK APAKAH SUDAH MENJADI ANGGOTA
    function cek_isAnggota()
    {
        $BP = $this->cek_biaya_pendaftaran();
        $SW = $this->cek_simpanan_wajib();
        $SP = $this->cek_simpanan_pokok();


        if ($BP == FALSE && $SW == FALSE && $SP == FALSE) {
            return TRUE; // sudah menjadi anggota
        } else {
            return FALSE; // belum sah menjadi anggota
        }
    }

    // #####################################

    // CEK APAKAH SUDAH BIAYA PENDAFTARAN
    function cek_biaya_pendaftaran()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT id_biaya_daftar
                                    FROM tb_biaya_pendaftaran
                                    WHERE id_anggota = "' . $id_anggota . '"');

        if ($query->num_rows() > 0) {
            return FALSE; // sudah bayar
        } else {
            return TRUE;
        }
    }

    // CEK APAKAH SUDAH BAYAR SIMPANAN POKOK DAN WAJIB
    function is_sudah_bayar_simpanan()
    {
        if ($this->cek_simpanan_wajib() == FALSE || $this->cek_simpanan_pokok() == FALSE) {
            return TRUE; // sudah bayar
        } else {
            return FALSE;
        }
    }

    // CEK APAKAH SUDAH BAYAR SIMPANAN WAJIB
    function cek_simpanan_pokok()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT id_simpanan
                                    FROM tb_simpanan_pokok
                                    WHERE id_anggota = "' . $id_anggota . '"');

        if ($query->num_rows() > 0) {
            return FALSE; // sudah bayar
        } else {
            return TRUE;
        }
    }

    // CEK APAKAH SUDAH BAYAR SIMPANAN POKOK
    function cek_simpanan_wajib()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT id_simpanan
                                    FROM tb_simpanan_wajib
                                    WHERE id_anggota = "' . $id_anggota . '"');

        if ($query->num_rows() > 0) { // sudah bayar simpanan awal
            $hari_ini = new_date();
            $tahun_ini = date("Y", strtotime($hari_ini));
            $bulan_ini = date("m", strtotime($hari_ini));

            $query_simpanan = $this->db->query(' SELECT id_simpanan FROM tb_simpanan_wajib
                                                    WHERE MONTH(bulan_tahun)="' . $bulan_ini . '"
                                                    AND YEAR(bulan_tahun)="' . $tahun_ini . '"
                                                    AND id_anggota = "' . $id_anggota . '"
                                                ');
            $result_simpanan = $query_simpanan->row_array();
            $simpanan = $result_simpanan['id_simpanan'];
            if ($simpanan >= 1) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else { // belum bayar sama sekali
            return TRUE;
        }
    }

    // ############################################

    function generate_kodeTR($jenis)
    {
        // cari table dengan kode
        if ($jenis == "DP") {
            $table = "tb_deposit";
        } elseif ($jenis == "WD") {
            $table = "tb_withdrawal";
        } elseif ($jenis == "SP") {
            $table = "tb_simpanan_pokok";
        } elseif ($jenis == "SW") {
            $table = "tb_simpanan_wajib";
        } elseif ($jenis == "SS") {
            $table = "tb_simpanan_sukarela";
        } elseif ($jenis == "BS") {
            $table = "tb_bonus_sponsor";
        } elseif ($jenis == "BP") {
            $table = "tb_biaya_pendaftaran";
        } elseif ($jenis == "DO") {
            $table = "tb_deposito";
        } elseif ($jenis == "RO") {
            $table = "tb_royalti";
        } elseif ($jenis == "DV") {
            $table = "tb_deviden";
        } elseif ($jenis == "PJ") {
            $table = "tb_pinjaman";
        } elseif ($jenis == "PB") {
            $table = "tb_pinjaman_bayar";
        } elseif ($jenis == "KS") {
            $table = "tb_komisi_sponsor";
        } elseif ($jenis == "BU") {
            $table = "tb_bagi_untung";
        } elseif ($jenis == "BW") {
            $table = "tb_biaya_withdraw";
        } elseif ($jenis == "ST") {
            $table = "tb_simp_bisa_diambil";
        } elseif ($jenis == "") {
            $table = "tb_anggota";
        }

        $next = $this->db->query("SHOW TABLE STATUS LIKE '" . $table . "'");
        $next = $next->row(0);
        $next->Auto_increment;
        $nmr = $next->Auto_increment;

        $karakter = strlen($nmr);
        if ($karakter == 1) {
            $nomor = "000000" . $nmr;
        } elseif ($karakter == 2) {
            $nomor = "00000" . $nmr;
        } elseif ($karakter == 3) {
            $nomor = "0000" . $nmr;
        } elseif ($karakter == 4) {
            $nomor = "000" . $nmr;
        } elseif ($karakter == 5) {
            $nomor = "00" . $nmr;
        } elseif ($karakter == 6) {
            $nomor = "0" . $nmr;
        } else {
            $nomor = $nmr;
        }

        return $jenis . "-" . $nomor;
    }

    function generate_NO_ANGGOTA()
    {
        $next = $this->db->query("SHOW TABLE STATUS LIKE 'tb_anggota'");
        $next = $next->row(0);
        $next->Auto_increment;
        $nmr = $next->Auto_increment;

        $karakter = strlen($nmr);
        if ($karakter == 1) {
            $nomor = "000000" . $nmr;
        } elseif ($karakter == 2) {
            $nomor = "00000" . $nmr;
        } elseif ($karakter == 3) {
            $nomor = "0000" . $nmr;
        } elseif ($karakter == 4) {
            $nomor = "000" . $nmr;
        } elseif ($karakter == 5) {
            $nomor = "00" . $nmr;
        } elseif ($karakter == 6) {
            $nomor = "0" . $nmr;
        } else {
            $nomor = $nmr;
        }

        return $nomor;
    }
} //end model
