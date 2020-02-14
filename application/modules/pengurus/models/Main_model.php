<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    function view($view, $main = '')
    {
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Alert_model', 'Alert');

        $id_user = $this->session->userdata('id_user');
        $query = $this->db->query(' SELECT 
                                            username, status, nama
                                        FROM tb_pengurus
                                        WHERE id_pengurus = "' . $id_user . '" ');
        $result = $query->row_array();
        $header['user'] = $result;

        $header['total_alert'] = $this->Alert->total_alert();

        $this->load->view('v_header', $header);
        $this->load->view($view, $main);
        $this->load->view('v_footer');
    }

    function cek_login()
    {
        $id_user = $this->session->userdata('id_user');
        $log_stat = $this->session->userdata('log_stat');
        $ket = $this->session->userdata('keterangan');

        if (empty($id_user) || $id_user == "" || $log_stat != TRUE || $ket != 'pengurus') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda tidak valid. Mohon melakukan login terlebih dahulu!</div>');
            redirect('pengurus/login');
        }
    }
} //end model
