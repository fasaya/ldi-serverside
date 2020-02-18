<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdraw_model extends CI_Model
{
    // ########################################################################

    // DATATABLES
    // NEW WD
    function make_query_wdnew()
    {

        $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama");
        $this->db->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_withdrawal.status", '0');
        $this->db->from("tb_withdrawal, tb_anggota");

        $column_search = array('tb_withdrawal.kode_tr', 'tb_withdrawal.date', 'tb_withdrawal.gateway', 'tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_withdrawal.amount', 'tb_withdrawal.amount_request');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "no_anggota", 'kode_tr', "amount", "date", null, null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_wdnew()
    {
        $this->make_query_wdnew();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_wdnew()
    {
        $this->make_query_wdnew();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_wdnew()
    {
        $this->make_query_wdnew();
        return $this->db->count_all_results();
    }

    // PROCESSED WD
    function make_query_wdprocessed()
    {

        $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama, tb_biaya_withdraw.amount AS biaya_admin");
        $this->db->where("tb_withdrawal.id_withdrawal = tb_biaya_withdraw.id_withdrawal");
        $this->db->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_withdrawal.status = '1'");
        $this->db->from("tb_withdrawal, tb_anggota, tb_biaya_withdraw");

        $column_search = array('tb_withdrawal.kode_tr', 'tb_withdrawal.date', 'tb_withdrawal.gateway', 'tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_withdrawal.amount', 'tb_withdrawal.amount_request', 'tb_biaya_withdraw.amount');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "no_anggota", 'kode_tr', "amount", "biaya_admin", "amount_request", null, "date");
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_wdprocessed()
    {
        $this->make_query_wdprocessed();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_wdprocessed()
    {
        $this->make_query_wdprocessed();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_wdprocessed()
    {
        $this->make_query_wdprocessed();
        return $this->db->count_all_results();
    }

    // CANCELLED WD
    function make_query_wdcancelled()
    {

        $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama");
        $this->db->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota");
        $this->db->where("tb_withdrawal.status = '9'");
        $this->db->from("tb_withdrawal, tb_anggota");

        $column_search = array('tb_withdrawal.kode_tr', 'tb_withdrawal.date', 'tb_anggota.nama', 'tb_anggota.no_anggota', 'tb_withdrawal.amount');
        $i = 0;
        foreach ($column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $order_column = array(null, "no_anggota", 'kode_tr', "amount", "date", null);
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by("date", "DESC");
        }
    }
    function make_datatables_wdcancelled()
    {
        $this->make_query_wdcancelled();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data_wdcancelled()
    {
        $this->make_query_wdcancelled();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_wdcancelled()
    {
        $this->make_query_wdcancelled();
        return $this->db->count_all_results();
    }

    // ########################################################################

    function get_onprocess_wd()
    {
        return $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama")
            ->from("tb_withdrawal, tb_anggota")
            ->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota")
            ->where("tb_withdrawal.status", '0')
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    function get_processed_wd()
    {
        return $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama, tb_biaya_withdraw.amount AS biaya_admin")
            ->from("tb_withdrawal, tb_anggota, tb_biaya_withdraw")
            ->where("tb_withdrawal.id_withdrawal = tb_biaya_withdraw.id_withdrawal")
            ->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota")
            ->where("tb_withdrawal.status = '1'")
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    function get_cancelled_wd()
    {
        return $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama")
            ->from("tb_withdrawal, tb_anggota")
            ->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota")
            ->where("tb_withdrawal.status = '9'")
            ->order_by("date", "DESC")
            ->get()
            ->result();
    }

    // ########################################################################
    // MAIN

    function updaterequestwd($data)
    {

        $id_pengurus = $this->session->userdata('id_user');
        $id_withdrawal = $data['id_withdrawal'];
        $query1 = $this->db->query("SELECT status
                                    FROM tb_withdrawal
                                    WHERE id_withdrawal = '" . $id_withdrawal . "'");
        if ($query1->num_rows() > 0) {
            $result1 = $query1->row_array();
            $status = $result1['status'];

            $query2 = $this->db->query("SELECT id_anggota, amount, kode_tr
                                        FROM tb_withdrawal
                                        WHERE id_withdrawal = '" . $id_withdrawal . "'");
            $result2 = $query2->row_array();
            $id_anggota = $result2['id_anggota'];
            $balance = $this->Balance->total_balance($id_anggota);
            $kode_tr = $result2['kode_tr'];

            if ($status == "0") {

                $date = new_date();

                if ($data['status'] == "1") {
                    $amount = $result2['amount'];
                    // if ($balance >= $amount) {
                    //Start database transaction
                    $this->db->trans_start();

                    $biaya_admin_wd = $this->Helper->setting('BIAYA_WD');

                    $biaya_withdraw = (int) $amount * ($biaya_admin_wd / 100);
                    $amount_transferred = $amount - $biaya_withdraw;

                    $input1 = [
                        'amount' => $amount_transferred,
                        'gateway' => $data['gateway'],
                        'no_rek' => $data['no_rekening'],
                        'status' => "1"
                    ];

                    // update
                    $this->db->update('tb_withdrawal', $input1, "id_withdrawal = '" . $id_withdrawal . "'");

                    $deskripsi = "Withdrawal ke " . $data['gateway'] . " - " . $data['no_rekening'] . " sukses";

                    // insert into table report
                    $data_report = [
                        'id_anggota' => $id_anggota,
                        'id' => $id_withdrawal,
                        'kode_tr' => $kode_tr,
                        'debit' => $amount,
                        'credit' => 0,
                        'saldo' => $balance,
                        'deskripsi' => $deskripsi,
                        'tipe' => "withdraw_sukses",
                        'date' => $date
                    ];
                    $this->db->insert('tb_report', $data_report);

                    // biaya_withdraw
                    $insert_biaya_wd = array(
                        'kode_tr' => $this->Helper->generate_kodeTR("BW"),
                        'id_withdrawal' => $id_withdrawal,
                        'amount' => $biaya_withdraw,
                        'date' => $date
                    );
                    $this->db->insert('tb_biaya_withdraw', $insert_biaya_wd);

                    // report activity
                    $report_act = array(
                        'id_user' => $id_pengurus,
                        'user' => "pengurus",
                        'keterangan' => $deskripsi,
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
                            Gagal withdraw.
                            </div>'
                        );
                        redirect('pengurus/withdrawal/onprocess');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Withdraw sukses.
                            </div>'
                        );
                        redirect('pengurus/withdrawal/processed');
                    }
                    // } else {
                    //     $this->session->set_flashdata(
                    //         'message',
                    //         '<div class="alert alert-danger">
                    //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    //     Saldo tidak mencukupi.
                    //     </div>'
                    //     );
                    //     redirect('pengurus/withdrawal/onprocess');
                    // }
                } elseif ($data['status'] == "9") {

                    //Start database transaction
                    $this->db->trans_start();

                    $input1 = [
                        'status' => "9"
                    ];
                    $this->db->update('tb_withdrawal', $input1, "id_withdrawal = '" . $id_withdrawal . "'");

                    $deskripsi = "Withdraw [" . $kode_tr . "] dibatalkan";

                    // report activity
                    $report_act = array(
                        'id_user' => $id_pengurus,
                        'user' => "pengurus",
                        'keterangan' => $deskripsi,
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
                        Gagal.
                        </div>'
                        );
                        redirect('pengurus/withdrawal/onprocess');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Withdraw batal.
                        </div>'
                        );
                        redirect('pengurus/withdrawal/onprocess');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Error!
                        </div>'
                    );
                    redirect('pengurus/withdrawal/onprocess');
                }
            } else {
                redirect('pengurus/withdrawal/onprocess');
            }
        } else {
            redirect('pengurus/withdrawal/onprocess');
        }
    }

    // ########################################################################

    function fetch_wd_detail($id_withdrawal)
    {
        // cek if package exists
        $query1 = $this->db->query(" SELECT id_withdrawal
                                    FROM tb_withdrawal
                                    WHERE id_withdrawal = '" . $id_withdrawal . "'");
        if ($query1->num_rows() > 0) {

            $query = $this->db->query(' SELECT tb_anggota.*, tb_withdrawal.amount, tb_withdrawal.status
                                        FROM tb_withdrawal, tb_anggota
                                        WHERE tb_anggota.id_anggota=tb_withdrawal.id_anggota
                                            AND tb_withdrawal.id_withdrawal = "' . $id_withdrawal . '"');
            $result = $query->row_array();

            $no_anggota = $result['no_anggota'];
            $id_anggota = $result['id_anggota'];
            $nama = $result['nama'];
            $no_hp = $result['no_hp'];
            $email = $result['email'];
            $balance = $this->Balance->total_balance($id_anggota);
            $amount = $result['amount'];
            $gateway = $result['bank'];
            $no_rek = $result['no_rekening'];
            $status = $result['status'];

            $biaya_admin_wd = $this->Helper->setting('BIAYA_WD');

            $biaya_withdraw = (int) $amount * ($biaya_admin_wd / 100);
            $amount_transferred = $amount - $biaya_withdraw;

            $currency = $this->Helper->setting('CURRENCY');

            if ($status == '0') { //ON PROCESS
                $output = '
                <header class="card-header">
                    <h2 class="card-title">Withdrawal Detail</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-2 text-center"><span class="badge badge-info">Withdrawal Request</span></h3>
                    </div>
                    <h4 class="text-left pb-0">Personal Info</h4>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td>No. Anggota</td>
                                <td><b>' . $no_anggota . '</b></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>' . $nama . '</td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>' . $no_hp . '</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>' . $email . '</td>
                            </tr>
                            <tr>
                                <td>Saldo anggota</td>
                                <td>' . $currency . ' ' . rupiah($balance) . '</td>
                            </tr>
                        </tbody>
                    </table>
                    <form class="form-horizontal form-bordered" action="' . site_url() . 'pengurus/withdrawal/updaterequestwd/' . $id_withdrawal . '" method="post">
                        <h4 class="text-left pb-0 mt-3">Transfer Info</h4>
                        <table class="table table-responsive-md table-striped table-bordered mb-5">
                            <tbody>
                                <tr>
                                    <td>Gateway</td>
                                    <td><input type="text" class="form-control" name="gateway" value="' . $gateway . '"></td>
                                </tr>
                                <tr>
                                    <td>Account Number</td>
                                    <td><input type="text" class="form-control" name="no_rekening" value="' . $no_rek . '"></td>
                                </tr>
                                <tr>
                                    <td>Permintaan withdraw</td>
                                    <td>' . $currency . ' ' . rupiah($amount) . '</td>
                                </tr>
                                <tr>
                                    <td>Biaya Admin</td>
                                    <td>' . $currency . ' ' . rupiah($biaya_withdraw) . '</td>
                                </tr>
                                <tr>
                                    <td>Yang harus di transfer</td>
                                    <td><strong>' . $currency . ' ' . rupiah($amount_transferred) . '</strong></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select name="status" class="form-control">
                                            <option value="0" selected>----- Change Status -----</option>
                                            <option value="1">Processed</option>
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
