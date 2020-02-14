<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{
    function get_blog($limit, $start)
    {
        $this->db->select("*");
        $this->db->where("is_deleted = '0'");
        $this->db->from("tb_blog");
        $this->db->order_by("date", "DESC");
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    function count_blog()
    {
        $query = $this->db->query('SELECT * FROM tb_blog WHERE is_deleted = "0" ORDER BY date DESC');
        return $query->num_rows();
    }
} //end model
