<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit_model extends CI_Model
{

    function get_new_deposit()
    {
        return $this->db->select("tb_deposit.*, tb_anggota.no_anggota, tb_anggota.nama, tb_gateway.gateway")
            ->from("tb_deposit, tb_gateway, tb_anggota")
            ->where("tb_deposit.id_gateway = tb_gateway.id_gateway")
            ->where("tb_anggota.id_anggota = tb_deposit.id_anggota")
            ->where("tb_deposit.status", '0')
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    function get_pending_deposit()
    {
        return $this->db->select("tb_deposit.*, tb_anggota.no_anggota, tb_anggota.nama, tb_gateway.gateway")
            ->from("tb_deposit, tb_gateway, tb_anggota")
            ->where("tb_deposit.id_gateway = tb_gateway.id_gateway")
            ->where("tb_anggota.id_anggota = tb_deposit.id_anggota")
            ->where("tb_deposit.status", '2')
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    function get_processed_deposit()
    {
        return $this->db->select("tb_deposit.*, tb_anggota.no_anggota, tb_anggota.nama, tb_gateway.gateway")
            ->from("tb_deposit, tb_gateway, tb_anggota")
            ->where("tb_deposit.id_gateway = tb_gateway.id_gateway")
            ->where("tb_anggota.id_anggota = tb_deposit.id_anggota")
            ->where("(tb_deposit.status = '1' OR tb_deposit.status = '9')")
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    // #######################################################################
    // MAIN

    function updaterequest($data)
    {
        $id_pengurus = $this->session->userdata('id_user');
        $code = $data['code'];
        $query1 = $this->db->query("SELECT status
                                    FROM tb_deposit
                                    WHERE code = '" . $code . "'");
        if ($query1->num_rows() > 0) {
            $result1 = $query1->row_array();
            $status = $result1['status'];

            $query2 = $this->db->query("SELECT tb_deposit.id_anggota, tb_deposit.id_deposit, tb_deposit.kode_tr, tb_deposit.id_deposit, tb_gateway.gateway, tb_gateway.no_rekening
                                    FROM tb_deposit, tb_gateway
                                    WHERE tb_deposit.id_gateway = tb_gateway.id_gateway
                                        AND code = '" . $code . "'");
            $result2 = $query2->row_array();

            if ($status == "0" || $status == "2") {

                $status_baru = $data['status'];
                $id_anggota = $result2['id_anggota'];
                $kode_tr = $result2['kode_tr'];
                $date = new_date();

                if ($status_baru == "1" || $status_baru == "2") {

                    $id_deposit = $result2['id_deposit'];

                    $amount = $data['amount'];
                    $balance = $this->Balance->total_balance($id_anggota);

                    //Start database transaction
                    $this->db->trans_start();

                    $input1 = [
                        'amount' => $amount,
                        'status' => $status_baru
                    ];

                    // update
                    $this->db->update('tb_deposit', $input1, "code = '" . $code . "'");

                    if ($status_baru == "1") {

                        // insert into table report
                        $data_report = [
                            'id_anggota' => $id_anggota,
                            'id' => $id_deposit,
                            'kode_tr' => $kode_tr,
                            'debit' => 0,
                            'credit' => $amount,
                            'saldo' => $balance + $amount,
                            'deskripsi' => "Deposit [" . $kode_tr . "] ke " . $result2['gateway'] . " - " . $result2['no_rekening'],
                            'tipe' => "depo_sukses",
                            'date' => $date
                        ];
                        $this->db->insert('tb_report', $data_report);

                        // report activity
                        $report_act = array(
                            'id_user' => $id_pengurus,
                            'user' => "pengurus",
                            'keterangan' => "Deposit [" . $kode_tr . "] ke " . $result2['gateway'] . " - " . $result2['no_rekening'],
                            'date' => $date
                        );
                        $this->db->insert('tb_report_activity', $report_act);
                    }

                    //Start database transaction
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Update failed!
                            </div>'
                        );
                        redirect('pengurus/deposit/newrequest');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Data deposit updated!
                            </div>'
                        );
                        if ($status_baru == "1") {
                            redirect('pengurus/deposit/processed');
                        } else {
                            redirect('pengurus/deposit/pending');
                        }
                    }
                } elseif ($status_baru == "9") {

                    //Start database transaction
                    $this->db->trans_start();

                    $input1 = [
                        'status' => "9"
                    ];
                    $this->db->update('tb_deposit', $input1, "code = '" . $code . "'");

                    // report activity
                    $report_act = array(
                        'id_user' => NULL,
                        'user' => "pengurus",
                        'keterangan' => "Deposit [" . $kode_tr . "] dibatalkan",
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
                        Update failed!
                        </div>'
                        );
                        redirect('pengurus/deposit/newrequest');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Data deposit cancelled!
                        </div>'
                        );
                        redirect('pengurus/deposit/processed');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Error!
                        </div>'
                    );
                    redirect('pengurus/deposit/newrequest');
                }
            } else {
                redirect('pengurus/deposit/processed');
            }
        } else {
            redirect('pengurus/deposit/processed');
        }
    }

    // ########################################################################


    function fetch_depo_detail($code)
    {
        // cek if package exists
        $query1 = $this->db->query(" SELECT *
                                    FROM tb_deposit
                                    WHERE code = '" . $code . "'");
        if ($query1->num_rows() > 0) {

            $query = $this->db->query(' SELECT tb_anggota.no_anggota, tb_anggota.*, tb_deposit.*, tb_gateway.gateway, tb_gateway.no_rekening, tb_gateway.atas_nama
                                        FROM tb_anggota, tb_deposit, tb_gateway
                                        WHERE tb_anggota.id_anggota = tb_deposit.id_anggota 
                                            AND tb_deposit.id_gateway = tb_gateway.id_gateway 
                                            AND tb_anggota.id_anggota = tb_deposit.id_anggota 
                                            AND tb_anggota.id_anggota = tb_deposit.id_anggota 
                                            AND tb_deposit.code = "' . $code . '"');
            $result = $query->row_array();

            $status = $result['status'];
            $no_anggota = $result['no_anggota'];
            $name = $result['nama'];
            $no_hp = $result['no_hp'];
            $email = $result['email'];
            $amount = $result['amount'];
            $gateway = $result['gateway'];
            $no_rek = $result['no_rekening'];
            $atas_nama = $result['atas_nama'];
            $code = $result['code'];
            $last_code = $result['last_code'];
            $total = $amount + $last_code;

            $currency = $this->Helper->setting('CURRENCY');

            if ($status == '0' || $status == '2') { //ON PROCESS
                $output = '
                <header class="card-header">
                    <h2 class="card-title">Detail Deposit</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-2 text-center"><span class="badge badge-info">Request Deposit</span></h3>
                    </div>
                    <h4 class="text-left pb-0">Personal Info</h4>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td>Nomor Anggota</td>
                                <td><b>' . $no_anggota . '</b></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>' . $name . '</td>
                            </tr>
                            <tr>
                                <td>Nomor HP</td>
                                <td>' . $no_hp . '</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>' . $email . '</td>
                            </tr>
                        </tbody>
                    </table>
                    <form class="form-horizontal form-bordered" action="' . site_url() . 'pengurus/deposit/updaterequest/' . $code . '" method="post">
                        <h4 class="text-left pb-0 mt-3">Transfer Info</h4>
                        <table class="table table-responsive-md table-striped table-bordered mb-5">
                            <tbody>
                                <tr>
                                    <td>Kode Deposit</td>
                                    <td><b>' . $code . '<b></td>
                                </tr>
                                <tr>
                                    <td>Gateway</td>
                                    <td>' . $gateway . '</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>' . $no_rek . '</td>
                                </tr>
                                <tr>
                                    <td>Nama Akun</td>
                                    <td>' . $atas_nama . '</td>
                                </tr>
                                <tr>
                                    <td>Kode Unik</td>
                                    <td>' . $last_code . '</td>
                                </tr>
                                <tr>
                                    <td>Total transfer</td>
                                    <td>' . $currency . ' ' . rupiah($total) . '</td>
                                </tr>
                                <tr>
                                    <td>Actual Amount</td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                ' . $currency . '
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" name="amount" value="' . $amount . '">
                                        </div>
                                        <p class="m-0">Biaya yang ditransfer diluar kode unik</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select name="status" class="form-control">
                                            <option value="0" selected>New</option>
                                            <option value="1">Processed</option>
                                            <option value="2">Pending</option>
                                            <option value="9">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-default modal-dismiss">Close</button>
                        <div>
                    </form>
                </div>
                ';
            }
            return $output;
        }
    }
} //end model
