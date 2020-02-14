<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Deposit_model', 'Deposit');
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Main_model', 'Main');
        $this->load->library('form_validation');

        $this->Main->cek_login();
    }

    // MAIN

    public function index()
    {
        $this->history();
    }

    public function add()
    {
        $this->form_validation->set_rules('gateway', 'gateway', 'trim|required|xss_clean');
        $this->form_validation->set_rules('amount', 'amount', 'trim|numeric|xss_clean|required');

        if ($this->form_validation->run() == false) {

            $this->history();
        } else {
            $data = [
                'id_gateway' => $this->input->post('gateway', TRUE),
                'amount' => $this->input->post('amount', TRUE)
            ];
            $this->Deposit->newDepo($data);
        }
    }

    public function history()
    {
        //cek apakah bisa DP
        if ($this->Helper->setting('DEPOSIT', 'status') == '1') {
            $main['dp'] = "";
        } else {
            $main['dp'] = "disabled";
        }

        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['gateway'] = $this->Deposit->get_gateway();

        $main['mndp'] = $this->Helper->setting('DEPO_MIN');
        $main['mxdp'] = $this->Helper->setting('DEPO_MAX');

        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['deposit'] = $this->Deposit->get_deposit();
        $this->Main->view('deposit/deposit_history', $main);
    }

    private function cancel($code = '')
    {
        $this->Deposit->cancel_deposit($code);
    }

    // #################################################################

    function fetch_history()
    {
        echo $this->Deposit->fetch_history();
    }

    function fetch_detailDepo()
    {
        if ($this->input->post('code')) {
            echo $this->Deposit->fetch_detailDepo($this->input->post('code'));
        }
    }
}
