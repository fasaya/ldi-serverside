<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Dashboard_model', 'Dashboard');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $main['grafik'] = $this->grafik();
        $main['activity'] = $this->Dashboard->semua_report_activity();
        $this->Main->view('dashboard', $main);
    }

    public function peringatansimpananwajib()
    {
        $this->db->select("id_anggota, no_anggota, nama");
        $this->db->from("tb_anggota");
        $this->db->where("status = '1'");
        $this->db->order_by("join_date", "DESC");
        $main['anggota'] = $this->db->get()->result();
        $main['array_anggota'] = $this->array_blm_byr_simp_wajib();

        $this->Main->view('alert/simpanan_wajib', $main);
    }

    public function peringatansimpananpokok()
    {
        $this->db->select("id_anggota, no_anggota, nama");
        $this->db->from("tb_anggota");
        $this->db->where("status = '1'");
        $this->db->order_by("join_date", "DESC");
        $main['anggota'] = $this->db->get()->result();

        $main['title'] = "Simpanan Pokok";
        $this->Main->view('alert/simpanan_pokok', $main);
    }

    private function grafik()
    {
        $hari_ini = new_date();
        $tahun_ini = date("Y", strtotime($hari_ini));
        // $bulan_ini = date("m", strtotime($hari_ini));

        $grafik = "<div class='chart chart-md' id='morrisBar'></div><script type='text/javascript'>var morrisBarData = [";

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $namaBulan = date("F", mktime(0, 0, 0, $bulan, 10));

            $query1 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_wajib
                                            WHERE MONTH(bulan_tahun)="' . $bulan . '"
                                            AND YEAR(bulan_tahun)="' . $tahun_ini . '"');
            $result1 = $query1->row_array();
            $s_wajib = $result1['SUM(amount)'];

            $query2 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_pokok 
                                            WHERE MONTH(date)="' . $bulan . '"
                                            AND YEAR(date)="' . $tahun_ini . '"');
            $result2 = $query2->row_array();
            $s_pokok = $result2['SUM(amount)'];

            $query3 = $this->db->query(' SELECT SUM(amount) FROM tb_simpanan_sukarela
                                            WHERE MONTH(date)="' . $bulan . '"
                                            AND YEAR(date)="' . $tahun_ini . '"');
            $result3 = $query3->row_array();
            $s_sukarela = $result3['SUM(amount)'];

            $simpanan = $s_wajib + $s_pokok + $s_sukarela;
            if ($simpanan <= 0) {
                $simpanan = 0;
            }

            $query_pinjaman = $this->db->query('SELECT SUM(amount)
                                            FROM tb_pinjaman
                                            WHERE MONTH(start_date)="' . $bulan . '"
                                            AND YEAR(start_date)="' . $tahun_ini . '"');
            $result_pinjaman = $query_pinjaman->row_array();
            $pinjaman = $result_pinjaman['SUM(amount)'];
            if ($pinjaman <= 0) {
                $pinjaman = 0;
            }

            if ($bulan < 12) {
                $grafik .= "{
                    y: '" . $namaBulan . "',
                    a: " . $simpanan . ",
                    b: " . $pinjaman . "
                },";
            } else {
                $grafik .= "{
                    y: '" . $namaBulan . "',
                    a: " . $simpanan . ",
                    b: " . $pinjaman . "
                }];</script>";
            }
        }

        return $grafik;
    }

    // ##################################################

    private function array_blm_byr_simp_wajib()
    {
        $this->db->select("id_anggota, join_date");
        $this->db->from("tb_anggota");
        $this->db->where("status = '1'");
        $this->db->order_by("join_date", "ASC");
        $anggota = $this->db->get()->result();

        $hari_ini = new_date();
        $tahun_ini = date("Y", strtotime($hari_ini));
        $bulan_ini = date("m", strtotime($hari_ini));

        $anggota_belum_bayar = 0;
        $simpanan_belum_dibayar = 0;
        $sudah_bayar = TRUE;

        $array_anggota = [];

        foreach ($anggota as $r) {

            // echo "<br>anggota: " . $r->id_anggota . "<br>";

            $tgl = date("Y-m", strtotime($r->join_date));
            $tahun = date("Y", strtotime($tgl));
            $bulan = date("m", strtotime($tgl));
            for ($i = 1; $tahun <= $tahun_ini && $bulan <= $bulan_ini; $i++) {
                // echo $tgl . "<br>";

                $tgl = date("Y-m", strtotime($tgl));
                $tahun = date("Y", strtotime($tgl));
                $bulan = date("m", strtotime($tgl));

                // echo $tahun . "-" . $bulan;

                $query1 = $this->db->query('SELECT YEAR(bulan_tahun), MONTH(bulan_tahun)
                                            FROM tb_simpanan_wajib
                                            WHERE id_anggota = "' . $r->id_anggota . '"
                                            AND MONTH(bulan_tahun)="' . $bulan . '"
                                            AND YEAR(bulan_tahun)="' . $tahun . '"');

                $cek1 = $query1->num_rows();
                // $result1 = $query1->row_array();
                // $tgl_db = $result1['YEAR(bulan_tahun)'] . "-" . $result1['MONTH(bulan_tahun)'];

                // echo "tgl_db: " . $tgl_db . "<br>";

                if ($cek1 >= 1) {
                    $sudah_bayar = TRUE;
                } else {
                    $sudah_bayar = FALSE;
                    // $simpanan_belum_dibayar = $simpanan_belum_dibayar + 1;
                }

                if ($sudah_bayar == FALSE) {
                    // $anggota_belum_bayar = $anggota_belum_bayar + 1;
                    array_push($array_anggota, $r->id_anggota);
                    // echo $r->id_anggota;
                }

                $tgl = date("Y-m", strtotime("+" . $i . " month", strtotime($tgl)));
                $tahun = date("Y", strtotime($tgl));
                $bulan = date("m", strtotime($tgl));

                // echo "simpanan_belum_dibayar: " . $simpanan_belum_dibayar .
                //     "<br>sudah_bayar: " . $sudah_bayar . "<br>";

                // 
            }
        }
        // return $anggota_belum_bayar;
        return $array_anggota;
    }
}
