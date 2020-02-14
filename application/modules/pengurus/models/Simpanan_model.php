<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
    function get_semuaSimpanan()
    {
        $query = $this->db->query(" SELECT  tb_simpanan_pokok.kode_tr, 
                                            tb_simpanan_pokok.id_anggota, 
                                            tb_simpanan_pokok.amount, 
                                            tb_simpanan_pokok.date, 
                                            tb_simpanan_pokok.is_in_saldo, 
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_pokok, tb_anggota 
                                        WHERE tb_simpanan_pokok.id_anggota = tb_anggota.id_anggota
                                    UNION ALL
                                    SELECT  tb_simpanan_wajib.kode_tr, 
                                            tb_simpanan_wajib.id_anggota, 
                                            tb_simpanan_wajib.amount, 
                                            tb_simpanan_wajib.date, 
                                            tb_simpanan_wajib.is_in_saldo,
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_wajib, tb_anggota 
                                        WHERE tb_simpanan_wajib.id_anggota = tb_anggota.id_anggota
                                    UNION ALL
                                    SELECT  tb_simpanan_sukarela.kode_tr, 
                                            tb_simpanan_sukarela.id_anggota, 
                                            tb_simpanan_sukarela.amount, 
                                            tb_simpanan_sukarela.date, 
                                            tb_simpanan_sukarela.is_in_saldo,
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_sukarela, tb_anggota 
                                        WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date DESC
                                    ");
        return $query->result();
    }

    function get_simpanan_pokok()
    {
        $query = $this->db->query(" SELECT tb_simpanan_pokok.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_pokok, tb_anggota
                                    WHERE tb_simpanan_pokok.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date DESC");
        return $query->result();
    }
    function get_simpanan_wajib()
    {
        $query = $this->db->query(" SELECT tb_simpanan_wajib.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_wajib, tb_anggota
                                    WHERE tb_simpanan_wajib.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date DESC, bulan_tahun DESC");
        return $query->result();
    }
    function get_simpanan_sukarela()
    {
        $query = $this->db->query(" SELECT tb_simpanan_sukarela.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date DESC");
        return $query->result();
    }
    function get_simpanan_sudahditransfer()
    {
        $query = $this->db->query(" SELECT tb_simp_bisa_diambil.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simp_bisa_diambil, tb_anggota
                                    WHERE tb_simp_bisa_diambil.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date DESC");
        return $query->result();
    }

    function get_bagi_untung()
    {
        $query = $this->db->query(" SELECT tb_bagi_untung.kode_tr AS kode_tr_bu, tb_bagi_untung.amount, tb_bagi_untung.date, tb_bagi_untung.persen, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_bagi_untung, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela
                                    ORDER BY date DESC");
        return $query->result();
    }

    function get_komisi_sponsor()
    {
        $query = $this->db->query(" SELECT tb_komisi_sponsor.kode_tr AS kode_tr_ks, tb_komisi_sponsor.amount, tb_komisi_sponsor.date, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_komisi_sponsor, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_komisi_sponsor.id_parent = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_komisi_sponsor.id_simp_sukarela
                                    ORDER BY date DESC");
        return $query->result();
    }

    // ###############################################

    // Export

    function export_semuaSimpanan()
    {
        $query = $this->db->query(" SELECT  tb_simpanan_pokok.kode_tr, 
                                            tb_simpanan_pokok.id_anggota, 
                                            tb_simpanan_pokok.amount, 
                                            tb_simpanan_pokok.date, 
                                            tb_simpanan_pokok.is_in_saldo, 
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_pokok, tb_anggota 
                                        WHERE tb_simpanan_pokok.id_anggota = tb_anggota.id_anggota
                                    UNION ALL
                                    SELECT  tb_simpanan_wajib.kode_tr, 
                                            tb_simpanan_wajib.id_anggota, 
                                            tb_simpanan_wajib.amount, 
                                            tb_simpanan_wajib.date, 
                                            tb_simpanan_wajib.is_in_saldo, 
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_wajib, tb_anggota 
                                        WHERE tb_simpanan_wajib.id_anggota = tb_anggota.id_anggota
                                    UNION ALL
                                    SELECT  tb_simpanan_sukarela.kode_tr, 
                                            tb_simpanan_sukarela.id_anggota, 
                                            tb_simpanan_sukarela.amount, 
                                            tb_simpanan_sukarela.date, 
                                            tb_simpanan_sukarela.is_in_saldo, 
                                            tb_anggota.nama,
                                            tb_anggota.no_anggota
                                    FROM tb_simpanan_sukarela, tb_anggota 
                                        WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date ASC
                                    ");
        return $query->result();
    }

    function export_simpanan_pokok()
    {
        $query = $this->db->query(" SELECT tb_simpanan_pokok.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_pokok, tb_anggota
                                    WHERE tb_simpanan_pokok.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date ASC");
        return $query->result();
    }

    function export_simpanan_wajib()
    {
        $query = $this->db->query(" SELECT tb_simpanan_wajib.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_wajib, tb_anggota
                                    WHERE tb_simpanan_wajib.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date ASC");
        return $query->result();
    }

    function export_simpanan_sukarela()
    {
        $query = $this->db->query(" SELECT tb_simpanan_sukarela.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date ASC");
        return $query->result();
    }

    function export_simp_sdh_ditrf()
    {
        $query = $this->db->query(" SELECT tb_simp_bisa_diambil.*, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_simp_bisa_diambil, tb_anggota
                                    WHERE tb_simp_bisa_diambil.id_anggota = tb_anggota.id_anggota
                                    ORDER BY date ASC");
        return $query->result();
    }

    function export_bagiuntung()
    {
        $query = $this->db->query(" SELECT tb_bagi_untung.id_bagi_untung, tb_bagi_untung.kode_tr AS kode_tr_bu, tb_bagi_untung.amount, tb_bagi_untung.date, tb_bagi_untung.persen, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_bagi_untung, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela
                                    ORDER BY date ASC");
        return $query->result();
    }

    function export_komisipromosi()
    {
        $query = $this->db->query(" SELECT tb_komisi_sponsor.id_komisi_sponsor, tb_komisi_sponsor.kode_tr AS kode_tr_ks, tb_komisi_sponsor.amount, tb_komisi_sponsor.date, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_komisi_sponsor, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_komisi_sponsor.id_parent = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_komisi_sponsor.id_simp_sukarela
                                    ORDER BY date ASC");
        return $query->result();
    }


    // ###############################################

    function total_simpanan_wajib()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_wajib');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }
    function total_simpanan_pokok()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_pokok');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }
    function total_simpanan_sukarela()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simpanan_sukarela');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }
    function total_simpanan_yg_bisa_diambil()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_simp_bisa_diambil');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }
} //end model
