<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit_model extends CI_Model
{

    function get_deposit()
    {
        $id_user = $this->session->userdata('id_user');

        $this->db->select("tb_deposit.*, tb_gateway.gateway");
        $this->db->from("tb_deposit, tb_gateway");
        $this->db->where("tb_deposit.id_anggota", $id_user);
        $this->db->where("tb_deposit.id_gateway=tb_gateway.id_gateway");
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
    // ################################################### 

    function cancel_deposit($code)
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT status, code
                                        FROM tb_deposit
                                        WHERE code = "' . $code . '"
                                            AND id_anggota = "' . $id_anggota . '"');

        if ($query->num_rows() > 0) {

            $result = $query->row_array();
            $code = $result['code'];
            $status = $result['status'];

            if ($status != "1") {
                //Start database transaction
                $this->db->trans_start();

                //update
                $this->db->set('status', '9');
                $this->db->where('code', $code);
                $this->db->where('id_anggota', $id_anggota);
                $this->db->update('tb_deposit');

                //Start database transaction
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Failed to cancel deposit.
                    </div>'
                    );
                    redirect('anggota/deposit/history');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Deposit ' . $code . ' cancelled.
                    </div>'
                    );
                    redirect('anggota/deposit/history');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Failed to cancel deposit.
                    </div>'
                );
                redirect('anggota/deposit/history');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Failed to cancel deposit.
                </div>'
            );
            redirect('anggota/deposit/history');
        }
    }

    function newDepo($data)
    {
        //cek apakah bisa DP
        if ($this->Helper->setting('DEPOSIT', 'status') == '1') {
            $id_anggota = $this->session->userdata('id_user');
            $amount = $data['amount'];
            $id_gateway = $data['id_gateway'];
            $status = "0"; //status 0 berarti baru request
            $kode_tr = $this->Helper->generate_kodeTR("DP");
            $currency = $this->Helper->setting('CURRENCY');
            $date = new_date();

            //cek apakah gateway nya ada
            $cek_gateway = $this->db->get_where('tb_gateway', array(
                'id_gateway' => $id_gateway
            ));
            if ($cek_gateway->num_rows() > 0) {

                // generate 3 random number for last digit
                $last_code = rand(100, 999);
                // generate 6 random character
                $code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6); //6 adalah panjang karakter

                //Start database transaction
                $this->db->trans_start();

                //insert into table deposit
                $data_depo = [
                    'id_anggota' => $id_anggota,
                    'kode_tr' => $kode_tr,
                    'amount' => $amount,
                    'last_code' => $last_code,
                    'id_gateway' => $id_gateway,
                    'code' => $code,
                    'date' => $date,
                    'status' => $status
                ];
                $this->db->insert('tb_deposit', $data_depo);

                //get last inserted id (id_anggota)
                // $id_dp = $this->db->insert_id();

                //insert into table report
                // $data_report = [
                //     'id_anggota' => $id_anggota,
                //     'id' => $id_dp,
                //     'debit' => 0,
                //     'credit' => $amount,
                //     'saldo' => $this->Balance->total_balance() + $amount,
                //     'deskripsi' => "Deposit on process",
                //     'tipe' => "depo_pending",
                //     'date' => $date
                // ];
                // $this->db->insert('tb_report', $data_report);

                // report activity
                $report_act = array(
                    'id_user' => $id_anggota,
                    'user' => "anggota",
                    'keterangan' => "Permintaan deposit [" . $kode_tr . "] senilai " . $currency . " " . rupiah($amount),
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
                    Failed to make new deposit request! Please try again later.
                    </div>'
                    );
                    redirect('anggota/deposit/history');
                } else {
                    //kirim email

                    $result = $cek_gateway->row_array();
                    $gateway =  $result['gateway'];
                    $no_rek =  $result['no_rekening'];
                    $atas_nama =  $result['atas_nama'];

                    $total = $amount + $last_code;
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Permintaan deposit dengan kode transaksi ' . $kode_tr . ' telah terkirim. Mohon melakukan transfer sebesar ' . $currency . ' ' . rupiah($total) . ' ke ' . $atas_nama . ' (' . $gateway . ' - ' . $no_rek . '). Klik tombol pada kolom detail untuk melihat detail deposit.
                    </div>'
                    );
                    redirect('anggota/deposit/history');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Sorry, there is an error.
                    </div>'
                );
                redirect('anggota/deposit/history');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Sorry, please try again later. 
                </div>'
            );
            redirect('anggota/deposit/history');
        }
    }

    // ########################################################

    function fetch_history()
    {
        $id_member = $this->session->userdata('id_member');

        $currency = $this->Helper->setting('CURRENCY');

        $this->db->select("tb_deposit.*, tb_gateway.gateway");
        $this->db->from("tb_deposit, tb_gateway");
        $this->db->where("tb_deposit.id_member", $id_member);
        $this->db->where("tb_deposit.id_gateway=tb_gateway.id_gateway");
        $this->db->order_by("date", "DESC");
        $query = $this->db->get()->result();

        $output = "";
        $no = 1;
        foreach ($query as $row) {
            $output .= '
            <tr>
                <td class="text-center">' . $no . '.</td>
                <td>' . $currency . ' '  . rupiah($row->amount) . '</td>
                <td>' . $row->gateway . '</td>
                <td>' . $row->date . '</td>
                <td>' . $row->code . '</td>
                <td class="actions">
                    <a href="#modalinfo" class="modal-with-move-anim ws-normal" onclick="showDataToModal(\'' . $row->code . '\')"><i class="fas fa-pencil-alt"></i></a>
                    <a class="mb-1 mt-1 mr-1 modal-with-move-anim ws-normal btn btn-primary" href="#modalinfo" onclick="showDataToModal(\'' . $row->code . '\')">Info <i class="fas fa-info-circle"></i></a>
                    <a class="mb-1 mt-1 mr-1 modal-with-move-anim ws-normal btn btn-primary" href="#modalinfo">Info <i class="fas fa-info-circle"></i></a>
                </td>
            </tr>';
            $no++;
        }

        return $output;
    }

    function fetch_detailDepo($code)
    {
        $id_anggota = $this->session->userdata('id_user');

        // cek if package exists
        $cek_dp = $this->db->get_where('tb_deposit', array(
            'code' => $code
        ));
        if ($cek_dp->num_rows() > 0) {

            $currency = $this->Helper->setting('CURRENCY');
            $query = $this->db->query(' SELECT tb_anggota.no_anggota, tb_deposit.*, tb_gateway.gateway,                 tb_gateway.no_rekening, tb_gateway.atas_nama
                                        FROM tb_anggota, tb_deposit, tb_gateway
                                        WHERE tb_deposit.id_gateway = tb_gateway.id_gateway 
                                            AND tb_anggota.id_anggota = tb_deposit.id_anggota 
                                            AND tb_deposit.code = "' . $code . '"
                                            AND tb_deposit.id_anggota = "' . $id_anggota . '"');
            $result = $query->row_array();

            $status = $result['status'];
            $no_anggota = $result['no_anggota'];
            $amount = $result['amount'];
            $gateway = $result['gateway'];
            $no_rek = $result['no_rekening'];
            $atas_nama = $result['atas_nama'];
            $code = $result['code'];
            $last_code = $result['last_code'];
            $total = $amount + $last_code;

            $emailAdmin = $this->Helper->setting_web('CS');
            $waAdmin = $this->Helper->setting_web('NOWA');

            if ($status == '0' || $status == '2') { //ON PROCESS
                $output = '
                <header class="card-header">
                <h2 class="card-title">Detail Deposit</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-3 text-center"><span class="badge badge-warning">Menunggu verifikasi</span></h3>
                        <!--<p class="text-center">Nullam quiris risus eget urna mollis ornare vel eu leo. Soccis natoque penatibus et magnis dis parturient montes. Soccis natoque penatibus et magnis dis parturient montes.</p>-->
                    </div>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td>Kode Deposit</td>
                                <td>' . $code . '</td>
                            </tr>
                            <tr>
                                <td>Gateway</td>
                                <td>' . $gateway . '</td>
                            </tr>
                            <tr>
                                <td>No. Rekening</td>
                                <td>' . $no_rek . '</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>' . $atas_nama . '</td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td>' . $currency . ' ' . rupiah($total) . '</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <p>Mohon melakukan transfer ke <b>' . $gateway . ' - ' . $no_rek . ' a.n. ' . $atas_nama . '</b>.</p>
                    <p>Gunakan kode unik <b>' . $last_code . '</b> untuk memudahkan proses verifikasi.</p>
                    <p>Total transfer Anda yaitu <b>' . $currency . ' ' . rupiah($total) . '</b>.</p>
                    <p>Mohon masukkan kode deposit <b>' . $code . '</b>, No. Anggota <b>' . $no_anggota . '</b> pada deskripsi.</p>
                    <p> Apabila deposit tidak di verifikasi dalam 1x24 jam (jam kerja), mohon hubungi via email <b>' . $emailAdmin . '</b> atau via Whatsapp <b>+' . $waAdmin . '</b>.</p>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                    </div>
                </footer>';
            } elseif ($status == '1') { // PROCESSED
                $output = '
                <header class="card-header">
                <h2 class="card-title">Detail Deposit</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-3 text-center"><span class="badge badge-success">Telah di verifikasi</span></h3>
                        <!--<p class="text-center">Nullam quiris risus eget urna mollis ornare vel eu leo. Soccis natoque penatibus et magnis dis parturient montes. Soccis natoque penatibus et magnis dis parturient montes.</p>-->
                    </div>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td>Kode Deposit</td>
                                <td>' . $code . '</td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td>' . $currency . ' ' . rupiah($amount) . '</td>
                            </tr>
                            <tr>
                                <td>Gateway</td>
                                <td>' . $gateway . '</td>
                            </tr>
                            <tr>
                                <td>No Rekening</td>
                                <td>' . $no_rek . '</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>' . $atas_nama . '</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                    </div>
                </footer>';
            } elseif ($status == '9') { //CANCELLED
                $output = '
                <header class="card-header">
                <h2 class="card-title">Detail Deposit</h2>
                </header>
                <div class="card-body">
                    <div class="text-center">
                        <h3 class="font-weight-semibold mt-1 mb-3 text-center"><span class="badge badge-danger">Cancelled</span></h3>
                        <!--<p class="text-center">Nullam quiris risus eget urna mollis ornare vel eu leo. Soccis natoque penatibus et magnis dis parturient montes. Soccis natoque penatibus et magnis dis parturient montes.</p>-->
                    </div>
                    <table class="table table-responsive-md table-striped table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td>Kode Deposit</td>
                            <td>' . $code . '</td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td>' . $currency . ' ' . rupiah($amount) . '</td>
                        </tr>
                        <tr>
                            <td>Gateway</td>
                            <td>' . $gateway . '</td>
                        </tr>
                        <tr>
                            <td>No Rekening</td>
                            <td>' . $no_rek . '</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>' . $atas_nama . '</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                    </div>
                </footer>';
            }

            return $output;
        }
    }
} //end model
