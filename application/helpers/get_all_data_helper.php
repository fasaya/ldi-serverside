<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_all_data')) {

    function get_all_data($table)
    {
        $ci = &get_instance();
        $ci->db->select("*");
        $ci->db->from($table);
        return $ci->db->count_all_results();
    }
}
