<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Deposit_model', 'Deposit');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        redirect('admin/deposit/newrequest');
    }

    public function newrequest()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Deposit->get_new_deposit();
        $this->Main->view('deposit/new', $main);
    }

    public function pending()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Deposit->get_pending_deposit();
        $this->Main->view('deposit/pending', $main);
    }

    public function processed()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['record'] = $this->Deposit->get_processed_deposit();
        $this->Main->view('deposit/processed', $main);
    }

    // ################################################

    public function updaterequest($code)
    {
        $this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('status', 'status', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $main['currency'] = $this->Helper->setting('CURRENCY');
            $main['record'] = $this->Deposit->get_processed_deposit();
            $this->Helper->view('deposit/processed', $main);
        } else {
            if (!empty($code)) {
                $data = [
                    'code' => $code,
                    'amount' => $this->input->post('amount', TRUE),
                    'status' => $this->input->post('status', TRUE)
                ];
                $this->Deposit->updaterequest($data);
            } else {
                redirect('pengurus/deposit/processed');
            }
        }
    }

    // ################################################
    // Export

    public function export()
    {
        $main['deposit'] = $this->db->select("tb_deposit.*, tb_anggota.no_anggota, tb_anggota.nama, tb_gateway.gateway")
            ->from("tb_deposit, tb_gateway, tb_anggota")
            ->where("tb_deposit.id_gateway = tb_gateway.id_gateway")
            ->where("tb_anggota.id_anggota = tb_deposit.id_anggota")
            ->where("tb_deposit.status = '1'")
            ->order_by("date", "ASC")
            ->get()
            ->result();
        $this->load->view('export/export_deposit', $main);
    }

    // ################################################


    public function fetch_depo_detail()
    {
        if ($this->input->post('code')) {
            echo $this->Deposit->fetch_depo_detail($this->input->post('code'));
        }
    }
}
