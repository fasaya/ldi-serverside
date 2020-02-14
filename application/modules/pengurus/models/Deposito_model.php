<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito_model extends CI_Model
{
    function get_deposito()
    {
        $this->db->select("tb_anggota.no_anggota, tb_deposito.kode_tr, tb_deposito.amount, tb_deposito.bulan, tb_deposito.start_date, tb_deposito.end_date, tb_deposito.status, tb_deposito.tipe");
        $this->db->from("tb_deposito, tb_anggota");
        $this->db->where("tb_deposito.id_anggota = tb_anggota.id_anggota");
        $this->db->order_by("tb_deposito.start_date", "DESC");
        return $this->db->get()->result();
    }

    function get_royalti()
    {
        $this->db->select("tb_royalti.kode_tr AS kode_RY, tb_deposito.kode_tr AS kode_DO, tb_royalti.amount, tb_royalti.date, tb_anggota.no_anggota");
        $this->db->from("tb_royalti, tb_deposito, tb_anggota");
        $this->db->where("tb_royalti.id_deposito = tb_deposito.id_deposito");
        $this->db->where("tb_deposito.id_anggota = tb_anggota.id_anggota");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_deviden()
    {
        $this->db->select("tb_deviden.kode_tr AS kode_DV, tb_deposito.kode_tr AS kode_DO, tb_deviden.amount, tb_deviden.date, tb_anggota.no_anggota");
        $this->db->from("tb_deviden, tb_deposito, tb_anggota");
        $this->db->where("tb_deviden.id_deposito = tb_deposito.id_deposito");
        $this->db->where("tb_deposito.id_anggota = tb_anggota.id_anggota");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    // ####################################################

    function total_deposito()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_deposito');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function total_deviden()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_deviden');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function total_royalti()
    {
        $query = $this->db->query(' SELECT SUM(amount)
                                    FROM tb_royalti');
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }
} //end model
