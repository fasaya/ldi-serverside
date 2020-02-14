<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    // #########################################

    // DASHBOARD

    function jumlah_anggota()
    {
        $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_anggota 
                                    WHERE status = "1" ');
        return $query->num_rows();
    }

    function jumlah_simpanan()
    {
        $query = $this->db->query(" SELECT SUM(amount) FROM tb_simpanan_wajib
                                    UNION ALL
                                    SELECT SUM(amount) FROM tb_simpanan_pokok
                                    UNION ALL
                                    SELECT SUM(amount) FROM tb_simpanan_sukarela
                                    ");
        $result = $query->row_array();
        return $result['SUM(amount)'];
    }

    function semua_report_activity()
    {
        return $this->db->select("id_user, user, keterangan, date")
            ->from("tb_report_activity")
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }


    // ###########################################################################

} //end model
