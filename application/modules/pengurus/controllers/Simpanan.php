<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Simpanan_model', 'Simpanan');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $main['semua_simpanan'] = $this->Simpanan->get_semuaSimpanan();
        $this->Main->view('simpanan/semua', $main);
    }

    public function wajib()
    {
        $main['simpanan'] = $this->Simpanan->get_simpanan_wajib();
        $this->Main->view('simpanan/wajib', $main);
    }
    public function pokok()
    {
        $main['simpanan'] = $this->Simpanan->get_simpanan_pokok();
        $this->Main->view('simpanan/pokok', $main);
    }
    public function sukarela()
    {
        $main['simpanan'] = $this->Simpanan->get_simpanan_sukarela();
        $this->Main->view('simpanan/sukarela', $main);
    }
    public function sudahditransfer()
    {
        $main['simpanan'] = $this->Simpanan->get_simpanan_sudahditransfer();
        $this->Main->view('simpanan/sudahditransfer', $main);
    }

    public function bagiuntung()
    {
        $main['bagiuntung'] = $this->Simpanan->get_bagi_untung();
        $this->Main->view('simpanan/bagiuntung', $main);
    }

    public function komisipromosi()
    {
        $main['komisisponsor'] = $this->Simpanan->get_komisi_sponsor();
        $this->Main->view('simpanan/komisi_sponsor', $main);
    }

    // ############################################

    // EXPORT
    public function exportsemua()
    {
        $main['title'] =  "Simpanan";
        $main['simpanan'] =  $this->Simpanan->export_semuaSimpanan();
        $this->load->view('export/export_simpanan', $main);
    }

    public function exportpokok()
    {
        $main['title'] =  "Simpanan Pokok";
        $main['simpanan'] =  $this->Simpanan->export_simpanan_pokok();
        $this->load->view('export/export_simpanan', $main);
    }

    public function exportwajib()
    {
        $main['title'] =  "Simpanan Wajib";
        $main['simpanan'] =  $this->Simpanan->export_simpanan_wajib();
        $this->load->view('export/export_simp_wajib', $main);
    }

    public function exportsukarela()
    {
        $main['title'] =  "Simpanan Sukarela";
        $main['simpanan'] =  $this->Simpanan->export_simpanan_sukarela();
        $this->load->view('export/export_simpanan', $main);
    }

    public function exportbagiuntung()
    {
        $main['bagiuntung'] =  $this->Simpanan->export_bagiuntung();
        $this->load->view('export/export_bagiuntung', $main);
    }

    public function exportkomisipromosi()
    {
        $main['komisipromosi'] =  $this->Simpanan->export_komisipromosi();
        $this->load->view('export/export_komisipromosi', $main);
    }
    public function exportditransfer()
    {
        $main['simpanan'] =  $this->Simpanan->export_simp_sdh_ditrf();
        $this->load->view('export/export_simp_sdh_ditrf', $main);
    }
}
