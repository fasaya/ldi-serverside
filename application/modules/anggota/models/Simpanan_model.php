<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{
    function get_mutasiSimpanan()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(" SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_wajib 
                                        WHERE id_anggota = '" . $id_anggota . "'
                                    UNION ALL
                                    SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_pokok
                                        WHERE id_anggota = '" . $id_anggota . "'
                                    UNION ALL
                                    SELECT kode_tr, id_anggota, amount, date, is_in_saldo FROM tb_simpanan_sukarela
                                        WHERE id_anggota = '" . $id_anggota . "'
                                    ORDER BY date DESC
                                    ");
        return $query->result();
    }

    function get_bagi_untung()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(" SELECT tb_bagi_untung.kode_tr AS kode_tr_bu, tb_bagi_untung.amount, tb_bagi_untung.date, tb_bagi_untung.persen, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_bagi_untung, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_simpanan_sukarela.id_anggota = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_bagi_untung.id_simp_sukarela 
                                        AND tb_simpanan_sukarela.id_anggota = '" . $id_anggota . "'
                                    ORDER BY date DESC");
        return $query->result();
    }

    function get_komisi_sponsor()
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(" SELECT tb_komisi_sponsor.kode_tr AS kode_tr_ks, tb_komisi_sponsor.amount, tb_komisi_sponsor.date, tb_simpanan_sukarela.kode_tr AS kode_tr_ss, tb_anggota.nama, tb_anggota.no_anggota
                                    FROM tb_komisi_sponsor, tb_simpanan_sukarela, tb_anggota
                                    WHERE tb_komisi_sponsor.id_parent = tb_anggota.id_anggota
                                        AND tb_simpanan_sukarela.id_simpanan = tb_komisi_sponsor.id_simp_sukarela 
                                        AND tb_komisi_sponsor.id_parent = '" . $id_anggota . "'
                                    ORDER BY date DESC");
        return $query->result();
    }

    function tglSimpWajib_byKodeTR($kode_tr)
    {
        $query = $this->db->query(' SELECT bulan_tahun
                                    FROM tb_simpanan_wajib
                                    WHERE kode_tr = "' . $kode_tr . '"');
        $result = $query->row();
        return date("d/m/Y", strtotime($result->bulan_tahun));
    }

    // ###############################################################

    function bayarSimpananPokok()
    {
        if ($this->Helper->setting('SIMPANAN', 'status') == '1') {
            $simpanan_pokok = $this->Helper->setting('SIMPANAN_POKOK');
            $balance = $this->Balance->total_balance();

            if ($balance >= $simpanan_pokok) {

                if ($this->Helper->cek_simpanan_pokok()) {

                    $id_anggota = $this->session->userdata('id_user');
                    $kode_tr = $this->Helper->generate_kodeTR("SP");
                    $currency = $this->Helper->setting('CURRENCY');
                    $date = new_date();

                    //Start database transaction
                    $this->db->trans_start();

                    // simpanan pokok
                    $data1 = array(
                        'kode_tr' => $kode_tr,
                        'id_anggota' => $id_anggota,
                        'amount' => $simpanan_pokok,
                        'date' => $date,
                        'is_in_saldo' => '0'
                    );
                    $this->db->insert('tb_simpanan_pokok', $data1);
                    $id_simpanan = $this->db->insert_id();
                    // report transaksi
                    $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_simpanan,
                        'kode_tr' => $kode_tr,
                        'debit' => $simpanan_pokok,
                        'credit' => 0,
                        'saldo' => $balance - $simpanan_pokok,
                        'deskripsi' => "Membayar simpanan pokok",
                        'tipe' => "simpanan_pokok",
                        'date' => $date
                    );
                    $this->db->insert('tb_report', $report_tr1);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Membayar simpanan pokok [" . $kode_tr . "]  senilai " . $currency . " " . rupiah($simpanan_pokok),
                        'date' => $date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terjadi kesalahan.
                        </div>'
                        );
                        redirect('anggota/simpanan');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Terima kasih telah membayar simpanan pokok.
                        </div>'
                        );
                        redirect('anggota/simpanan');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Anda telah membayar Simpanan Pokok.
                    </div>'
                    );
                    redirect('anggota/simpanan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Saldo Anda tidak mencukupi. Mohon untuk melakukan deposit terlebih dahulu.
                </div>'
                );
                redirect('anggota/simpanan');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Mohon coba beberapa saat lagi.
            </div>'
            );
            redirect('anggota/simpanan');
        }
    }

    function bayarSimpananWajib($data)
    {
        if ($this->Helper->setting('SIMPANAN', 'status') == '1') {

            $brpbulan = $data['bulan'];
            $simpanan_wajib = $this->Helper->setting('SIMPANAN_WAJIB');
            $biaya = $brpbulan * $simpanan_wajib;

            if ($this->Balance->total_balance() >= $biaya) {

                $id_anggota = $this->session->userdata('id_user');
                $currency = $this->Helper->setting('CURRENCY');
                $date = new_date();

                $query1 = $this->db->query('SELECT id_anggota
                                            FROM tb_simpanan_wajib
                                            WHERE id_anggota = "' . $id_anggota . '"');

                //Start database transaction
                $this->db->trans_start();
                
                if ($query1->num_rows() <= 0) { // Jika belum pernah membayar simpanan wajib

                    // ambil tgl mendaftar
                    $query = $this->db->query(' SELECT join_date
                                            FROM tb_anggota 
                                            WHERE id_anggota = "' . $id_anggota . '" ');
                    $result = $query->row_array();
                    $join_date = $result['join_date'];

                    $tgl = date("Y-m", strtotime($join_date)) . "-01";

                    // loop
                    for ($i = 0; $i < $brpbulan; $i++) {
                        $bulan_tahun = date("Y-m-d", strtotime("+" . $i . " month", strtotime($tgl)));
                        // $bulan_tahun = (new DateTime($join_date))->add(new DateInterval('P' . $i . 'M'))->format('Y-m-d H:i:s');
                        $kode_tr_1 = $this->Helper->generate_kodeTR("SW");
                        $balance = $this->Balance->total_balance();
                        $data1 = array(
                            'kode_tr' => $kode_tr_1,
                            'id_anggota' => $id_anggota,
                            'bulan_tahun' => $bulan_tahun,
                            'amount' => $simpanan_wajib,
                            'date' => $date,
                            'is_in_saldo' => '0'
                        );
                        $this->db->insert('tb_simpanan_wajib', $data1);
                        $id_simpanan_1 = $this->db->insert_id();
                        // report transaksi
                        $report_tr1 = array(
                            'id_anggota' => $id_anggota,
                            'id' => $id_simpanan_1,
                            'kode_tr' => $kode_tr_1,
                            'debit' => $simpanan_wajib,
                            'credit' => 0,
                            'saldo' => $balance - $simpanan_wajib,
                            'deskripsi' => "Membayar simpanan wajib",
                            'tipe' => "simpanan_wajib",
                            'date' => $date
                        );
                        $this->db->insert('tb_report', $report_tr1);
                    }
                } else {
                    // ambil tgl mendaftar
                    $query = $this->db->query(' SELECT max(bulan_tahun)
                                            FROM tb_simpanan_wajib 
                                            WHERE id_anggota = "' . $id_anggota . '" ');
                    $result = $query->row_array();
                    $last_date = $result['max(bulan_tahun)'];
                    $dateTime = strtotime($last_date);

                    // loop
                    for ($i = 1; $i <= $brpbulan; $i++) {

                        $kode_tr_2 = $this->Helper->generate_kodeTR("SW");
                        $balance = $this->Balance->total_balance();
                        $bulan_tahun = date("Y-m-d", strtotime("+" . $i . " month", $dateTime));

                        $data1 = array(
                            'kode_tr' => $kode_tr_2,
                            'id_anggota' => $id_anggota,
                            'bulan_tahun' => $bulan_tahun,
                            'amount' => $simpanan_wajib,
                            'date' => $date,
                            'is_in_saldo' => '0'
                        );
                        $this->db->insert('tb_simpanan_wajib', $data1);
                        $id_simpanan_2 = $this->db->insert_id();
                        // report transaksi
                        $report_tr1 = array(
                            'id_anggota' => $id_anggota,
                            'id' => $id_simpanan_2,
                            'kode_tr' => $kode_tr_2,
                            'debit' => $simpanan_wajib,
                            'credit' => 0,
                            'saldo' => $balance - $simpanan_wajib,
                            'deskripsi' => "Membayar simpanan wajib",
                            'tipe' => "simpanan_wajib",
                            'date' => $date
                        );
                        $this->db->insert('tb_report', $report_tr1);
                    }
                }

                // report activity
                $report_act = array(
                    'id_user' => $id_anggota,
                    'user' => "anggota",
                    'keterangan' => "Membayar simpanan wajib " . $brpbulan . " bulan senilai " . $currency . " " . rupiah($biaya),
                    'date' => $date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     Terjadi kesalahan.
                     </div>'
                    );
                    redirect('anggota/simpanan');
                } else {

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     Terima kasih telah membayar simpanan wajib.
                     </div>'
                    );
                    redirect('anggota/simpanan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Saldo Anda tidak mencukupi. Mohon untuk melakukan deposit terlebih dahulu.
                </div>'
                );
                redirect('anggota/simpanan');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Mohon coba beberapa saat lagi.
                </div>'
            );
            redirect('anggota/simpanan');
        }
    }

    function bayarSimpananSukarela($data)
    {
        if ($this->Helper->setting('SIMPANAN', 'status') == '1') {
            $biaya = $data['nilai'];

            if ($biaya >= 50000) {
                if ($biaya % 10000 == 0) {
                    if ($this->Balance->total_balance()) {
                        $id_anggota = $this->session->userdata('id_user');
                        $kode_tr = $this->Helper->generate_kodeTR("SS");
                        $date = new_date();
                        $currency = $this->Helper->setting('CURRENCY');
                        $persen_komisi_awal = $this->Helper->setting('KOMISI_SPONSOR_AWAL');
                        $saldo1 = $this->Balance->total_balance() - $biaya;

                        //Start database transaction
                        $this->db->trans_start();

                        $data1 = array(
                            'kode_tr' => $kode_tr,
                            'id_anggota' => $id_anggota,
                            'amount' => $biaya,
                            'date' => $date,
                            'status' => "1",
                            'is_in_saldo' => '0'
                        );
                        $this->db->insert('tb_simpanan_sukarela', $data1);
                        $id_simpanan_1 = $this->db->insert_id();
                        // report transaksi
                        $report_tr1 = array(
                            'id_anggota' => $id_anggota,
                            'id' => $id_simpanan_1,
                            'kode_tr' => $kode_tr,
                            'debit' => $biaya,
                            'credit' => 0,
                            'saldo' => $saldo1,
                            'deskripsi' => "Membayar simpanan sukarela",
                            'tipe' => "simpanan_sukarela",
                            'date' => $date
                        );
                        $this->db->insert('tb_report', $report_tr1);

                        // cek apabila ada parent, jika ada maka diberi komisi sponsor
                        $query = $this->db->query(' SELECT id_parent, no_anggota
                                    FROM tb_anggota 
                                    WHERE id_anggota = "' . $id_anggota . '" ');
                        $result = $query->row_array();
                        $id_parent = $result['id_parent'];
                        if ($id_parent != "0") {
                            $no_anggota = $result['no_anggota'];
                            $komisi_sponsor = $biaya * ($persen_komisi_awal / 100);
                            $kode_tr_ks_parent = $this->Helper->generate_kodeTR("KS");
                            $balance2 = $this->Balance->total_balance($id_parent);

                            $data2 = array(
                                'kode_tr' => $kode_tr_ks_parent,
                                'id_simp_sukarela' => $id_simpanan_1,
                                'id_parent' => $id_parent,
                                'id_child' => $id_anggota,
                                'amount' => $komisi_sponsor,
                                'date' => $date
                            );
                            $this->db->insert('tb_komisi_sponsor', $data2);
                            $id_komisi_sponsor = $this->db->insert_id();
                            $report_tr2 = array(
                                'id_anggota' => $id_parent,
                                'id' => $id_komisi_sponsor,
                                'kode_tr' => $kode_tr_ks_parent,
                                'debit' => 0,
                                'credit' => $komisi_sponsor,
                                'saldo' => $balance2 + $komisi_sponsor,
                                'deskripsi' => "Komisi promosi dari simpanan [" . $kode_tr . "] anggota [" . $no_anggota . "]",
                                'tipe' => "komisi_sponsor",
                                'date' => $date
                            );
                            $this->db->insert('tb_report', $report_tr2);
                        }

                        // report activity
                        $report_act = array(
                            'id_user' => $id_anggota,
                            'user' => "anggota",
                            'keterangan' => "Membayar simpanan sukarela senilai " . $currency . " " . rupiah($biaya),
                            'date' => $date
                        );
                        $this->db->insert('tb_report_activity', $report_act);

                        //Start database transaction
                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE) {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     Terjadi kesalahan.
                     </div>'
                            );
                            redirect('anggota/simpanan');
                        } else {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                     Terima kasih telah membayar simpanan sukarela.
                     </div>'
                            );
                            redirect('anggota/simpanan');
                        }
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Saldo Anda tidak mencukupi. Mohon untuk melakukan deposit terlebih dahulu.
                </div>'
                        );
                        redirect('anggota/simpanan');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan.
                </div>'
                    );
                    redirect('anggota/simpanan');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Minimal simpanan sukarela adalah Rp 50.000.
            </div>'
                );
                redirect('anggota/simpanan');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Mohon coba beberapa saat lagi.
                </div>'
            );
            redirect('anggota/simpanan');
        }
    }

    // #########################################################################3

    function moveSimpananToSaldo($data)
    {
        $kode = $data['kode'];
        $kode_tr = $data['kode_tr'];
        $tabel = $data['tabel'];
        $query = $this->db->query(' SELECT *
                                    FROM ' . $tabel . ' 
                                    WHERE kode_tr = "' . $kode_tr . '"');
        $cek = $query->num_rows();
        if ($cek > 0) {
            $result = $query->row_array();
            $is_in_saldo = $result['is_in_saldo'];
            $kode_tr = $result['kode_tr'];
            $id_simpanan = $result['id_simpanan'];
            $amount = $result['amount'];


            $hari_ini = strtotime(new_date());
            $date = $result['date'];
            $tgl_tambah1thn =  strtotime("+1 year", strtotime($date));
            $kurang = $hari_ini - $tgl_tambah1thn;
            $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

            if ($selisih >= 0 && $is_in_saldo == "0") {
                $new_date = new_date();

                $id_anggota = $this->session->userdata('id_user');
                // $currency = $this->Helper->setting('CURRENCY');
                $date = new_date();
                $balance = $this->Balance->total_balance();
                $kode_tr_st = $this->Helper->generate_kodeTR("ST");

                //Start database transaction
                $this->db->trans_start();

                // insert
                $data1 = array(
                    'id_simpanan' => $id_simpanan,
                    'kode_tr' => $kode_tr_st,
                    'id_anggota' => $id_anggota,
                    'kode_tr_simp' => $kode_tr,
                    'amount' => $amount,
                    'tipe' => $kode,
                    'date' => $new_date
                );
                $this->db->insert('tb_simp_bisa_diambil', $data1);
                $id_simp_bisa_diambil = $this->db->insert_id();

                $updt = [
                    'is_in_saldo' => "1"
                ];
                $this->db->update($tabel, $updt, "id_simpanan = '" . $id_simpanan . "'");

                // report transaksi
                $report_tr1 = array(
                    'id_anggota' => $id_anggota,
                    'id' => $id_simp_bisa_diambil,
                    'kode_tr' => $kode_tr_st,
                    'debit' => 0,
                    'credit' => $amount,
                    'saldo' => $balance + $amount,
                    'deskripsi' => "Transfer simpanan [" . $kode_tr . "] ke saldo dompet",
                    'tipe' => "trf_simpanan",
                    'date' => $new_date
                );
                $this->db->insert('tb_report', $report_tr1);

                // report activity
                $report_act = array(
                    'id_user' => $id_anggota,
                    'user' => "anggota",
                    'keterangan' => "Transfer simpanan [" . $kode_tr . "] ke saldo dompet",
                    'date' => $new_date
                );
                $this->db->insert('tb_report_activity', $report_act);

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                    );
                    redirect('anggota/simpanan');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Berhasil transfer simpanan ke saldo dompet.
                    </div>'
                    );
                    redirect('anggota/simpanan');
                }

                // 
            } elseif ($selisih >= 0 && $is_in_saldo == "1") {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Simpanan telah di transfer.
                    </div>'
                );
                redirect('anggota/simpanan');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Simpanan baru bisa di transfer setelah 1 tahun.
                    </div>'
                );
                redirect('anggota/simpanan');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan.
                </div>'
            );
            redirect('anggota/simpanan');
        }
    }


    // #########################################################################3

    function fetchModalSimpananPokok()
    {
        $currency = $this->Helper->setting('CURRENCY');
        if ($this->Balance->total_balance() >= $this->Helper->setting('SIMPANAN_POKOK')) {
            $onoff = "";
        } else {
            $onoff = "disabled";
        }

        if ($this->Helper->cek_simpanan_pokok()) {
            $output = '
                <header class="card-header">
                    <h2 class="card-title">Bayar Simpanan Pokok</h2>
                </header>
                <div class="card-body">
                    <div class="">
                        <p class="">Biaya simpanan pokok adalah ' . $currency . ' ' . rupiah($this->Helper->setting('SIMPANAN_POKOK')) . '. Saldo Anda sekarang adalah ' . $currency . ' ' . rupiah($this->Balance->total_balance()) . '.</p>
                    </div>
                    <form class="form-horizontal form-bordered" action="' . site_url() . 'anggota/simpanan/bayarsimpananpokok" method="post">
                        <div class="form-group row">
                            <label class="col-lg-12 control-label pt-2">Password Transaksi</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr">
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-1 mb-2">Bayar Simpanan Pokok?</h5>
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit" ' . $onoff . '>Bayar</button>
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        <div>
                    </form>
                </div>
                ';
        } else {
            $output = '
                <header class="card-header">
                    <h2 class="card-title">Bayar Simpanan Pokok</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="font-weight-semibold mt-1 mb-2 text-center">Sudah dibayar</h5>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-default modal-dismiss">Tutup</button>
                    <div>
                </div>
                ';
        }

        return $output;
    }

    function fetchModalSimpananWajib()
    {
        $currency = $this->Helper->setting('CURRENCY');
        $max_bulan = (int) ($this->Balance->total_balance() / $this->Helper->setting('SIMPANAN_WAJIB'));
        if ($max_bulan <= 0) {
            $min_bulan = 0;
            $onoff = "disabled";
        } else {
            $min_bulan = 1;
            $onoff = "";
        }

        $output = '
            <header class="card-header">
                <h2 class="card-title">Bayar Simpanan Wajib</h2>
            </header>
            <div class="card-body">
                <div class="">
                    <p class="">Biaya simpanan wajib adalah ' . $currency . ' ' . rupiah($this->Helper->setting('SIMPANAN_WAJIB')) . '. Saldo Anda sekarang adalah ' . $currency . ' ' . rupiah($this->Balance->total_balance()) . '.</p>
                </div>
                <form class="form-horizontal" action="' . site_url() . 'anggota/simpanan/bayarsimpananwajib" method="post">
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Bayar</label>
                        <div class="col-lg-7">
                            <div class="input-group">
                                <input class="form-control" step="1" type="number" min="' . $min_bulan . '" max="' . $max_bulan . '" placeholder="1" name="bulan">
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        bulan
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                        <div class="col-lg-7">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                                <input type="password" class="form-control" name="passtr">
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-1 mb-2">Bayar Simpanan Wajib?</h5>
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit" ' . $onoff . '>Bayar</button>
                        <button class="btn btn-default modal-dismiss">Tutup</button>
                    <div>
                </form>
            </div>
            ';

        return $output;
    }

    function fetchModalSimpananSukarela()
    {
        $currency = $this->Helper->setting('CURRENCY');

        $output = '
            <header class="card-header">
                <h2 class="card-title">Bayar Simpanan Sukarela</h2>
            </header>
            <div class="card-body">
                <div class="alert alert-warning">
                    <ul class="mb-0">
                        <li>Simpanan sukarela minimal ' . $currency . ' 50.000.</li>
                        <li>Anda akan mendapatkan bagi untung sebesar 0-10% per bulan selama 1 tahun.</li>
                        <li>Saldo Anda sekarang adalah ' . $currency . ' ' . rupiah($this->Balance->total_balance()) . '.</li>
                    </ul>
                </div>
                <form class="form-horizontal" action="' . site_url() . 'anggota/simpanan/bayarsimpanansukarela" method="post">
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Bayar</label>
                        <div class="col-lg-7">
                            <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    ' . $currency . '
                                </span>
                            </span>
                            <input class="form-control" step="10000" type="number" min="50000" value="50000" name="nilai">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                        <div class="col-lg-7">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </span>
                                <input type="password" class="form-control" name="passtr">
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mt-1 mb-2">Bayar Simpanan Sukarela?</h5>
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit">Bayar</button>
                        <button class="btn btn-default modal-dismiss">Tutup</button>
                    <div>
                </form>
            </div>
            ';

        return $output;
    }
} //end model
