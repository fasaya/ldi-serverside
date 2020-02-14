<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helper_model extends CI_Model
{

    function status_donasi_baru($status)
    {
        if ($status == "1") {
            return '<span class="badge badge-primary">Sudah dikonfirmasi</span>';
        } elseif ($status == "2") {
            return '<span class="badge badge-warning">Pending</span>';
        } else {
            return '<span class="badge badge-success">Baru</span>';
        }
    }

    function anonim($anon)
    {
        if ($anon == "1") {
            return '<span class="badge badge-warning">Anononim</span>';
        } else {
            return '';
        }
    }

    function cek_total_donasi_baru()
    {
        $query = $this->db->query(' SELECT kode
                                    FROM tb_donasi_baru
                                    WHERE status = "0"');
        return $query->num_rows();
    }

    function setting($kode = null, $ket = "nilai")
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

    function isi_web($kode)
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

    function textToSlug($text = '')
    {
        $text = trim($text);
        if (empty($text)) return '';
        $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
        $text = strtolower(trim($text));
        $text = str_replace(' ', '-', $text);
        $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
        return $text;
    }

    // sssssssssssssssssssss

    function nama_bank($id)
    {
        $query = $this->db->query(' SELECT bank
                                    FROM bank 
                                    WHERE id_bank = "' . $id . '" ');
        $result = $query->row_array();
        return $result['bank'];
    }

    function nama_provinsi($id)
    {
        $query = $this->db->query(' SELECT name
                                    FROM provinsi 
                                    WHERE id = "' . $id . '" ');
        $result = $query->row_array();
        return $result['name'];
    }
} //end model
