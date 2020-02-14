<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito_model extends CI_Model
{
    function get_deposito()
    {
        $id_user = $this->session->userdata('id_user');

        $this->db->select("kode_tr, amount, bulan, start_date, end_date, status, tipe");
        $this->db->from("tb_deposito");
        $this->db->where("id_anggota", $id_user);
        $this->db->order_by("start_date", "DESC");
        return $this->db->get()->result();
    }

    function get_royalti()
    {
        $id_user = $this->session->userdata('id_user');

        $this->db->select("tb_royalti.kode_tr AS kode_RY, tb_deposito.kode_tr AS kode_DO, tb_royalti.amount, tb_royalti.date");
        $this->db->from("tb_royalti, tb_deposito");
        $this->db->where("tb_royalti.id_deposito = tb_deposito.id_deposito");
        $this->db->where("id_anggota", $id_user);
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_deviden()
    {
        $id_user = $this->session->userdata('id_user');

        $this->db->select("tb_deviden.kode_tr AS kode_DV, tb_deposito.kode_tr AS kode_DO, tb_deviden.amount, tb_deviden.date, tb_deviden.no");
        $this->db->from("tb_deviden, tb_deposito");
        $this->db->where("tb_deviden.id_deposito = tb_deposito.id_deposito");
        $this->db->where("id_anggota", $id_user);
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    // ####################################################

    function deposito_mikro($data)
    {
        if ($this->Helper->is_sudah_bayar_simpanan()) {
            $bisa_deposito = $this->Helper->setting('DEPOSITO', 'status');
            if ($bisa_deposito == '1') {

                $nilai_min = $this->Helper->setting('DEPOSITO_MIKRO_MIN');
                $nilai_max = $this->Helper->setting('DEPOSITO_MIKRO_MAX');
                $nilai = $data['nilai'];

                if ($nilai >= $nilai_min && $nilai <= $nilai_max) {

                    $id_anggota = $this->session->userdata('id_user');
                    $kontrak = (float) $this->Helper->setting('DEPOSITO_MIKRO_KONTRAK');
                    $deviden = (float) $this->Helper->setting('DEPOSITO_MIKRO_DEVIDEN');
                    $kode_tr = $this->Helper->generate_kodeTR("DO");
                    $currency = $this->Helper->setting('CURRENCY');
                    $balance = $this->Balance->total_balance();
                    $current_date = new_date();
                    $end_date =  date("Y-m-d H:i:s", strtotime("+" . $kontrak . " month", strtotime($current_date)));

                    //Start database transaction
                    $this->db->trans_start();

                    //insert into table invest
                    $data_inv = [
                        'id_anggota' => $id_anggota,
                        'kode_tr' => $kode_tr,
                        'amount' => $nilai,
                        'deviden' => $deviden,
                        'royalti' => 0,
                        'bulan' => $kontrak,
                        'kali' => 1,
                        'start_date' => $current_date,
                        'end_date' => $end_date,
                        'status' => "1", // 1 berarti deposito belum berakhir
                        'tipe' => "mikro"
                    ];
                    $this->db->insert('tb_deposito', $data_inv);

                    $id_deposito = $this->db->insert_id();

                    // report transaksi
                    $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_deposito,
                        'kode_tr' => $kode_tr,
                        'debit' => $nilai,
                        'credit' => 0,
                        'saldo' => $balance - $nilai,
                        'deskripsi' => "Deposito (mikro) baru",
                        'tipe' => "deposito_mikro",
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report', $report_tr1);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Melakukan deposito [" . $kode_tr . "]  senilai " . $currency . " " . rupiah($nilai),
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-dange">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal deposito.
                        </div>'
                        );
                        redirect('anggota/deposito/mikro');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil deposito!
                        </div>'
                        );
                        redirect('anggota/deposito');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Nilai tidak sesuai kriteria.
                </div>'
                    );
                    redirect('anggota/deposito/mikro');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Maaf saat ini Anda tidak bisa melakukan deposito.
            </div>'
                );
                redirect('anggota/deposito/mikro');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Harap untuk membayar Simpanan Wajib dan Pokok terlebih dahulu.
                </div>'
            );
            redirect('anggota/deposito/mikro');
        }
    }

    function deposito_makro($data)
    {
        if ($this->Helper->is_sudah_bayar_simpanan()) {
            $bisa_deposito = $this->Helper->setting('DEPOSITO', 'status');
            if ($bisa_deposito == '1') {

                $nilai_min = $this->Helper->setting('DEPOSITO_MAKRO_MIN');
                $nilai_max = $this->Helper->setting('DEPOSITO_MAKRO_MAX');
                $nilai = $data['nilai'];

                if ($nilai >= $nilai_min && $nilai <= $nilai_max) {

                    $tipe = $data['tipe'];

                    $id_anggota = $this->session->userdata('id_user');
                    $kontrak = (float) $this->Helper->setting('DEPOSITO_MAKRO_' . $tipe . '_KONTRAK');
                    $deviden = (float) $this->Helper->setting('DEPOSITO_MAKRO_' . $tipe . '_DEVIDEN');
                    $kode_tr = $this->Helper->generate_kodeTR("DO");
                    $currency = $this->Helper->setting('CURRENCY');
                    $balance = $this->Balance->total_balance();
                    $current_date = new_date();
                    $end_date =  date("Y-m-d H:i:s", strtotime("+" . $kontrak . " month", strtotime($current_date)));

                    //Start database transaction
                    $this->db->trans_start();

                    //insert into table invest
                    $data_inv = [
                        'id_anggota' => $id_anggota,
                        'kode_tr' => $kode_tr,
                        'amount' => $nilai,
                        'deviden' => $deviden * $kontrak,
                        'royalti' => 0,
                        'bulan' => $kontrak,
                        'kali' => 1,
                        'start_date' => $current_date,
                        'end_date' => $end_date,
                        'status' => "1", // 1 berarti deposito belum berakhir
                        'tipe' => "makro"
                    ];
                    $this->db->insert('tb_deposito', $data_inv);

                    $id_deposito = $this->db->insert_id();

                    // report transaksi
                    $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_deposito,
                        'kode_tr' => $kode_tr,
                        'debit' => $nilai,
                        'credit' => 0,
                        'saldo' => $balance - $nilai,
                        'deskripsi' => "Deposito (makro) baru",
                        'tipe' => "deposito_makro",
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report', $report_tr1);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Melakukan deposito [" . $kode_tr . "]  senilai " . $currency . " " . rupiah($nilai),
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-dange">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal deposito.
                        </div>'
                        );
                        redirect('anggota/deposito/makro');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil deposito!
                        </div>'
                        );
                        redirect('anggota/deposito');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Nilai tidak sesuai kriteria.
                </div>'
                    );
                    redirect('anggota/deposito/makro');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Maaf saat ini Anda tidak bisa melakukan deposito.
            </div>'
                );
                redirect('anggota/deposito/makro');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Harap untuk membayar Simpanan Wajib dan Pokok terlebih dahulu.
                </div>'
            );
            redirect('anggota/deposito/makro');
        }
    }

    function deposito_prioritas($data)
    {
        if ($this->Helper->is_sudah_bayar_simpanan()) {
            $bisa_deposito = $this->Helper->setting('DEPOSITO', 'status');
            if ($bisa_deposito == '1') {

                $nilai_min = $this->Helper->setting('DEPOSITO_PRIORITAS_MIN');
                $nilai_max = $this->Helper->setting('DEPOSITO_PRIORITAS_MAX');
                $nilai = $data['nilai'];

                if ($nilai >= $nilai_min && $nilai <= $nilai_max) {

                    $id_anggota = $this->session->userdata('id_user');
                    $kontrak = (float) $this->Helper->setting('DEPOSITO_PRIORITAS_KONTRAK');
                    $deviden = (float) $this->Helper->setting('DEPOSITO_PRIORITAS_DEVIDEN');
                    $royalti = (float) $this->Helper->setting('DEPOSITO_PRIORITAS_ROYALTI');
                    $kode_tr = $this->Helper->generate_kodeTR("DO");
                    $currency = $this->Helper->setting('CURRENCY');
                    $balance = $this->Balance->total_balance();
                    $current_date = new_date();
                    $end_date =  date("Y-m-d H:i:s", strtotime("+" . $kontrak . " month", strtotime($current_date)));

                    //Start database transaction
                    $this->db->trans_start();

                    //insert into table invest
                    $data_inv = [
                        'id_anggota' => $id_anggota,
                        'kode_tr' => $kode_tr,
                        'amount' => $nilai,
                        'deviden' => $deviden * ($kontrak / 12),
                        'royalti' => $royalti,
                        'bulan' => $kontrak,
                        'kali' => 1,
                        'start_date' => $current_date,
                        'end_date' => $end_date,
                        'status' => "1", // 1 berarti deposito belum berakhir
                        'tipe' => "prioritas"
                    ];
                    $this->db->insert('tb_deposito', $data_inv);

                    $id_deposito = $this->db->insert_id();

                    // report transaksi
                    $report_tr1 = array(
                        'id_anggota' => $id_anggota,
                        'id' => $id_deposito,
                        'kode_tr' => $kode_tr,
                        'debit' => $nilai,
                        'credit' => 0,
                        'saldo' => $balance - $nilai,
                        'deskripsi' => "Deposito (prioritas) baru",
                        'tipe' => "deposito_prioritas",
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report', $report_tr1);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Melakukan deposito [" . $kode_tr . "]  senilai " . $currency . " " . rupiah($nilai),
                        'date' => $current_date
                    );
                    $this->db->insert('tb_report_activity', $report_act);

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-dange">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Gagal deposito.
                        </div>'
                        );
                        redirect('anggota/deposito/prioritas');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Berhasil deposito!
                        </div>'
                        );
                        redirect('anggota/deposito');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Nilai tidak sesuai kriteria.
                </div>'
                    );
                    redirect('anggota/deposito/prioritas');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Maaf saat ini Anda tidak bisa melakukan deposito.
            </div>'
                );
                redirect('anggota/deposito/prioritas');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Harap untuk membayar Simpanan Wajib dan Pokok terlebih dahulu.
                </div>'
            );
            redirect('anggota/deposito/prioritas');
        }
    }
} //end model
