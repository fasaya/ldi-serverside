<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Withdrawal_model', 'Withdrawal');
        $this->load->model('Main_model', 'Main');
        $this->load->model('Balance_model', 'Balance');
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
        $this->form_validation->set_rules('amount', 'amount', 'trim|numeric|xss_clean|required');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            //cek apakah bisa DP
            if ($this->Helper->setting('WITHDRAW', 'status') == '1') {
                $main['wd'] = "";
            } else {
                $main['wd'] = "disabled";
            }

            $main['currency'] = $this->Helper->setting('CURRENCY');
            $main['balance'] = $this->Balance->total_balance();

            $main['mnwd'] = $this->Helper->setting('WD_MIN');
            $main['mxwd'] = $this->Helper->setting('WD_MAX');
            $this->Main->view('withdrawal/add_withdraw', $main);
        } else {
            $data = [
                'pass_tr' => $this->input->post('passtr', TRUE),
                'amount' => $this->input->post('amount', TRUE)
            ];
            $this->Withdrawal->newWD($data);
        }
    }

    public function history()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['withdrawal'] = $this->Withdrawal->get_withdrawal();
        $this->Main->view('withdrawal/withdraw_history', $main);
    }

    // #################################################################

    function fetch_wdonprocess()
    {
        echo $this->Withdrawal->fetch_wdonprocess();
    }

    function fetch_wdprocessed()
    {
        echo $this->Withdrawal->fetch_wdprocessed();
    }

    // ##################################################


    public function passtr_check($pass_tr)
    {
        $id_anggota = $this->session->userdata('id_user');

        $query = $this->db->query(' SELECT pass_tr
                                    FROM tb_anggota
                                    WHERE id_anggota = "' . $id_anggota . '" ');
        $user = $query->row_array();

        if (password_verify($pass_tr, $user['pass_tr'])) {
            return TRUE;
        } else {
            $this->form_validation->set_message('passtr_check', 'Password transaksi salah');
            return FALSE;
        }
    }
}
