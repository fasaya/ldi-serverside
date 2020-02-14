<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alert_model extends CI_Model
{

    function total_alert()
    {
        return $this->alert_deposit_new() + $this->alert_deposit_pending() + $this->alert_withdraw_pending() + $this->alert_calon_anggota() + $this->alert_belum_bayar_pinjaman() + $this->jumlah_belum_bayar_simpanan_pokok() + $this->jumlah_belum_bayar_simpanan_wajib() + $this->alert_pengajuan_pinjaman();
    }

    // Deposit new
    function alert_deposit_new()
    {
        $query = $this->db->query(' SELECT id_deposit
                                    FROM tb_deposit
                                    WHERE status = "0"');
        return $query->num_rows();
    }

    // Deposit pending
    function alert_deposit_pending()
    {
        $query = $this->db->query(' SELECT id_deposit
                                    FROM tb_deposit
                                    WHERE status = "2"');
        return $query->num_rows();
    }

    // WD pending
    function alert_withdraw_pending()
    {
        $query = $this->db->query(' SELECT id_withdrawal
                                    FROM tb_withdrawal
                                    WHERE status = "0"');
        return $query->num_rows();
    }

    // calon anggota
    function alert_calon_anggota()
    {
        $query = $this->db->query(' SELECT id_anggota
                                    FROM tb_anggota
                                    WHERE id_parent = "0" AND status = "0"');
        return $query->num_rows();
    }

    // belum bayar pinjaman
    function alert_belum_bayar_pinjaman()
    {
        $query = $this->db->query(' SELECT id_bayar
                                    FROM tb_pinjaman_bayar
                                    WHERE status = "0"');
        return $query->num_rows();
    }
    // belum bayar pinjaman
    function alert_pengajuan_pinjaman()
    {
        $query = $this->db->query(' SELECT id_pinjaman
                                    FROM tb_pinjaman
                                    WHERE status = "0"');
        return $query->num_rows();
    }


    function jumlah_belum_bayar_simpanan_pokok()
    {

        $query1 = $this->db->query(' SELECT id_simpanan
                                    FROM tb_simpanan_pokok');
        $sudah_simpanan_pokok = $query1->num_rows();

        $query2 = $this->db->query(' SELECT id_anggota
                                            FROM tb_anggota
                                            WHERE status = "1"');
        $jumlah_anggota = $query2->num_rows();

        return $jumlah_anggota - $sudah_simpanan_pokok;
    }

    function jumlah_belum_bayar_simpanan_wajib()
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
                    $simpanan_belum_dibayar = $simpanan_belum_dibayar + 1;
                }

                if ($sudah_bayar == FALSE) {
                    $anggota_belum_bayar = $anggota_belum_bayar + 1;
                }

                $tgl = date("Y-m", strtotime("+" . $i . " month", strtotime($tgl)));
                $tahun = date("Y", strtotime($tgl));
                $bulan = date("m", strtotime($tgl));

                // echo "simpanan_belum_dibayar: " . $simpanan_belum_dibayar .
                //     "<br>sudah_bayar: " . $sudah_bayar . "<br>";

                // 
            }
        }
        return $anggota_belum_bayar;
        // return 
        //     "<br>anggota_belum_bayar: " . $anggota_belum_bayar .
        //     "<br>simpanan_belum_dibayar: " . $simpanan_belum_dibayar .
        //     "<br>sudah_bayar: " . $sudah_bayar;
    }
} //end model
