<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Refresh_model extends CI_Model
{

    function refresh()
    {
        // echo "dp_sukses " . $this->Balance->deposit_sukses() . "<br>";
        // echo "deposito_aktif " . $this->Balance->deposito_aktif() . "<br>";
        // echo "deposito_nonaktif " . $this->Balance->deposito_nonaktif() . "<br>";
        // echo "deviden " . $this->Balance->deviden() . "<br>";
        // echo "royalti " . $this->Balance->royalti() . "<br>";
        // echo "biaya_pendaftaran " . $this->Balance->biaya_pendaftaran() . "<br>";
        // echo "bonus_sponsor " . $this->Balance->bonus_sponsor() . "<br>";
        // echo "total_simpanan " . $this->Balance->total_simpanan() . "<br>";

        if ($this->Helper->setting('REFRESH', 'status') == '1') {

            //Start database transaction
            $this->db->trans_start();

            // DEPOSITO 
            $query_deposito = $this->db->select("*")
                ->from("tb_deposito")
                ->where("status", '1')
                ->order_by("start_date", "ASC")
                ->get()
                ->result();

            foreach ($query_deposito as $r) {
                $id_deposito = $r->id_deposito;
                $id_anggota = $r->id_anggota;
                $kode_tr = $r->kode_tr;
                $amount = $r->amount;
                $deviden = $r->deviden;
                $bulan = $r->bulan;
                $kali = $r->kali;
                $tipe = $r->tipe;
                $awal = $r->start_date;
                $end = $r->end_date;
                $selisih1 = $this->hitungdate($end);

                // JIKA TIPE DEPOSITO ADALAH PRIORITAS
                if ($tipe == 'prioritas') {
                    // ROYALTI
                    $royalti = $r->royalti;

                    $roy = $amount * ($royalti / 100);

                    for ($no = 1; $no < $bulan; $no++) {

                        $balance0 = $this->Balance->total_balance($id_anggota);
                        $kode_tr_RY = $this->Helper->generate_kodeTR("RO");
                        $tgl = date("Y-m-d H:i:s", strtotime("+" . $no . " month", strtotime($awal)));

                        if ($this->hitungdate($tgl) >= 0) {


                            $query = $this->db->query(' SELECT date
                                                    FROM tb_royalti
                                                    WHERE id_deposito = "' . $id_deposito . '" 
                                                        AND date = "' . $tgl . '"');
                            $jumlahRowROY = $query->num_rows();

                            if ($jumlahRowROY <= 0) {
                                echo $tgl . "<br>";
                                $data2 = array(
                                    'kode_tr' => $kode_tr_RY,
                                    'id_deposito' => $id_deposito,
                                    'amount' => $roy,
                                    'nomor' => $no,
                                    'date' => $tgl,
                                    'status' => "1"
                                );
                                $this->db->insert('tb_royalti', $data2);
                                $id_royalti = $this->db->insert_id();

                                // report transaksi
                                $report_tr3 = array(
                                    'id_anggota' => $id_anggota,
                                    'id' => $id_royalti,
                                    'kode_tr' => $kode_tr_RY,
                                    'debit' => 0,
                                    'credit' => $roy,
                                    'saldo' => $balance0 + $roy,
                                    'deskripsi' => "Royalti " . $royalti . "% dari deposito [" . $kode_tr . "]",
                                    'tipe' => "royalti",
                                    'date' => $tgl
                                );
                                $this->db->insert('tb_report', $report_tr3);

                                // report activity
                                $report_act1 = array(
                                    'id_user' => $id_anggota,
                                    'user' => "anggota",
                                    'keterangan' => "Royalti [" . $kode_tr_RY . "] dari deposito [" . $kode_tr . "]",
                                    'date' => $tgl
                                );
                                $this->db->insert('tb_report_activity', $report_act1);
                            }
                        }
                    }
                }


                // PROSES DEVIDEN
                if ($selisih1 >= 0) { // APABILA SUDAH MENCAPAI END DATE

                    // $id_anggota = $this->session->userdata('id_user');
                    $kode_tr_DV = $this->Helper->generate_kodeTR("DV");
                    $date = new_date();
                    $currency = $this->Helper->setting('CURRENCY');

                    $balance1 = $this->Balance->total_balance($id_anggota);

                    $dev = $amount * ($deviden / 100);
                    $data1 = array(
                        'kode_tr' => $kode_tr_DV,
                        'id_deposito' => $id_deposito,
                        'no' => '1',
                        'amount' => $dev,
                        'date' => $end
                    );
                    $this->db->insert('tb_deviden', $data1);
                    $id_deviden = $this->db->insert_id();

                    $balance2 = $balance1 + $amount;
                    // report transaksi
                    $report_tr2 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_deviden,
                        'kode_tr' => $kode_tr,
                        'debit' => 0,
                        'credit' => $amount,
                        'saldo' => $balance2,
                        'deskripsi' => "Deposito [" . $kode_tr . "] telah berakhir",
                        'tipe' => "deposito_selesai",
                        'date' => $end
                    );
                    $this->db->insert('tb_report', $report_tr2);

                    $balance3 = $balance2 + $dev;
                    // report transaksi
                    $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_deviden,
                        'kode_tr' => $kode_tr_DV,
                        'debit' => 0,
                        'credit' => $dev,
                        'saldo' => $balance3,
                        'deskripsi' => "Deviden dari deposito [" . $kode_tr . "]",
                        'tipe' => "deviden",
                        'date' => $end
                    );
                    $this->db->insert('tb_report', $report_tr1);

                    $this->db->update('tb_deposito', ['status' => '0'], "id_deposito = '" . $id_deposito . "'");

                    // report activity
                    $report_act2 = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Deposito [" . $kode_tr . "] telah berakhir",
                        'date' => $date
                    );
                    $this->db->insert('tb_report_activity', $report_act2);
                }
            }

            //Start database transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                // 
            } else {
                // 
            }
        }
    }

    function share_profit()
    {
        if ($this->Helper->setting('CJ_SHARE_PROFIT', 'status') == '1') {
            //Start database transaction
            $this->db->trans_start();

            if ($this->Helper->setting('TGL', 'status') == '1') {
                $hari_ini = $this->Helper->setting('TGL');
            } else {
                $hari_ini = new_date(); // auto
            }

            $persen_komisi = $this->Helper->setting('KOMISI_SPONSOR_BERJALAN');

            $tahun_ini = date("Y", strtotime($hari_ini));
            $bulan_ini = date("m", strtotime($hari_ini));
            $tgl_ini = date("d", strtotime($hari_ini));

            $query_cj = $this->db->query('SELECT date
                                            FROM cj_bagi_untung
                                            WHERE MONTH(date)="' . $bulan_ini . '"
                                            AND YEAR(date)="' . $tahun_ini . '"');
            if ($query_cj->num_rows() <= 0) {

                if ($tgl_ini == "05" || $tgl_ini == "5") {

                    $persen = $this->cari_persen_profit($bulan_ini);
                    if ($persen > 0) {

                        $query_simp_sukarela = $this->db->select("tb_simpanan_sukarela.*, tb_anggota.id_parent, tb_anggota.no_anggota")
                            ->from("tb_simpanan_sukarela, tb_anggota")
                            ->where("tb_simpanan_sukarela.status", '1')
                            ->where("tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota")
                            ->order_by("tb_simpanan_sukarela.date", "ASC")
                            ->get()
                            ->result();

                        foreach ($query_simp_sukarela as $r) {
                            $tgl = $r->date;

                            $kode_tr = $this->Helper->generate_kodeTR("BU");
                            $id_simp_sukarela = $r->id_simpanan;
                            $kode_tr_simp_sukarela = $r->kode_tr;
                            $id_anggota = $r->id_anggota;
                            $no_anggota = $r->no_anggota;
                            $id_parent = $r->id_parent;
                            $amount = $r->amount;
                            $balance0 = $this->Balance->total_balance($id_anggota);

                            // $tgl = $r->date;
                            // $date = date("Y-m-d", strtotime($r->date));
                            // // $date1 = date("Y-m-d", strtotime("2019-02-05 00:00:00"));
                            // $end_date =  date("Y-m-d", strtotime("+1 year", strtotime($tgl)));
                            // $kurang = $date - $end_date;
                            // $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

                            // if ($selisih < 0) { // jika belum lewat end_date -1

                            // BAGI UNTUNG (ANGGOTA / CHILD)
                            $query_cari_bu = $this->db->query(' SELECT id_bagi_untung
                                                                FROM tb_bagi_untung
                                                                WHERE id_simp_sukarela = "' . $id_simp_sukarela . '"');
                            if ($query_cari_bu->num_rows() < 12) {

                                $profit = $amount * ($persen / 100);

                                $data2 = array(
                                    'kode_tr' => $kode_tr,
                                    'id_simp_sukarela' => $id_simp_sukarela,
                                    'persen' => $persen,
                                    'amount' => $profit,
                                    'date' => $hari_ini
                                );
                                $this->db->insert('tb_bagi_untung', $data2);
                                $id_bu = $this->db->insert_id();

                                // report transaksi
                                $report_tr3 = array(
                                    'id_anggota' => $id_anggota,
                                    'id' => $id_bu,
                                    'kode_tr' => $kode_tr,
                                    'debit' => 0,
                                    'credit' => $profit,
                                    'saldo' => $balance0 + $profit,
                                    'deskripsi' => "Bagi untung " . $persen . "% dari simpanan [" . $kode_tr_simp_sukarela . "]",
                                    'tipe' => "bagi_untung",
                                    'date' => $hari_ini
                                );
                                $this->db->insert('tb_report', $report_tr3);


                                // KOMISI SPONSOR (PARENT)
                                if ($persen_komisi > 0) {

                                    if ($id_parent != 0 || $id_parent != "0") {

                                        $query_cari_ks = $this->db->query(' SELECT id_komisi_sponsor
                                                                    FROM tb_komisi_sponsor
                                                                    WHERE id_simp_sukarela = "' . $id_simp_sukarela . '"');
                                        if ($query_cari_ks->num_rows() < 12) {

                                            $balance_parent = $this->Balance->total_balance($id_parent);
                                            $kode_tr_ks_parent = $this->Helper->generate_kodeTR("KS");
                                            $komisi_sponsor = $amount * ($persen_komisi / 100);
                                            $data2 = array(
                                                'kode_tr' => $kode_tr_ks_parent,
                                                'id_simp_sukarela' => $id_simp_sukarela,
                                                'id_parent' => $id_parent,
                                                'id_child' => $id_anggota,
                                                'amount' => $komisi_sponsor,
                                                'date' => $hari_ini
                                            );
                                            $this->db->insert('tb_komisi_sponsor', $data2);
                                            $id_komisi_sponsor = $this->db->insert_id();
                                            $report_tr2 = array(
                                                'id_anggota' => $id_parent,
                                                'id' => $id_komisi_sponsor,
                                                'kode_tr' => $kode_tr_ks_parent,
                                                'debit' => 0,
                                                'credit' => $komisi_sponsor,
                                                'saldo' => $balance_parent + $komisi_sponsor,
                                                'deskripsi' => "Komisi promosi dari simpanan [" . $kode_tr_simp_sukarela . "] anggota [" . $no_anggota . "]",
                                                'tipe' => "komisi_sponsor",
                                                'date' => $hari_ini
                                            );
                                            $this->db->insert('tb_report', $report_tr2);
                                        }
                                    }
                                }
                            } else { //  sama atau lewat end_date 0
                                $this->db->update('tb_simpanan_sukarela', ['status' => '0'], "id_simpanan = '" . $id_simp_sukarela . "'");
                            }
                        }
                    }

                    $cj = array(
                        'date' => $hari_ini
                    );
                    $this->db->insert('cj_bagi_untung', $cj);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        // 
                    } else {
                        // 
                    }
                }
            }
        }
    }

    // ########################################

    function hitungdate($tanggal)
    {
        $date = new_date();

        if ($this->Helper->setting('TGL', 'status') == '1') {
            $harini = strtotime($this->Helper->setting('TGL'));
        } else {
            $harini = strtotime($date); // auto
            // $harini = strtotime('2022-12-23 17:11:02'); // tanggal manual
        }

        $tgl = strtotime($tanggal);

        //cari selisih
        $kurang = $harini - $tgl;
        $days = floor($kurang / (24 * 60 * 60)); // convert to days

        return $days;
    }

    function cari_persen_profit($bulan)
    {
        $query = $this->db->query(' SELECT profit
                                    FROM persen_share_profit 
                                    WHERE bulan = "' . $bulan . '" ');
        $result = $query->row_array();
        return $result['profit'];
    }
} //end model
