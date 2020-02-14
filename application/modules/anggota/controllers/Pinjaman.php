<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Main_model', 'Main');
        $this->load->model('Pinjaman_model', 'Pinjaman');
        $this->load->model('Balance_model', 'Balance');
        $this->load->library('form_validation');

        $this->Main->cek_login();

        if ($this->Helper->cek_simpanan_wajib() && $this->Helper->cek_simpanan_pokok()) {
            redirect('anggota/dashboard');
        }
    }

    public function index()
    {
        $this->formulir();
    }

    public function formulir()
    {
        $this->form_validation->set_rules('nilai', 'jumlah', 'trim|numeric|required|xss_clean|callback_amount_check');
        $this->form_validation->set_rules('angsuran', 'angsuran', 'trim|numeric|required|xss_clean');
        $this->form_validation->set_rules('jangka', 'jangka waktu pinjaman', 'trim|numeric|required|xss_clean|callback_pinjaman_check');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|xss_clean');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {

            $main['pinjaman'] = $this->Pinjaman->get_ket_pinjaman();
            $this->Main->view('pinjaman/pengajuan_pinjaman', $main);
        } else {
            $data = [
                'nilai' => $this->input->post('nilai', TRUE),
                'jangka' => $this->input->post('jangka', TRUE),
                'angsuran' => $this->input->post('angsuran', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE)
            ];
            $this->Pinjaman->pengajuan_pinjaman($data);
        }
    }

    public function pembayaran()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['bayar'] = $this->Pinjaman->get_pinjaman_belum_bayar();
        $this->Main->view('pinjaman/bayar_pinjaman', $main);
    }

    public function pinjamansaya()
    {
        $main['mutasi_pinjaman'] = $this->Pinjaman->get_pinjaman();
        $this->Main->view('pinjaman/pinjaman', $main);
    }

    public function laporan()
    {
        $main['currency'] = $this->Helper->setting('CURRENCY');
        $main['laporan'] = $this->Pinjaman->get_pinjaman_sudah_bayar();
        $this->Main->view('pinjaman/laporan', $main);
    }

    public function bayar($kode_tr)
    {
        $this->Pinjaman->bayar_pinjaman($kode_tr);
    }

    // ##########################################

    function fetch_bayar()
    {
        if ($this->input->post('kode_tr')) {
            echo $this->Pinjaman->fetch_bayar($this->input->post('kode_tr'));
        }
    }

    // ##########################################


    public function amount_check($amount)
    {
        if (($amount % 100000) == 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('amount_check', 'Nilai harus kelipatan Rp 100.000');
            return FALSE;
        }
    }

    public function pinjaman_check($id_setting_pinjaman)
    {
        $query = $this->db->query(' SELECT bunga
                                    FROM pinjaman
                                    WHERE id_setting_pinjaman = "' . $id_setting_pinjaman . '" AND status = "1"');

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('pinjaman_check', 'Mohon coba lagi');
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
