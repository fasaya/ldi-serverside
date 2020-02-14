<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        $this->load->model('Deposito_model', 'Deposito');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['deposito'] = $this->Deposito->get_deposito();
        $this->Main->view('deposito/deposito', $main);
    }

    // ################################################

    public function deviden()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['deviden'] = $this->Deposito->get_deviden();

        $this->Main->view('deposito/deviden', $main);
    }

    public function royalti()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['royalti'] = $this->Deposito->get_royalti();

        $this->Main->view('deposito/royalti', $main);
    }

    // ################################################

    public function amount_check($amount)
    {
        if ($this->Balance->total_balance() >= $amount) {
            if (($amount % 100000) == 0) {
                return TRUE;
            } else {
                $this->form_validation->set_message('amount_check', 'Nilai harus kelipatan Rp 100.000');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('amount_check', 'Saldo anda tidak mencukupi');
            return FALSE;
        }
    }

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
