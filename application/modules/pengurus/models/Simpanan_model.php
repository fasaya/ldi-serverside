<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
    // ########################################
    // DATATABLES

    // SIMPANAN POKOK
    function make_query_simpPokok()
    {

        $this->db->select("tb_simpanan_pokok.*, tb_anggota.nama, tb_anggota.no_anggota");
        $this->db->where("tb_simpanan_pokok.id_anggota = tb_anggota.id_anggota");
        $this->db->from("tb_simpanan_pokok, tb_anggota");

        $column_search = array('tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_simpanan_pokok.kode_tr');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "date", "no_anggota", "kode_tr", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_simpPokok()
    {
        $this->make_query_simpPokok();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_simpPokok()
    {
        $this->make_query_simpPokok();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_simpPokok()
    {
        $this->make_query_simpPokok();
        return $this->db->count_all_results();
    }

    // SIMPANAN WAJIB
    function make_query_simpWajib()
    {

        $this->db->select("tb_simpanan_wajib.*, tb_anggota.nama, tb_anggota.no_anggota");
        $this->db->where("tb_simpanan_wajib.id_anggota = tb_anggota.id_anggota");
        $this->db->from("tb_simpanan_wajib, tb_anggota");

        $column_search = array('tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_simpanan_wajib.kode_tr');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "date", "no_anggota", "kode_tr", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
            $this->db->order_by("bulan_tahun", "DESC");
        }
    }
    function make_datatables_simpWajib()
    {
        $this->make_query_simpWajib();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_simpWajib()
    {
        $this->make_query_simpWajib();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_simpWajib()
    {
        $this->make_query_simpWajib();
        return $this->db->count_all_results();
    }

    // SIMPANAN SUKARELA
    function make_query_simpSukarela()
    {

        $this->db->select("tb_simpanan_sukarela.*, tb_anggota.nama, tb_anggota.no_anggota");
        $this->db->where("tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota");
        $this->db->from("tb_simpanan_sukarela, tb_anggota");

        $column_search = array('tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_simpanan_sukarela.kode_tr');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "date", "no_anggota", "kode_tr", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_simpSukarela()
    {
        $this->make_query_simpSukarela();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_simpSukarela()
    {
        $this->make_query_simpSukarela();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_simpSukarela()
    {
        $this->make_query_simpSukarela();
        return $this->db->count_all_results();
    }

    // BAGI UNTUNG
    function make_query_bagiuntung()
    {

        $this->db->select("tb_bagi_untung.kode_tr AS kode_tr_bu, tb_bagi_untung.amount, tb_bagi_untung.date, tb_bagi_untung.persen, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota");
        $this->db->where("tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
        AND tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela");
        $this->db->from("tb_bagi_untung, tb_simpanan_sukarela, tb_anggota");

        $column_search = array('tb_bagi_untung.kode_tr', 'tb_bagi_untung.date', 'tb_simpanan_sukarela.kode_tr', 'tb_anggota.nama', 'tb_anggota.no_anggota');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "date", "no_anggota", "kode_tr", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_bagiuntung()
    {
        $this->make_query_bagiuntung();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_bagiuntung()
    {
        $this->make_query_bagiuntung();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_bagiuntung()
    {
        $this->make_query_bagiuntung();
        return $this->db->count_all_results();
    }

    // BAGI UNTUNG
    function make_query_komisisponsor()
    {

        $this->db->select("tb_komisi_sponsor.kode_tr AS kode_tr_ks, tb_komisi_sponsor.amount, tb_komisi_sponsor.date, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota");
        $this->db->where("tb_komisi_sponsor.id_parent = tb_anggota.id_anggota
        AND tb_simpanan_sukarela.id_simpanan = tb_komisi_sponsor.id_simp_sukarela");
        $this->db->from("tb_komisi_sponsor, tb_simpanan_sukarela, tb_anggota");

        $column_search = array('tb_komisi_sponsor.kode_tr', 'tb_komisi_sponsor.date', 'tb_simpanan_sukarela.kode_tr', 'tb_anggota.nama', 'tb_anggota.no_anggota');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "date", "no_anggota", "kode_tr", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_komisisponsor()
    {
        $this->make_query_komisisponsor();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_komisisponsor()
    {
        $this->make_query_komisisponsor();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_komisisponsor()
    {
        $this->make_query_komisisponsor();
        return $this->db->count_all_results();
    }

    // ########################################

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
