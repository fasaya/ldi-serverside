<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal_model extends CI_Model
{
    function get_onprocess()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("*");
        $this->db->from("tb_withdrawal");
        $this->db->where("id_anggota = " . $id_anggota . " AND status = '0'");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_processed()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("*");
        $this->db->from("tb_withdrawal");
        $this->db->where("id_anggota = " . $id_anggota . " AND status = '1'");
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_withdrawal()
    {
        $id_anggota = $this->session->userdata('id_user');

        $this->db->select("*");
        $this->db->from("tb_withdrawal");
        $this->db->where("id_anggota", $id_anggota);
        $this->db->order_by("date", "DESC");
        return $this->db->get()->result();
    }

    function get_gateway()
    {
        return $this->db->select("id_gateway, gateway")
            ->from("tb_gateway")
            ->where("status = '1'")
            // ->order_by("invest_date", "DESC")
            ->get()
            ->result();
    }

    // #################################

    function newWD($data)
    {
        //cek apakah bisa WD
        if ($this->Helper->setting('WITHDRAW', 'status') == '1') {
            $id_anggota = $this->session->userdata('id_user');
            $amount = $data['amount'];
            $status = "0"; //status 0 berarti baru request
            $date = new_date();

            $balance = $this->Balance->total_balance();
            $minWD = $this->Helper->setting('WD_MIN');
            $maxWD = $this->Helper->setting('WD_MAX');
            $kode_tr = $this->Helper->generate_kodeTR("WD");
            $currency = $this->Helper->setting('CURRENCY');

            if ($balance >= $amount) {
                if ($amount >= $minWD && $amount <= $maxWD) {

                    //Start database transaction
                    $this->db->trans_start();

                    //insert into table deposit
                    $data_wd = [
                        'id_anggota' => $id_anggota,
                        'kode_tr' => $kode_tr,
                        'amount' => $amount,
                        'amount_request' => $amount,
                        'date' => $date,
                        'status' => $status
                    ];
                    $this->db->insert('tb_withdrawal', $data_wd);

                    //get last inserted id (id_member)
                    // $id_wd = $this->db->insert_id();

                    // report activity
                    $report_act = array(
                        'id_user' => $id_anggota,
                        'user' => "anggota",
                        'keterangan' => "Permintaan withdraw [" . $kode_tr . "] senilai " . $currency . " " . rupiah($amount),
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
                                Mengirim permintaan withdraw gagal.
                                </div>'
                        );
                        redirect('anggota/withdrawal/add');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Permintaan withdraw telah dikirim.
                                </div>'
                        );
                        redirect('anggota/withdrawal');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Terjadi kesalahan.
                            </div>'
                    );
                    redirect('anggota/withdrawal/add');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Saldo Anda tidak mencukupi!
                        </div>'
                );
                redirect('anggota/withdrawal/add');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Mohon coba beberapa saat lagi.
                </div>'
            );
            redirect('anggota/withdrawal/add');
        }
    }
} //end model
