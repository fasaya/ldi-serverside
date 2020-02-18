<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Withdraw_model', 'Withdraw');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');

        $this->Main->cek_login();
    }

    public function index()
    {
        redirect('admin/withdrawal/processed');
    }

    public function onprocess()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Withdraw->get_onprocess_wd();
        $this->Main->view('withdrawal/onprocess', $main);
    }

    public function processed()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Withdraw->get_processed_wd();
        $this->Main->view('withdrawal/processed', $main);
    }

    public function cancelled()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Withdraw->get_cancelled_wd();
        $this->Main->view('withdrawal/cancelled', $main);
    }

    // ################################################

    public function updaterequestwd($id_wd)
    {
        $this->form_validation->set_rules('gateway', 'gateway', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_rekening', 'account number', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('status', 'status', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->onprocess();
        } else {
            if (!empty($id_wd)) {
                $data = [
                    'id_withdrawal' => $id_wd,
                    'gateway' => $this->input->post('gateway', TRUE),
                    'no_rekening' => $this->input->post('no_rekening', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];
                $this->Withdraw->updaterequestwd($data);
            } else {
                redirect('pengurus/withdrawal/onprocess');
            }
        }
    }
    //#################################
    // Export

    public function export()
    {
        $main['withdraw'] = $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama, tb_anggota.no_rekening, tb_biaya_withdraw.amount AS biaya_admin")
            ->from("tb_withdrawal, tb_anggota, tb_biaya_withdraw")
            ->where("tb_withdrawal.id_withdrawal = tb_biaya_withdraw.id_withdrawal")
            ->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota")
            ->where("tb_withdrawal.status", '1')
            ->order_by("date", "ASC")
            ->get()
            ->result();
        $this->load->view('export/export_withdraw', $main);
    }

    public function exportcancelled()
    {
        $main['withdraw'] = $this->db->select("tb_withdrawal.*, tb_anggota.no_anggota, tb_anggota.nama")
            ->from("tb_withdrawal, tb_anggota")
            ->where("tb_withdrawal.id_anggota = tb_anggota.id_anggota")
            ->where("tb_withdrawal.status = '9'")
            ->order_by("date", "ASC")
            ->get()
            ->result();
        $this->load->view('export/export_withdraw_cancelled', $main);
    }
    //#################################


    public function fetch_wd_detail()
    {
        if ($this->input->post('id_wd')) {
            echo $this->Withdraw->fetch_wd_detail($this->input->post('id_wd'));
        }
    }

    // ################################################
    // datatables
    function fetch_wdnew()
    {
        $fetch_data = $this->Withdraw->make_datatables_wdnew();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {
            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $sub_array[] = $r->date;
            $sub_array[] = '<span class="badge badge-warning">On Process</span>';
            $sub_array[] = '<a onclick="showDataToModal(\'' . $r->id_withdrawal . '\')" class="modal-basic" href="#modalGateway"><i class="fas fa-file-invoice fa-lg text-dark"></i> Proses</a>';
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Withdraw->get_all_data_wdnew(),
            "recordsFiltered" => $this->Withdraw->get_filtered_data_wdnew(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_wdprocessed()
    {
        $fetch_data = $this->Withdraw->make_datatables_wdprocessed();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {

            $stts = $r->status;
            if ($stts == '1') {
                $status = 'Transfer ke ' . $r->gateway . ' - ' . $r->no_rek;
            } elseif ($stts == '9') {
                $status = 'Dibatalkan';
            }

            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $sub_array[] = rupiah($r->biaya_admin);
            $sub_array[] = "-" . rupiah($r->amount_request);;
            $sub_array[] = $status;
            $sub_array[] = $r->date;
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Withdraw->get_all_data_wdprocessed(),
            "recordsFiltered" => $this->Withdraw->get_filtered_data_wdprocessed(),
            "data" => $data
        );
        echo json_encode($output);
    }

    function fetch_wdcancelled()
    {
        $fetch_data = $this->Withdraw->make_datatables_wdcancelled();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $r) {
            $sub_array = array();
            $sub_array[] = $no . ".";
            $sub_array[] = '<b class="text-primary">' . $r->no_anggota . '</b><br>' . $r->nama;
            $sub_array[] = $r->kode_tr;
            $sub_array[] = rupiah($r->amount);
            $sub_array[] = $r->date;
            $sub_array[] = '<span class="badge badge-danger">Dibatalkan</span>';
            $data[] = $sub_array;
            $no++;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Withdraw->get_all_data_wdcancelled(),
            "recordsFiltered" => $this->Withdraw->get_filtered_data_wdcancelled(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
