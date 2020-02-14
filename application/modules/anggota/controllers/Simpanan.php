<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model', 'Main');
        $this->load->model('Helper_model', 'Helper');
        if ($this->Helper->setting('LOGIN_ANGGOTA', 'status') == "0") {
            redirect('maintenance');
        }
        $this->load->model('Simpanan_model', 'Simpanan');
        $this->load->model('Balance_model', 'Balance');
        $this->load->library('form_validation');
        $this->Main->cek_login();
    }

    public function index()
    {
        // cek simpanan wajib
        if ($this->Helper->cek_simpanan_pokok()) {
            $main['link_simp_pokok'] = '<a onclick="showBayarSimpananPokok()" class="modal-basic" href="#modalPrimary" class="text-uppercase">(KLIK UNTUK BAYAR)</a>';
        } else {
            $main['link_simp_pokok'] = '<a class="text-uppercase">lunas</a>';
        }

        $main['mutasi_simpanan'] = $this->Simpanan->get_mutasiSimpanan();
        $this->Main->view('simpanan/simpanan', $main);
    }

    public function pindahkesaldo($kode_tr = "")
    {
        if ($kode_tr != "") {
            $kode = substr($kode_tr, 0, 2);
            if ($kode == "SW") {
                $tb = "tb_simpanan_wajib";
            } elseif ($kode == "SP") {
                $tb = "tb_simpanan_pokok";
            } elseif ($kode == "SS") {
                $tb = "tb_simpanan_sukarela";
            } else {
                redirect('anggota/simpanan');
            }

            $query = $this->db->query(' SELECT id_simpanan
                                    FROM ' . $tb . ' 
                                    WHERE kode_tr = "' . $kode_tr . '"');
            $cek = $query->num_rows();
            if ($cek > 0) {
                $data = [
                    'kode' => $kode,
                    'tabel' => $tb,
                    'kode_tr' => $kode_tr
                ];
                $this->Simpanan->moveSimpananToSaldo($data);
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Terjadi kesalahan.
                    </div>'
                );
                redirect('anggota/simpanan');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Terjadi kesalahan.
                </div>'
            );
            redirect('anggota/simpanan');
        }
    }

    public function wajib()
    {
        $this->Main->view('simpanan/simpanan_wajib');
    }

    // ############################################

    public function bayarsimpananpokok()
    {
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->Simpanan->bayarSimpananPokok();
        }
    }

    public function bayarsimpananwajib()
    {
        $this->form_validation->set_rules('bulan', 'bulan', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'bulan' => $this->input->post('bulan', TRUE)
            ];
            $this->Simpanan->bayarSimpananWajib($data);
        }
    }

    public function bayarsimpanansukarela()
    {
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('passtr', 'password transaksi', 'required|callback_passtr_check');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = [
                'nilai' => $this->input->post('nilai', TRUE)
            ];
            $this->Simpanan->bayarSimpananSukarela($data);
        }
    }

    // ############################################

    public function bagiuntung()
    {
        $main['bagiuntung'] = $this->Simpanan->get_bagi_untung();
        $this->Main->view('simpanan/bagiuntung', $main);
    }

    public function komisipromosi()
    {
        $main['komisisponsor'] = $this->Simpanan->get_komisi_sponsor();
        $this->Main->view('simpanan/komisi_sponsor', $main);
    }

    // ############################################

    public function fetchModalSimpananWajib()
    {
        echo $this->Simpanan->fetchModalSimpananWajib();
    }

    public function fetchModalSimpananPokok()
    {
        echo $this->Simpanan->fetchModalSimpananPokok();
    }

    public function fetchModalSimpananSukarela()
    {
        echo $this->Simpanan->fetchModalSimpananSukarela();
    }

    // ############################################

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
            $this->form_validation->set_message('passtr_check', 'Password transaksi salah.');
            return FALSE;
        }
    }
}
