<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function view($view, $main = "")
    {
        $header['kosong'] = "kosong";
        // $main['kosong'] = "kosong";
        $footer['kosong'] = "kosong";

        $this->load->view('v_header', $header);
        $this->load->view($view, $main);
        $this->load->view('v_footer', $footer);
    }
} //end model
