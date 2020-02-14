<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposito extends CI_Controller
{
    private function __construct()
    {
        parent::__construct();

        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Balance_model', 'Balance');
        $this->load->model('Deposito_model', 'Deposito');
        $this->load->library('form_validation');

        $this->Main->cek_login();

        if ($this->Helper->cek_simpanan_wajib() && $this->Helper->cek_simpanan_pokok()) {
            redirect('anggota/dashboard');
        }
    }

    private function index() // taro di v_header
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $currency = $main['currency'];
        $main['mikro'] = "Mikro (" . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_MIKRO_MIN')) . " - " . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_MIKRO_MAX')) . ")";
        $main['makro'] = "Makro (" . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_MAKRO_MIN')) . " - " . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_MAKRO_MAX')) . ")";
        $main['prioritas'] = "Prioritas (" . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_PRIORITAS_MIN')) . " - " . $currency . " " . rupiah($this->Helper->setting('DEPOSITO_PRIORITAS_MAX')) . ")";

        $main['royalti'] = $this->Deposito->get_royalti();
        $main['deposito'] = $this->Deposito->get_deposito();

        $this->Main->view('deposito/deposito', $main);
    }

    private function deposito()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        if ($_POST['pilih'] == 'mikro') {
            redirect('anggota/deposito/mikro');
        } elseif ($_POST['pilih'] == 'makro') {
            redirect('anggota/deposito/makro');
        } elseif ($_POST['pilih'] == 'prioritas') {
            redirect('anggota/deposito/prioritas');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan
                </div>'
            );
            redirect('anggota/deposito');
        }
    }

    private function mikro()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|numeric|required|xss_clean|callback_amount_check');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $main['currency'] = $this->Helper->setting('CURRENCY');
            $this->Main->view('deposito/deposito_mikro', $main);
        } else {
            $data = [
                'nilai' => $this->input->post('nilai', TRUE)
            ];
            $this->Deposito->deposito_mikro($data);
        }
    }

    private function makro()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|numeric|required|xss_clean|callback_amount_check');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');
        $this->form_validation->set_rules('kontrak', 'kontrak', 'required');

        if ($this->form_validation->run() == false) {
            $main['currency'] = $this->Helper->setting('CURRENCY');
            $this->Main->view('deposito/deposito_makro', $main);
        } else {
            $tipe = $this->input->post('kontrak', TRUE);
            if ($tipe == "1" || $tipe == "2" || $tipe == "3") {
                $data = [
                    'nilai' => $this->input->post('nilai', TRUE),
                    'tipe' => $tipe
                ];
                $this->Deposito->deposito_makro($data);
            } else {
                $this->makro();
            }
        }
    }

    private function prioritas()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|numeric|required|xss_clean|callback_amount_check');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $main['currency'] = $this->Helper->setting('CURRENCY');
            $this->Main->view('deposito/deposito_prioritas', $main);
        } else {
            $data = [
                'nilai' => $this->input->post('nilai', TRUE)
            ];
            $this->Deposito->deposito_prioritas($data);
        }
    }

    // ################################################

    private function deviden() // taro di v_header
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['deviden'] = $this->Deposito->get_deviden();

        $this->Main->view('deposito/deviden', $main);
    }

    private function royalti() // taro di v_header
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['royalti'] = $this->Deposito->get_royalti();

        $this->Main->view('deposito/royalti', $main);
    }

    // ################################################

    private function amount_check($amount)
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

    private function passtr_check($pass_tr)
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
