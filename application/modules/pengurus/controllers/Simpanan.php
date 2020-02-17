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
        // $main['simpanan'] = $this->Simpanan->get_simpanan_wajib();
        $this->Main->view('simpanan/wajib');
    }
    public function pokok()
    {
        // $main['simpanan'] = $this->Simpanan->get_simpanan_pokok();
        $this->Main->view('simpanan/pokok');
    }
    public function sukarela()
    {
        // $main['simpanan'] = $this->Simpanan->get_simpanan_sukarela();
        $this->Main->view('simpanan/sukarela');
    }
    public function sudahditransfer()
    {
        $main['simpanan'] = $this->Simpanan->get_simpanan_sudahditransfer();
        $this->Main->view('simpanan/sudahditransfer', $main);
    }

    public function bagiuntung()
    {
        // $main['bagiuntung'] = $this->Simpanan->get_bagi_untung();
        $this->Main->view('simpanan/bagiuntung');
    }

    public function komisipromosi()
    {
        // $main['komisisponsor'] = $this->Simpanan->get_komisi_sponsor();
        $this->Main->view('simpanan/komisi_sponsor');
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

    // datatables 
    function fetch_semua_simpanan()
    {
        $fetch_data = $this->Simpanan->make_datatables_semuaSimp();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {
            $kode = substr($r->kode_tr, 0, 2);
            if ($kode == "SW") {
                $desc = "Simpanan wajib";
            } elseif ($kode == "SP") {
                $desc = "Simpanan pokok";
            } elseif ($kode == "SS") {
                $desc = "Simpanan sukarela";
            }

            $hari_ini = strtotime(new_date());
            $date = $r->date;
            $tgl_tambah1thn =  strtotime("+1 year", strtotime($date));
            $kurang = $hari_ini - $tgl_tambah1thn;
            $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

            if ($selisih >= 0 && $r->is_in_saldo == "0") {
                $link = 'Belum ditransfer';
            } elseif ($selisih >= 0 && $r->is_in_saldo == "1") {
                $link = 'Sudah ditransfer';
            } else {
                $link = '';
            }

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = $desc;
            $sub_array[] = rupiah($r->amount);
            $sub_array[] = $link;
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_semuaSimp(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_semuaSimp(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_simpPokok()
    {
        $fetch_data = $this->Simpanan->make_datatables_simpPokok();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_simpPokok(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_simpPokok(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_simpWajib()
    {
        $fetch_data = $this->Simpanan->make_datatables_simpWajib();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->bulan_tahun;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_simpWajib(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_simpWajib(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_simpSukarela()
    {
        $fetch_data = $this->Simpanan->make_datatables_simpSukarela();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_simpSukarela(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_simpSukarela(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_bagiuntung()
    {
        $fetch_data = $this->Simpanan->make_datatables_bagiuntung();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr_bu;
            $sub_array[] = $r->kode_tr_ss;
            $sub_array[] = rupiah($r->amount);;
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_bagiuntung(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_bagiuntung(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_komisisponsor()
    {
        $fetch_data = $this->Simpanan->make_datatables_komisisponsor();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = $r->date;
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr_ks;
            $sub_array[] = $r->kode_tr_ss;
            $sub_array[] = rupiah($r->amount);;
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Simpanan->get_all_data_komisisponsor(),
            "recordsFiltered" => $this->Simpanan->get_filtered_data_komisisponsor(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
