<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');

        $this->Main->cek_login();
    }

    // MAIN

    public function index()
    {
        $this->filter();
    }

    public function filter()
    {
        // $this->form_validation->set_rules('hari', 'hari', 'numeric|required');
        $this->form_validation->set_rules('bulan', 'bulan', 'numeric');
        $this->form_validation->set_rules('tahun', 'tahun', 'numeric');
        if ($this->form_validation->run() == false) {
            $main['mutasi'] = $this->Balance->get_mutasiDompetAnggota();
            $this->Main->view('mutasi', $main);
        } else {
            // $hari = $this->input->post('hari', TRUE);
            $bulan = $this->input->post('bulan', TRUE);
            $tahun = $this->input->post('tahun', TRUE);
            $id_anggota = $this->session->userdata('id_user');

            $this->db->select("date, kode_tr, debit, credit, saldo, deskripsi");
            $this->db->from("tb_report");
            $this->db->where("id_anggota", $id_anggota);
            if ($bulan != "") {
                $this->db->where("MONTH(date)", $bulan);
            }
            if ($tahun != "") {
                $this->db->where("YEAR(date)", $tahun);
            }
            $this->db->order_by("date", "DESC");
            $this->db->order_by("kode_tr", "DESC");
            $main['mutasi'] = $this->db->get()->result();

            $this->Main->view('mutasi', $main);
        }
    }
}
